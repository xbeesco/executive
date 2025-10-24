<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\ContentStatus;
use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Services\SettingService;
use Illuminate\Http\Request;

class PageController
{
    public function show(Page $page)
    {
        abort_if($page->status !== ContentStatus::PUBLISHED->value, 404);

        if ($page->getPageType() === 'archive') {
            $type = $page->getArchiveContentType();
            $modelClass = match($type) {
                'post' => Post::class,
                'service' => Service::class,
                'event' => Event::class,
                default => Post::class,
            };

            return view('frontend.page', [
                'page' => $page,
                'items' => $modelClass::published()->paginate(12),
            ]);
        }

        return view('frontend.page', ['page' => $page]);
    }

    public function showPost(Post $post)
    {
        abort_if($post->status !== ContentStatus::PUBLISHED->value, 404);
        $settings = SettingService::get('general', []);

        return view('frontend.single', [
            'model' => $post,
            'type' => 'post',
            'headerStyle' => $settings['header_style'] ?? 3,
            'footerStyle' => $settings['footer_style'] ?? 3,
        ]);
    }

    public function showService(Service $service)
    {
        abort_if($service->status !== ContentStatus::PUBLISHED->value, 404);
        $settings = SettingService::get('general', []);

        return view('frontend.single', [
            'model' => $service,
            'type' => 'service',
            'headerStyle' => $settings['header_style'] ?? 3,
            'footerStyle' => $settings['footer_style'] ?? 3,
        ]);
    }

    public function showEvent(Event $event)
    {
        abort_if($event->status !== ContentStatus::PUBLISHED->value, 404);
        $settings = SettingService::get('general', []);

        return view('frontend.single', [
            'model' => $event,
            'type' => 'event',
            'headerStyle' => $settings['header_style'] ?? 3,
            'footerStyle' => $settings['footer_style'] ?? 3,
        ]);
    }

    public function notFound()
    {
        return view('frontend.404');
    }
}
