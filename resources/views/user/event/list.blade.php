@extends('user.layout.wrapper')

@section('metas')
    <meta name="api-get-event-list" content="{{ lang_route('api.get.event.list') }}">
@endsection

@push('styles')
    @vite('resources/scss/user/event/list.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/event/list.js')
@endpush

@section('content')
    <main class="main">
        <section class="section section--calendar">
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">{{ __('event.page-title') }}</span>
                </div>
            </div>
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                <div class="container">
                    <div class="searchBar">
                        <div class="searchBar__content searchBar__content--datepicker">
                            <div class="text f-p">{{ __('event.top.search-text1') }}</div>
                            <div class="action">
                                <label for="datepicker" class="datepickerItem datepickerItem--icon"></label>
                                <input id="datepicker" class="datepickerItem datepickerItem--input" readonly data-toggle="datepicker">
                            </div>
                        </div>
                        <div class="searchBar__content searchBar__content--links">
                            <div class="text f-p">{{ __('event.top.search-text2-start') }}</div>
                            <div class="action"><a href="{{ lang_route('user.about.overview') }}" class="btn btn--inside"><span class="btn__text">{{ __('event.top.link-text') }}</span></a></div>
                            <div class="text f-p">{{ __('event.top.search-text2-end') }}</div>
                        </div>
                    </div>
                    <div class="calendar calendarSwiper">
                        <div class="swiper js-calendarSwiper">
                            <div class="swiper-wrapper">
                                <!-- dynamic swiper items -->
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="result" id="search-result"></div>
                </div>
            </div>
        </section>
        <h3 class="marquee">
            <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
            <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
            <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
            <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
            <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
        </h3>
    </main>
    @include('user.layout.stickyBtns')
    <script>
        window.eventDays = @json($eventDays);
    </script>
@endsection
