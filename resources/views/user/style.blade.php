@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/style.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/style.js')
@endpush

@section('content')
    <main class="main">
        <section id="media" class="section section--media">
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
        <section id="guide" class="section section--guide">
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary">{{ __('style.guide.title') }}</span>
                </div>
            </div>
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <div class="summary">
                        <div class="summary__image">
                            <div class="imgWrap">
                                <img src="{{ asset('images/style/img_guide.jpg') }}" alt="{{ __('style.guide.title') }}">
                            </div>
                        </div>
                        <div class="summary__text">
                            <div class="title">{{ __('style.guide.summary.title') }}</div>
                            <div class="intro f-p">{{ __('style.guide.summary.intro') }}</div>
                            <ul class="links">
                                <li><a class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('style.guide.summary.btnText1') }}</span></a></li>
                                {{-- <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('style.guide.summary.btnText2') }}</span></a></li> --}}
                                {{-- <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('style.guide.summary.btnText3') }}</span></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="documentary" class="section section--documentary">
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary">{{ __('style.documentary.title') }}</span>
                </div>
            </div>
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <div class="summary">
                        <div class="summary__image">
                            <div class="imgWrap">
                                <img src="{{ asset('images/style/img_documentary.jpg') }}" alt="{{ __('style.documentary.title') }}">
                            </div>
                        </div>
                        <div class="summary__text">
                            <div class="title">{{ __('style.documentary.summary.title') }}</div>
                            <div class="intro f-p">{{ __('style.documentary.summary.intro') }}</div>
                            <ul class="links">
                                <li><a class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('style.documentary.summary.btnText1') }}</span></a></li>
                                {{-- <li><a href="#" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('style.documentary.summary.btnText2') }}</span></a></li> --}}
                                {{-- <li><a href="#" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('style.documentary.summary.btnText3') }}</span></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('user.layout.stickyBtns')
@endsection
