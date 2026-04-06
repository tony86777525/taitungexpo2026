@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/overview.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/overview.js')
@endpush

@section('content')
    <main class="main">
        <section class="section section--topic">
            <div class="section__title">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">{{ __('about.overview.page-title') }}</span>
                </div>
            </div>
            <div class="section__content">
                <div class="eventGroup eventGroup--theme">
                    <div class="eventGroup__title">
                        <div class="container">
                            <div class="title f-title-primary is-pageTitle">{{ __('about.overview.section1.title') }}</div>
                            <span class="desc f-p">{{ __('about.overview.section1.desc') }}</span>
                        </div>
                    </div>
                    <div class="eventGroup__content">
                        <div class="container">
                            <div class="filterGroup filterGroup--overview js-filterGroup-select" aria-haspopup="listbox" aria-expanded="false">
                                <div class="filterSelect js-filterSelect">
                                    <span class="filterSelect__text f-h4 js-selectedOption">ALL</span>
                                </div>
                                <div class="filterGroup__selector" aria-haspopup="listbox" aria-expanded="false">
                                    <ul class="filterOption jc-center" role="listbox">
                                        <li class="filterOption__item js-filterOption-item is-active" data-filter-id="exh-a" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt1') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-b" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt2') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-c" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt3') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-d" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt4') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-e" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt5') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-f" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt6') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-g" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt7') }}</span></li>
                                        <li class="filterOption__item js-filterOption-item" data-filter-id="exh-h" role="option"><span class="text">{{ __('about.overview.section1.filters.filterTxt8') }}</span></li>
                                    </ul>
                                </div>
                                <div class="filterGroup__content js-filterGroup-content">
                                    <div class="cardsList cardsList--collapseScroll js-collapse-list">
                                        <div class="cardItem cardItem--overview" data-filter-target="exh-b">
                                            <div class="cardItem__image">
                                                <img src="https://picsum.photos/id/516/300/300" alt="brand_title">
                                            </div>
                                            <div class="cardItem__text">
                                                <div class="venue">
                                                    <div class="venue__icon"><img src="{{ asset('images/icon_balloon-9.svg') }}"></div>
                                                    <div class="venue__label">B2</div>
                                                </div>
                                                <div class="title f-h4">商家名稱商家名稱</div>
                                                <div class="project">
                                                    <div class="project__location"><span class="f-h5">台東鹿野高台</span></div>
                                                    <div class="project__theme"><span class="text">#空氣</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardItem cardItem--overview" data-filter-target="exh-a">
                                            <div class="cardItem__image">
                                                <img src="https://picsum.photos/id/233/300/300" alt="brand_title">
                                            </div>
                                            <div class="cardItem__text">
                                                <div class="venue">
                                                    <div class="venue__icon"><img src="{{ asset('images/icon_balloon-7.svg') }}"></div>
                                                    <div class="venue__label">A1</div>
                                                </div>
                                                <div class="title f-h4">商家名稱商家名稱商家名稱商家名稱商家名稱</div>
                                                <div class="project">
                                                    <div class="project__location"><span class="f-h5">台東美術館-大文創教室</span></div>
                                                    <div class="project__theme"><span class="text">#水</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardItem cardItem--overview" data-filter-target="exh-c">
                                            <div class="cardItem__image">
                                                <img src="https://picsum.photos/id/232/300/300" alt="brand_title">
                                            </div>
                                            <div class="cardItem__text">
                                                <div class="venue">
                                                    <div class="venue__icon"><img src="{{ asset('images/icon_balloon-5.svg') }}"></div>
                                                    <div class="venue__label">C18</div>
                                                </div>
                                                <div class="title f-h4">商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱</div>
                                                <div class="project">
                                                    <div class="project__location"><span class="f-h5">台東美術館</span></div>
                                                    <div class="project__theme"><span class="text">#種子</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardItem cardItem--overview" data-filter-target="exh-e">
                                            <div class="cardItem__image">
                                                <img src="https://picsum.photos/id/212/300/300" alt="brand_title">
                                            </div>
                                            <div class="cardItem__text">
                                                <div class="venue">
                                                    <div class="venue__icon"><img src="{{ asset('images/icon_balloon-1.svg') }}"></div>
                                                    <div class="venue__label">E5</div>
                                                </div>
                                                <div class="title f-h4">商家名稱</div>
                                                <div class="project">
                                                    <div class="project__location"><span class="f-h5">台東金針花山</span></div>
                                                    <div class="project__theme"><span class="text">#聲音</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapseAction">
                                        <button class="btn btn--collapse is-light js-collapse-button"><span class="btn__text">完整內容</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('user.frontend.layout.balloon')
            </div>
        </section>

        {{-- map start --}}
        <section class="section--map">
            <div class="deco-curve"></div>
            <div class="container">
                <div class="section__title">
                    <span class="title f-title-primary wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">展區地圖</span>
                </div>
                <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                    地圖
                </div>
            </div>
        </section>
        {{-- map end --}}
        @include('user.layout.marquee')
    </main>
@endsection
