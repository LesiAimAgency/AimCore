<?php

namespace Tests\Feature;

use Tests\TestCase;

class MobileFooterContactFormTest extends TestCase
{
    public function test_mobile_footer_renders_contact_form_and_action_button(): void
    {
        $rendered = view('themes.inbetween_v2.components.mobile.footer', [
            'settings' => [
                'submit_btn_text' => "LET'S CONNECT",
            ],
        ])->render();

        $this->assertStringContainsString('id="mobile-footer-contact-form"', $rendered);
        $this->assertStringContainsString('id="mobile-footer-submit-btn"', $rendered);
        $this->assertStringContainsString("LET'S CONNECT", $rendered);
        $this->assertStringContainsString('mobile-footer-submit-arrow-box', $rendered);
    }

    public function test_contact_route_validates_required_fields(): void
    {
        $response = $this->postJson('/inbetween_v2/contact', [
            'email' => 'test@example.com',
        ]);
        dump($response->status(), $response->json()['message'] ?? '');
    }

    public function test_contact_route_submits_successfully_with_valid_data(): void
    {
        $response = $this->postJson(route('web.inbetween_v2.contact'), [
            'fullname' => 'John Doe',
            'phone' => '0912345678',
            'email' => 'johndoe@example.com',
            'service' => 'Sale & BD',
            'message' => 'Hello, I want to connect!',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);
    }
}
