@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/vi.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/vi.js')
@endpush

@section('content')
    <main class="main">
        {{-- vi start --}}
        <section class="section section--topic">
            <div class="section__title">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">{{ __('about.vi.page-title') }}</span>
                    <div class="coverImg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <img src="{{ asset('images/about/vi/img_logo.svg') }}" alt="台東博覽會 2026 TAITUNG EXPO">
                    </div>
                </div>
            </div>
            <div class="section__content">
                <div class="viGroup viGroup--intro">
                    <div class="viGroup__content">
                        <div class="container">
                            <div class="introText wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                                <div class="introText__title">
                                    <div class="topic f-title-primary">Amazing Taitung</div>
                                </div>
                                <div class="introText__paragraph">
                                    <p class="f-p">{{ __('about.vi.intro.paragraph1') }}</p>
                                    <p class="f-p">{{ __('about.vi.intro.paragraph2') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="introImage wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ asset(__('about.vi.intro.pcImg')) }}" class="display--pc">
                            <img src="{{ asset(__('about.vi.intro.mbImg')) }}" class="display--mb">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- vi end --}}

        {{-- signs start --}}
        <section class="section--signs">
            <div class="section__content">
                <div class="viGroup viGroup--imagery">
                    <div class="container">
                        <div class="viGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><span class="f-title-primary f-unbonded">{{ __('about.vi.vi-image.title') }}</span></div>
                        <div class="viGroup__content">
                            <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <div class="imageryGroup__title"><span class="f-h4">{{ __('about.vi.vi-image.nature.title') }}</span></div>
                                <div class="imageryGroup__image">
                                    <img src="{{ asset(__('about.vi.vi-image.nature.pcImg')) }}" alt="自然的孕育" class="display--pc">
                                    <img src="{{ asset(__('about.vi.vi-image.nature.mbImg')) }}" alt="自然的孕育" class="display--mb">
                                </div>
                            </div>
                            <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                                <div class="imageryGroup__title"><span class="f-h4">{{ __('about.vi.vi-image.culture.title') }}</span></div>
                                <div class="imageryGroup__image">
                                    <img src="{{ asset(__('about.vi.vi-image.culture.pcImg')) }}" alt="文化的積累" class="display--pc">
                                    <img src="{{ asset(__('about.vi.vi-image.culture.mbImg')) }}" alt="文化的積累" class="display--mb">
                                </div>
                            </div>
                            <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.1s">
                                <div class="imageryGroup__title"><span class="f-h4">{{ __('about.vi.vi-image.amazing.title') }}</span></div>
                                <div class="imageryGroup__image">
                                    <img src="{{ asset(__('about.vi.vi-image.amazing.pcImg')) }}" alt="Amazing Taitung 綻放精彩" class="display--pc">
                                    <img src="{{ asset(__('about.vi.vi-image.amazing.mbImg')) }}" alt="Amazing Taitung 綻放精彩" class="display--mb">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- signs end --}}

        {{-- video start --}}
        <section class="section--video">
            <div class="waveBg">
                @include('user.about.svgWave')
                @include('user.about.svgWave')
                @include('user.about.svgWave')
            </div>
            <div class="section__content">
                <div class="container">
                    <div class="viGroup viGroup--video wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="viGroup__content">
                            <div class="videoFrame">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/-r_XCaG2WhY?si=hX_7aMpLsmbghZq0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- video end --}}
        @include('user.layout.marquee')
    </main>
    @include('user.layout.stickyBtns')
@endsection
