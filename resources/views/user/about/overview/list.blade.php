@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/overview/list.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/overview/list.js')
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
                            <div class="filterGroup filterGroup--overview js-filterGroup-select">
                                <div class="filterGroup__selector" aria-haspopup="listbox" aria-expanded="false">
                                    <div class="filterSelect js-filterSelect">
                                        <span class="filterSelect__text f-h4 js-selectedOption">ALL</span>
                                    </div>

                                    <ul class="filterOption jc-center" role="listbox">
                                        @foreach($zones as $zone)
                                            <li
                                                class="filterOption__item js-filterOption-item @if($zone->id === $currentZoneId || empty($currentZoneId) && $loop->first) is-active @endif"
                                                data-filter-id="{{ $zone->display_html_tag }}"
                                                role="option"
                                            >
                                                <a
                                                    href="{{ lang_route('user.about.overview', ['zone' => $zone->id]) }}"
                                                    class="text"
                                                >{{ $zone->display_code_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="filterGroup__content js-filterGroup-content">
                                    <div class="cardsList cardsList--collapseScroll js-collapse-list">
                                        @foreach($exhibitionOverviewProjects as $project)
                                            <a href="{{ $project->display_url }}" class="cardItem cardItem--overview" data-filter-target="{{ $zone->display_html_tag }}">
                                                <div class="cardItem__image">
                                                    <img src="{{ $project->display_thumbnail }}" alt="{{ $project->display_project_name }}">
                                                </div>
                                                <div class="cardItem__text">
                                                    <div class="venue">
                                                        <div class="venue__icon"><img src="{{ $project->display_logo }}"></div>
                                                        <div class="venue__label">{{ $project->display_venue_number }}</div>
                                                    </div>
                                                    <div class="title f-h4">{{ $project->display_project_name }}</div>
                                                    <div class="project">
                                                        @if(!empty($project->display_project_location))
                                                            <div class="project__location"><span class="f-h5">{{ $project->display_project_location }}</span></div>
                                                        @endif
                                                        @if(!empty($project->display_curation_nature_name))
                                                            <div class="project__theme"><span class="f-h5">{{ $project->display_curation_nature_name }}</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    @if($exhibitionOverviewProjects->isNotEmpty() && $exhibitionOverviewProjects->count() > 3)
                                        <div class="action js-collapse-action">
                                            <button class="btn btn--collapse is-light js-collapse-button"><span class="btn__text" data-expand-text="{{ __('about.overview.collapseText.expand') }}"  data-collapse-text="{{ __('about.overview.collapseText.collapse') }}">{{ __('about.overview.collapseText.expand') }}</span></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eventGroup eventGroup--featured">
                    <div class="eventGroup__title">
                        <div class="container">
                            <div class="title f-title-primary is-pageTitle">{{ __('about.overview.section2.title') }}</div>
                            <span class="desc f-p">{{ __('about.overview.section2.desc') }}</span>
                        </div>
                    </div>
                    <div class="eventGroup__content">
                        <div class="container">
                            <div class="cardsList cardsList--collapseScroll js-collapse-list">
                                @foreach($eventProjects as $project)
                                    <a href="{{ $project->display_url }}" class="cardItem cardItem--overview" data-filter-target="{{ $zone->display_html_tag }}">
                                        <div class="cardItem__image">
                                            <img src="{{ $project->display_thumbnail }}" alt="{{ $project->display_project_name }}">
                                        </div>
                                        <div class="cardItem__text">
                                            <div class="venue">
                                                <div class="venue__label">{{ $project->display_venue_number }}</div>
                                            </div>
                                            <div class="title f-h4">{{ $project->display_project_name }}</div>
                                            <div class="project">
                                                @if(!empty($project->display_project_location))
                                                    <div class="project__location"><span class="f-h5">{{ $project->display_project_location }}</span></div>
                                                @endif
                                                @if(!empty($project->display_curation_nature_name))
                                                    <div class="project__theme"><span class="f-h5">{{ $project->display_curation_nature_name }}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            @if($eventProjects->isNotEmpty() && $eventProjects->count() > 3)
                                <div class="action js-collapse-action">
                                    <button class="btn btn--collapse is-light js-collapse-button"><span class="btn__text" data-expand-text="{{ __('about.overview.collapseText.expand') }}"  data-collapse-text="{{ __('about.overview.collapseText.collapse') }}">{{ __('about.overview.collapseText.expand') }}</span></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="eventGroup eventGroup--community">
                    <div class="eventGroup__title">
                        <div class="container">
                            <div class="title f-title-primary is-pageTitle">{{ __('about.overview.section3.title') }}</div>
                            <span class="desc f-p">{{ __('about.overview.section3.desc') }}</span>
                        </div>
                    </div>
                    <div class="eventGroup__content">
                        <div class="container">
                            <div class="action">
                                <a href="{{ lang_route('user.participation.list') }}" class="btn btn--blankPage is-light"><span class="btn__text">MORE</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eventGroup eventGroup--partner">
                    <div class="eventGroup__title">
                        <div class="container">
                            <div class="title f-title-primary is-pageTitle">{{ __('about.overview.section4.title') }}</div>
                        </div>
                    </div>
                    <div class="eventGroup__content">
                        <div class="container">
                            <div class="cardsList cardsList--swiper imageSwiper cardsSwiper">
                                <div class="swiper js-cardSwiper">
                                    <ul class="featuresList swiper-wrapper">
                                        <li class="swiper-slide">
                                            <div class="featuresBox">
                                                <img src="{{ asset('images/about/overview/img_feature-1.webp') }}" alt="國立臺灣史前文化博物館" class="featureImage">
                                                <a href="https://www.nmp.gov.tw" class="featureText featureText--front" target="_blank">{!! __('about.overview.features.feature1') !!}</a>
                                            </div>
                                        </li>
                                        <li class="swiper-slide">
                                            <div class="featuresBox">
                                                <img src="{{ asset('images/about/overview/img_feature-2.webp') }}" alt="江賢二藝術園區" class="featureImage">
                                                <a href="https://www.paulchiang.org/?locale=tw" class="featureText featureText--front" target="_blank">{!! __('about.overview.features.feature2') !!}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('user.layout.balloon')
            </div>
        </section>

        {{-- map start --}}
        <section class="section--map">
            <div class="deco-curve"></div>
            <div class="container">
                <div class="section__title">
                    <span class="title f-title-primary is-pageTitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">展區地圖</span>
                </div>
                <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                    <div class="map">
                        <div class="map__image wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ asset('images/about/overview/img_exhMap-all.png') }}" alt="">
                        </div>
                        <ul class="map__action wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            {{-- <li><a href="#" class="btn btn--blankPage is-yellow" target="_blank"><span class="btn__text">{{ __('about.overview.map.button1') }}</span></a></li> --}}
                            <li><a href="https://reurl.cc/4lmy8L" class="btn btn--blankPage is-yellow" target="_blank"><span class="btn__text">{{ __('about.overview.map.button2') }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        {{-- map end --}}
        @include('user.layout.marquee')
    </main>
    @include('user.layout.stickyBtns')
@endsection
