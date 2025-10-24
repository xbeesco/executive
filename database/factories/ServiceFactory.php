<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'excerpt' => $this->faker->sentence(),
            'content' => [
                [
                    'type' => 'text',
                    'content' => $this->faker->paragraphs(2, true),
                ],
            ],
            'featured_image' => '/images/service.jpg',
            'icon' => 'fas fa-rocket',
            'features' => [
                ['name' => 'Feature 1', 'icon' => 'fas fa-check'],
                ['name' => 'Feature 2', 'icon' => 'fas fa-check'],
            ],
            'status' => 'published',
            'seo' => [
                'meta_title' => $title,
                'meta_description' => $this->faker->sentence(),
                'meta_keywords' => $this->faker->words(3, ','),
            ],
        ];
    }
}
