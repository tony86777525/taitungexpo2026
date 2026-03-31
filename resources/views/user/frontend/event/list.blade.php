@extends('user.frontend.layout.wrapper')

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
                <span class="title f-title-primary is-pageTitle">活動行事曆</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="searchBar">
                    <div class="searchBar__content searchBar__content--datepicker">
                        <div class="text f-p">快速選擇查詢日期</div>
                        <div class="action">
                            <label for="datepicker" class="datepickerItem datepickerItem--icon"></label>
                            <input id="datepicker" class="datepickerItem datepickerItem--input" readonly data-toggle="datepicker">
                        </div>
                    </div>
                    <div class="searchBar__content searchBar__content--links">
                        <div class="text f-p">如需瀏覽常態展覽資訊，請前往</div>
                        <div class="action"><a href="#" class="btn btn--inside"><span class="btn__text">展覽概覽</span></a></div>
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
                <div class="result">
                    <div class="result__hint f-p">本日無活動。</div>
                    <div class="result__list">
                        <div class="cardsList cardsList--column">
                            @include('user.frontend.event.card')
                            @include('user.frontend.event.card')
                            @include('user.frontend.event.card')
                            @include('user.frontend.event.card')
                            @include('user.frontend.event.card')
                            @include('user.frontend.event.card')
                        </div>
                    </div>
                </div>
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
@endsection
