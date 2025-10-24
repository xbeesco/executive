<?php

namespace Tests\Feature\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_page_can_be_created(): void
    {
        $page = Page::factory()->create(['status' => 'published']);

        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'slug' => $page->slug,
            'status' => 'published',
        ]);
    }

    public function test_post_can_be_created(): void
    {
        $post = Post::factory()->create(['status' => 'published']);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'slug' => $post->slug,
        ]);
    }

    public function test_draft_page_returns_404(): void
    {
        $page = Page::factory()->create([
            'slug' => 'draft-page',
            'status' => 'draft',
        ]);

        $response = $this->get(route('pages.show', $page->slug));

        $response->assertStatus(404);
    }
}
