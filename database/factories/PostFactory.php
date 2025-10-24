<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(4, true);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'excerpt' => $this->faker->sentence(),
            'content' => [
                [
                    'type' => 'text',
                    'content' => $this->faker->paragraphs(3, true),
                ],
            ],
            'featured_image' => '/images/post.jpg',
            'author_id' => User::factory(),
            'status' => 'published',
            'published_at' => $this->faker->dateTime(),
            'seo' => [
                'meta_title' => $title,
                'meta_description' => $this->faker->sentence(),
                'meta_keywords' => $this->faker->words(3, ','),
            ],
        ];
    }
}
