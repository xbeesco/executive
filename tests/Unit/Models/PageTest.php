<?php

namespace Tests\Unit\Models;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_page_can_be_created(): void
    {
        $page = Page::factory()->create();

        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'title' => $page->title,
        ]);
    }

    public function test_page_has_required_fields(): void
    {
        $page = Page::factory()->create();

        $this->assertNotNull($page->title);
        $this->assertNotNull($page->slug);
        $this->assertEquals('published', $page->status->value);
    }

    public function test_page_settings_are_json(): void
    {
        $page = Page::factory()->create();

        $this->assertIsArray($page->settings);
        $this->assertArrayHasKey('page_type', $page->settings);
    }

    public function test_page_get_page_type_method(): void
    {
        $page = Page::factory()->create([
            'settings' => ['page_type' => 'homepage'],
        ]);

        $this->assertEquals('homepage', $page->getPageType());
    }

    public function test_page_get_header_style_method(): void
    {
        $page = Page::factory()->create([
            'settings' => ['header_style' => 1],
        ]);

        $this->assertEquals(1, $page->getHeaderStyle());
    }

    public function test_published_scope(): void
    {
        Page::factory()->create(['status' => 'published']);
        Page::factory()->create(['status' => 'draft']);

        $published = Page::published()->get();

        $this->assertEquals(1, $published->count());
    }
}
