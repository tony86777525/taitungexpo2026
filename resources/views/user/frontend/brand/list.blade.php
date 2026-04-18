@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/brand/list.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/brand/list.js')
@endpush

@section('content')
<main class="main">
    <div class="section section--intro">
        <div class="container">
            <div class="section__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                <span class="title f-title-primary">品牌授權專區</span>
            </div>
            <div class="section__content">
                <div class="intro wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                    <div class="paragraph f-p">{!! __('brand.intro.paragraph1') !!}</div>
                    <div class="paragraph f-p">{!! __('brand.intro.paragraph2') !!}</div>
                    <div class="paragraph f-p display--en">{!! __('brand.intro.paragraph3') !!}</div>
                    <div class="paragraph f-p display--en">{!! __('brand.intro.paragraph4') !!}</div>
                    <ul class="list">
                        <li>{{ __('brand.intro.note') }}<br><a href="mailto:info@taitung2026.com.tw">info@taitung2026.com.tw</a> / LINE：<a href="https://lin.ee/xC0cxGi" target="_blank">＠ttexpo</a></li>
                    </ul>
                </div>
                <div class="imageList imageSwiper wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.8s">
                    <div class="swiper js-singleImgSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="{{ asset('images/brand/banner.webp') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <ul class="action">
                    <li><a href="https://reurl.cc/18on8D" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('brand.intro.buttons.btnText1') }}</span></a></li>
                    <li><a href="https://reurl.cc/LQ84o7" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('brand.intro.buttons.btnText2') }}</span></a></li>
                    <li><a href="https://reurl.cc/VmrNZb" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('brand.intro.buttons.btnText3') }}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section section--event">
        <div class="container">
            <div class="section__content">
                <div class="eventGroup wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                    <div class="title f-title-primary">{{ __('brand.event.event1.title') }}</div>
                    <div class="intro">
                        <div class="paragraph f-p">{{ __('brand.event.event1.topic1.date') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event1.topic1.location') }}</div>
                    </div>
                    <ul class="action">
                        <li><a href="#" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('brand.event.event1.buttons.btnText1') }}</span></a></li>
                    </ul>
                </div>
                <div class="eventGroup wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                    <div class="title f-title-primary">{{ __('brand.event.event2.title') }}</div>
                    <div class="intro">
                        <div class="paragraph f-p">{{ __('brand.event.event2.topic1.date') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event2.topic1.location') }}</div>
                    </div>
                    <ul class="action">
                        <li><a href="#" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('brand.event.event2.buttons.btnText1') }}</span></a></li>
                    </ul>
                </div>
                <div class="eventGroup wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                    <div class="title f-title-primary">{{ __('brand.event.event3.title') }}</div>
                    <div class="intro">
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic1.topic') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic1.date') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic1.location') }}</div>
                    </div>
                    <div class="intro">
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic2.topic') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic2.date') }}</div>
                        <div class="paragraph f-p">{{ __('brand.event.event3.topic2.location') }}</div>
                    </div>
                    <ul class="action">
                        <li><a href="#" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('brand.event.event3.buttons.btnText1') }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="list" class="section section--list">
        <div class="section__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
            <div class="container">
                <span class="title f-title-primary is-pageTitle">計畫一覽</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
            <div class="container">
                <div class="filterGroup filterGroup--fakeSelect js-filterGroup-select">
                    <div class="filterGroup__selector" aria-haspopup="listbox" aria-expanded="false">
                        <div class="filterSelect js-filterSelect">
                            <span class="filterSelect__text f-h4 js-selectedOption">ALL</span>
                        </div>
                        <ul class="filterOption jc-center" role="listbox">
                            <li class="filterOption__item js-filterOption-item is-active" data-filter-id="all" role="option"><span class="text">{{ __('brand.list.filters.filterTxt1') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="sips" role="option"><span class="text">{{ __('brand.list.filters.filterTxt2') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="food" role="option"><span class="text">{{ __('brand.list.filters.filterTxt3') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="craft" role="option"><span class="text">{{ __('brand.list.filters.filterTxt4') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="living" role="option"><span class="text">{{ __('brand.list.filters.filterTxt5') }}</span></li>
                        </ul>
                    </div>
                    <div class="filterGroup__content js-filterGroup-content">
                        <div class="cardsList cardsList--default">
                            <div class="cardItem cardItem--brand" data-filter-target="living">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/516/300/300" alt="brand_title">
                                </div>
                                <div class="cardItem__text">
                                    <div class="title f-h4">商家名稱商家名稱</div>
                                    <ul class="action">
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">MORE</span></a></li>
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">SHOP</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cardItem cardItem--brand" data-filter-target="living">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/233/300/300" alt="brand_title">
                                </div>
                                <div class="cardItem__text">
                                    <div class="title f-h4">商家名稱商家名稱商家名稱商家名稱商家名稱</div>
                                    <ul class="action">
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">MORE</span></a></li>
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">SHOP</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cardItem cardItem--brand" data-filter-target="living">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/232/300/300" alt="brand_title">
                                </div>
                                <div class="cardItem__text">
                                    <div class="title f-h4">商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱商家名稱</div>
                                    <ul class="action">
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">MORE</span></a></li>
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">SHOP</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cardItem cardItem--brand" data-filter-target="living">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/212/300/300" alt="brand_title">
                                </div>
                                <div class="cardItem__text">
                                    <div class="title f-h4">商家名稱</div>
                                    <ul class="action">
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">MORE</span></a></li>
                                        <li><a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">SHOP</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination">
                            <li class="pagination__item pagination__item--prev is-disabled"><span class="text">PREV</span></li>
                            <li class="pagination__item pagination__item--num is-current"><span class="text">1</span></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">2</a></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">3</a></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">4</a></li>
                            <li class="pagination__item pagination__item--ellipsis"><span class="text">...</span></li>
                            <li class="pagination__item pagination__item--next"><a href="#" class="text">NEXT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('user.frontend.layout.stickyBtns')
@endsection
