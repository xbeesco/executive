<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(2, true);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => $this->faker->sentence(),
            'fields' => [
                [
                    'name' => 'name',
                    'slug' => 'name',
                    'type' => 'text',
                    'label' => 'Your Name',
                    'placeholder' => 'Enter your name',
                    'required' => true,
                    'width' => 'full',
                ],
                [
                    'name' => 'email',
                    'slug' => 'email',
                    'type' => 'email',
                    'label' => 'Email Address',
                    'placeholder' => 'your@email.com',
                    'required' => true,
                    'width' => 'full',
                ],
            ],
            'settings' => [
                'submit_button_text' => 'Send',
                'success_message' => 'Thank you for your submission',
                'redirect_url' => '/thank-you',
                'email_to' => 'admin@example.com',
            ],
            'status' => 'active',
        ];
    }
}
