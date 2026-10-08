<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectToken extends Model
{
    use HasFactory;

    protected $table = 'project_tokens';

    protected $fillable = [
        'project_id',
        'name',
        'token_hash',
        'token_prefix',
        'abilities',
        'last_used_at',
        'expires_at',
        'revoked_at',
    ];

    protected $casts = [
        'abilities' => 'array',
        'last_used_at' => 'datetime',
        'expires_at' => 'datetime',
        'revoked_at' => 'datetime',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Determine if token is currently active and not revoked or expired.
     */
    public function isValid(): bool
    {
        if ($this->revoked_at !== null) {
            return false;
        }

        if ($this->expires_at !== null && $this->expires_at->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Revoke this token immediately.
     */
    public function revoke(): void
    {
        $this->update(['revoked_at' => now()]);
    }

    /**
     * Generate a new cryptographically secure token for a project.
     *
     * Format: vgt_live_tok_{64 random hex characters}
     * Returns: ['token' => plainTextToken, 'model' => ProjectToken]
     */
    public static function createForProject(
        Project $project,
        string $name = 'default',
        array $abilities = ['*'],
        ?\DateTimeInterface $expiresAt = null
    ): array {
        $entropy = bin2hex(random_bytes(32));
        $plainToken = "vgt_live_tok_{$entropy}";
        $prefix = substr($plainToken, 0, 16);
        $hash = hash('sha256', $plainToken);

        $tokenModel = self::create([
            'project_id' => $project->id,
            'name' => $name,
            'token_hash' => $hash,
            'token_prefix' => $prefix,
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
            'revoked_at' => null,
        ]);

        return [
            'token' => $plainToken,
            'model' => $tokenModel,
        ];
    }

    /**
     * Find a valid token by plain text representation.
     */
    public static function findValidToken(string $plainTextToken): ?self
    {
        $hash = hash('sha256', trim($plainTextToken));

        $token = self::with('project')
            ->where('token_hash', $hash)
            ->whereNull('revoked_at')
            ->first();

        if ($token && $token->isValid()) {
            return $token;
        }

        return null;
    }
}
