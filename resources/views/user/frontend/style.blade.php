@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/style.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/style.js')
@endpush

@section('content')
<main class="main">
    <section class="section section--media">
        <div class="container">
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                <div class="swiper videoSwiper js-mediaSwiper">
                    <div class="swiper-wrapper">
                        <!-- Slide 0: YouTube影片 -->
                        <div class="swiper-slide videoFrame" data-youtube="true">
                            <iframe id="youtube-player-1"
                                    src="https://www.youtube.com/embed/7rCqL7C_xME?enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>
                        <!-- Slide 1: YouTube影片 -->
                        <div class="swiper-slide videoFrame" data-youtube="true">
                            <iframe id="youtube-player-2"
                                    src="https://www.youtube.com/embed/L1jH8EZP5zQ?enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
</main>
@endsection
