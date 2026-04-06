<div class="flex flex-col gap-y-2">
    <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
        {{ $getLabel() }}
    </span>

    @php
        $url = $getState() ? Storage::disk('public')->url($getState()) : null;
    @endphp

    @if($url)
        <div class="rounded-xl overflow-hidden border border-gray-200 dark:border-white/10">
            <video controls class="w-full max-w-2xl aspect-video bg-black">
                <source src="{{ $url }}" type="video/mp4">
                您的瀏覽器不支援影片播放。
            </video>
        </div>
    @else
        <p class="text-sm text-gray-500">無影片檔案</p>
    @endif
</div>
