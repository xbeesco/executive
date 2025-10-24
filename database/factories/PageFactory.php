<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(3, true);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'content' => [
                [
                    'type' => 'hero',
                    'title' => $this->faker->sentence(),
                    'subtitle' => $this->faker->sentence(),
                    'image' => '/images/hero.jpg',
                ],
                [
                    'type' => 'text',
                    'content' => $this->faker->paragraphs(2, true),
                ],
            ],
            'featured_image' => '/images/featured.jpg',
            'status' => 'published',
            'settings' => [
                'page_type' => 'inner_page',
                'header_style' => 3,
                'footer_style' => 3,
                'show_title_bar' => true,
                'archive_template' => 'grid-col-3',
            ],
            'seo' => [
                'meta_title' => $title,
                'meta_description' => $this->faker->sentence(),
                'meta_keywords' => $this->faker->words(3, ','),
                'og_image' => '/images/og.jpg',
            ],
        ];
    }
}
