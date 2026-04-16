import CarouselSlider from './modules/mediaSwiper';

class StaticMediaSlider extends CarouselSlider {
    playYouTubeVideo(player, videoId) {
        if (!player) return;
        
        this.currentPlayingVideoId = videoId;
        this.log(`[StaticMode] YouTube 已準備就緒 (Video: ${videoId})，等待手動播放`);

    }

    handleVideoSlide(video) {
        this.log(`[StaticMode] 一般影片已就緒，等待手動播放`);
        video.currentTime = 0;
        video.pause();

        video.onended = null;
    }

    handleSlideChange() {
        super.handleSlideChange();
        
        if (this.autoplayTimeout) {
            this.log('[StaticMode] 清除圖片自動跳轉計時器');
            clearTimeout(this.autoplayTimeout);
            this.autoplayTimeout = null;
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const carousel = new StaticMediaSlider('.js-mediaSwiper', {
        showOnInit: true,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        debug: import.meta.env.DEV
    });
});