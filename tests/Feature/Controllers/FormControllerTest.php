<?php

namespace Tests\Feature\Controllers;

use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_submission_can_be_created(): void
    {
        $form = Form::factory()->create(['status' => 'active']);

        $response = $this->post('/forms/'.$form->slug, [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect('/thank-you');
        $this->assertDatabaseHas('form_submissions', [
            'form_id' => $form->id,
        ]);
    }

    public function test_inactive_form_returns_404(): void
    {
        $form = Form::factory()->create(['status' => 'inactive']);

        $response = $this->post('/forms/'.$form->slug, [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertStatus(404);
    }

    public function test_form_validates_required_fields(): void
    {
        $form = Form::factory()->create(['status' => 'active']);

        $response = $this->post('/forms/'.$form->slug, [
            // Missing required fields
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
    }

    public function test_form_submission_stores_ip_and_user_agent(): void
    {
        $form = Form::factory()->create(['status' => 'active']);

        $this->post('/forms/'.$form->slug, [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $submission = FormSubmission::first();

        $this->assertNotNull($submission->ip_address);
        $this->assertNotNull($submission->user_agent);
    }
}
