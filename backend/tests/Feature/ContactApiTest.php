<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_validation_errors_if_missing()
    {
        $response = $this->postJson('/api/contact', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    public function test_sends_contact_email_on_valid_input()
    {
        Mail::fake();

        $payload = [
            'name' => 'Sergio',
            'email'=> 'sergio@example.com',
            'message'=> 'Hello!'
        ];

        $response = $this->postJson('/api/contact', $payload);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        Mail::assertSent(ContactForm::class, function ($mail) use ($payload) {
            return $mail->hasTo(config('mail.admin_address'));
        });
    }
}
