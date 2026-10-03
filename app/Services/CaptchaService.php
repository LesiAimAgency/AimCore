<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CaptchaService
{
    /**
     * Google reCAPTCHA verification endpoint.
     */
    protected const VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

    /**
     * Get Site Key (Supports project/tenant setting fallback to global config).
     */
    public function getSiteKey(): ?string
    {
        $projectKey = function_exists('setting') ? setting('recaptcha_site_key') : null;

        $key = ! empty($projectKey) ? (string) $projectKey : (string) config('services.recaptcha.site_key');

        return ! empty($key) ? trim($key) : null;
    }

    /**
     * Get Secret Key (Supports project/tenant setting fallback to global config).
     * Server-side only! Never expose to client.
     */
    protected function getSecretKey(): ?string
    {
        $projectSecret = function_exists('setting') ? setting('recaptcha_secret_key') : null;

        $secret = ! empty($projectSecret) ? (string) $projectSecret : (string) config('services.recaptcha.secret_key');

        return ! empty($secret) ? trim($secret) : null;
    }

    /**
     * Determine if CAPTCHA is enabled.
     */
    public function isEnabled(): bool
    {
        // Global switch (set RECAPTCHA_ENABLED=true in .env only when ready for production)
        if (! filter_var(config('services.recaptcha.enabled', false), FILTER_VALIDATE_BOOLEAN)) {
            return false;
        }

        $enabledSetting = function_exists('setting') ? setting('recaptcha_enabled') : null;
        if ($enabledSetting !== null && ! filter_var($enabledSetting, FILTER_VALIDATE_BOOLEAN)) {
            return false;
        }

        return ! empty($this->getSiteKey()) && ! empty($this->getSecretKey());
    }

    /**
     * Verify reCAPTCHA token with Google server.
     *
     * Note: Per security checklist, Secret Key and response token are NEVER logged.
     */
    public function verify(?string $token, ?string $ip = null): bool
    {
        if (! $this->isEnabled()) {
            return true;
        }

        if (empty($token)) {
            return false;
        }

        $secretKey = $this->getSecretKey();
        if (empty($secretKey)) {
            return false;
        }

        try {
            $payload = [
                'secret' => $secretKey,
                'response' => $token,
            ];

            if (! empty($ip)) {
                $payload['remoteip'] = $ip;
            }

            $response = Http::asForm()
                ->timeout(5)
                ->post(self::VERIFY_URL, $payload);

            if (! $response->successful()) {
                return false;
            }

            $data = $response->json();

            return isset($data['success']) && $data['success'] === true;
        } catch (\Throwable) {
            // Fail closed securely without logging secret key or token
            return false;
        }
    }
}
