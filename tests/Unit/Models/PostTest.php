<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_can_be_created(): void
    {
        $post = Post::factory()->create();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
        ]);
    }

    public function test_post_has_author(): void
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->author);
    }

    public function test_post_can_have_categories(): void
    {
        $post = Post::factory()->create();

        $this->assertIsIterable($post->categories);
    }

    public function test_post_published_scope(): void
    {
        Post::factory()->create(['status' => 'published']);
        Post::factory()->create(['status' => 'draft']);

        $published = Post::published()->get();

        $this->assertEquals(1, $published->count());
    }

    public function test_post_content_is_json(): void
    {
        $post = Post::factory()->create();

        $this->assertIsArray($post->content);
    }

    public function test_post_seo_is_json(): void
    {
        $post = Post::factory()->create();

        $this->assertIsArray($post->seo);
    }
}
