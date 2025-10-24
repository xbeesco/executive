<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(2, true);
        $startDate = $this->faker->dateTimeBetween('+1 day', '+30 days');

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => $this->faker->sentence(),
            'content' => [
                [
                    'type' => 'text',
                    'content' => $this->faker->paragraphs(2, true),
                ],
            ],
            'featured_image' => '/images/event.jpg',
            'start_date' => $startDate,
            'end_date' => $this->faker->dateTimeBetween($startDate, $startDate->modify('+2 days')),
            'location' => $this->faker->address(),
            'max_attendees' => $this->faker->numberBetween(50, 500),
            'status' => 'published',
            'seo' => [
                'meta_title' => $title,
                'meta_description' => $this->faker->sentence(),
                'meta_keywords' => $this->faker->words(3, ','),
            ],
        ];
    }
}
