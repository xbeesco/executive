<!-- Content Video Block (No Section Wrapper) -->
<div class="content-video-block mb-4">
    @php
        $videoType = $block['data']['video_type'] ?? 'youtube';
        $videoUrl = $block['data']['video_url'] ?? '';
        $embedUrl = '';

        // Convert YouTube URL to embed
        if ($videoType === 'youtube' && $videoUrl) {
            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $videoUrl, $match)) {
                $embedUrl = 'https://www.youtube.com/embed/' . $match[1];
            }
        }
        // Convert Vimeo URL to embed
        elseif ($videoType === 'vimeo' && $videoUrl) {
            if (preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $match)) {
                $embedUrl = 'https://player.vimeo.com/video/' . $match[1];
            }
        }
        // Direct embed URL
        elseif ($videoType === 'embed' && $videoUrl) {
            $embedUrl = $videoUrl;
        }
    @endphp

    @if($embedUrl)
        <div class="ratio ratio-16x9 rounded overflow-hidden">
            <iframe
                src="{{ $embedUrl }}"
                title="{{ $block['data']['title'] ?? 'Video' }}"
                allowfullscreen
                class="rounded"
            ></iframe>
        </div>
        @if(!empty($block['data']['caption']))
            <p class="small text-muted mt-2 text-center">
                {{ $block['data']['caption'] }}
            </p>
        @endif
    @endif
</div>
<!-- Content Video End -->
