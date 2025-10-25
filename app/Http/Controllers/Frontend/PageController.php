<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ContentStatus;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Services\SettingService;

class PageController extends Controller
{
    public function show(Page $page)
    {
        // Check if page is published
        abort_if($page->status !== ContentStatus::PUBLISHED, 404);

        // Get all settings (general, social_links, menu)
        $settings = SettingService::getAll();

        // Page-specific settings
        $pageSettings = $page->settings ?? [];
        $seo = $page->seo ?? [];

        // Get slider data if needed
        $sliderData = [];
        if (($pageSettings['header_area_type'] ?? 'none') === 'slider') {
            // For now, use static data
            // TODO: Implement slider data from database if needed
            $sliderData = [
                [
                    'title' => 'Welcome to Executive',
                    'subtitle' => 'Professional Business Solutions',
                    'image' => '/images/slider-bg-1.jpg',
                    'description' => '',
                    'button_text' => 'Learn More',
                    'button_url' => '/about',
                ],
            ];
        }

        // For archive pages
        if ($page->isArchive()) {
            $type = $page->getArchiveContentType();

            $items = match ($type) {
                'post' => Post::published()->orderBy('published_at', 'desc')->paginate(12),
                'service' => Service::published()->orderBy('created_at', 'desc')->paginate(12),
                'event' => Event::published()->orderBy('start_date', 'desc')->paginate(12),
                default => Post::published()->orderBy('published_at', 'desc')->paginate(12),
            };

            return view('frontend.page', compact('page', 'items', 'pageSettings', 'settings', 'seo', 'sliderData'));
        }

        // Regular inner page or homepage
        return view('frontend.page', compact('page', 'pageSettings', 'settings', 'seo', 'sliderData'));
    }

    public function showPost(Post $post)
    {
        abort_if($post->status !== ContentStatus::PUBLISHED, 404);

        $settings = SettingService::getAll();
        $seo = $post->seo ?? [];

        return view('frontend.post', compact('post', 'settings', 'seo'));
    }

    public function showService(Service $service)
    {
        abort_if($service->status !== ContentStatus::PUBLISHED, 404);

        $settings = SettingService::getAll();
        $seo = $service->seo ?? [];

        return view('frontend.service', compact('service', 'settings', 'seo'));
    }

    public function showEvent(Event $event)
    {
        abort_if($event->status !== ContentStatus::PUBLISHED, 404);

        $settings = SettingService::getAll();
        $seo = $event->seo ?? [];

        return view('frontend.event', compact('event', 'settings', 'seo'));
    }

    public function notFound()
    {
        $settings = SettingService::getAll();

        return response()->view('frontend.404', compact('settings'), 404);
    }
}
