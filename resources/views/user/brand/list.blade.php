@extends('user.layout.wrapper')

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
                    <span class="title f-title-primary">{{ __('brand.page-title') }}</span>
                </div>
                <div class="section__content">
                    <div class="intro wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                        <div class="paragraph f-p">{!! __('brand.intro.paragraph1') !!}</div>
                        <div class="paragraph f-p">{!! __('brand.intro.paragraph2') !!}</div>
                        <div class="paragraph f-p display--en">{!! __('brand.intro.paragraph3') !!}</div>
                        <div class="paragraph f-p display--en">{!! __('brand.intro.paragraph4') !!}</div>
                        <ul class="list">
                            <li>{{ __('brand.intro.note') }}<a href="mailto:info@taitung2026.com.tw">info@taitung2026.com.tw</a> / LINE：<a href="https://lin.ee/xC0cxGi" target="_blank">＠ttexpo</a></li>
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
                                @if(empty($currentBrandTagId))
                                    <span class="filterSelect__text f-h4 js-selectedOption">{{ __('brand.list.filters.filterTxt1') }}</span>
                                @elseif(!empty($brandTags->firstWhere('id', $currentBrandTagId)))
                                    <span class="filterSelect__text f-h4 js-selectedOption">{{ $brandTags->firstWhere('id', $currentBrandTagId)->display_name }}</span>
                                @endif
                            </div>
                            <ul class="filterOption jc-center" role="listbox">
                                <li class="filterOption__item js-filterOption-item @empty($currentBrandTagId) is-active @endif" data-filter-id="all" role="option">
                                    <a
                                        @if (!empty($currentBrandTagId))
                                            href="{{ lang_route('user.brand.list') }}#list"
                                        @endif
                                        class="text">{{ __('brand.list.filters.filterTxt1') }}</a>
                                </li>
                                @if ($brandTags->isNotEmpty())
                                    @foreach($brandTags as $brandTag)
                                        <li class="filterOption__item js-filterOption-item @if($brandTag->is_current_brand_tag) is-active @endif" role="option">
                                            <a
                                                @if($brandTag->is_current_brand_tag === false)
                                                    href="{{ $brandTag->display_url }}#list"
                                                @endif
                                                class="text"
                                            >{{ $brandTag->display_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="filterGroup__content js-filterGroup-content">
                            <div class="cardsList cardsList--default">
                                @foreach($brands as $brand)
                                    <div class="cardItem cardItem--brand" data-filter-target="living">
                                        <div class="cardItem__image">
                                            <img src="{{ $brand->display_thumbnail }}" alt="{{ $brand->display_name }}">
                                        </div>
                                        <div class="cardItem__text">
                                            <div class="title f-h4">{{ $brand->display_name }}</div>
                                            <ul class="action">
                                                <li><a href="{{ $brand->display_url }}" class="btn btn--goDetail" target="_blank"><span class="btn__text">MORE</span></a></li>
                                                @if(!empty($brand->url))
                                                    <li><a href="{{ $brand->url }}" class="btn btn--goDetail" target="_blank"><span class="btn__text">SHOP</span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('user.layout.stickyBtns')
@endsection
