@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/index.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/index.js')
    <script src="https://www.youtube.com/iframe_api"></script>
@endpush

@section('content')
    <main class="main">
        <!-- opening start -->
        <section class="opening">
            <div class="hero">
                <div class="hero__wrap hero__wrap--layer1">
                    <div class="hero__layer hero__layer--1 wow fadeIn" data-wow-duration="0s" data-wow-delay="0">
                        Slow for life
                    </div>
                </div>
                <div class="hero__wrap hero__wrap--layer2">
                    <div class="container">
                        <div class="hero__layer hero__layer--2 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.4s">
                            <img src="{{ asset('images/index/opening/kv-title.svg') }}" class="image"
                                 alt="2026 TAITUNG EXPO 台東博覽會">
                        </div>
                        <div class="hero__layer hero__layer--2 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.7s">
                            <img src="{{ asset('images/index/opening/kv-hashtag-ch.svg') }}" class="display--zh"
                                 alt="#永續發展 #台東藍 #慢經濟 #南島文化">
                            <img src="{{ asset('images/index/opening/kv-hashtag-en.svg') }}" class="display--en"
                                 alt="#sustainable development #Taitung blue #slow economy #Austronesian sulture">
                        </div>
                        <div class="hero__layer hero__layer--3 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s">
                            <img src="{{ asset('images/index/opening/kv-duration.svg') }}" class="display--pc"
                                 alt="07/03 Fri. - 08/20 Thu.">
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro">
                <div class="container">
                    <p class="intro__text introText f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s">{{ __('index.hero.paragraph1') }}</p>
                    <p class="intro__text introText f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s">{{ __('index.hero.paragraph2') }}</p>
                    <p class="intro__text introText f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s">{{ __('index.hero.paragraph3') }}</p>
                </div>
            </div>
        </section>
        <!-- opening end -->

        <!-- media start -->
        <section class="section section--media">
            <div class="deco-curve"></div>
            <div class="container">
                <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                    <div class="swiper videoSwiper js-mediaSwiper">
                        <div class="swiper-wrapper">
                            <!-- Slide 3: webM影片 -->
                            <div class="swiper-slide videoFrame" data-video="true">
                                <video playsinline controls muted>
                                    <source src="{{ asset('images/index/hero.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <!-- Slide 1: webP圖片 -->
                            {{-- <div class="swiper-slide videoFrame">
                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop" alt="Mountain landscape">
                                <div class="videoFrame__text">
                                    <div class="paragraph">說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字</div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- media end -->
        @include('user.layout.marquee')
        <!-- news start -->
        @if($articles->isNotEmpty())
            <section class="section section--news">
                <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="container">
                        <span class="title f-title-primary is-pageTitle">{{ __('index.section-title.latest-news') }}</span>
                        <ul class="action">
                            <li>
                                <a href="{{ lang_route('user.news.list') }}" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                    <div class="container">
                        <div class="cardsList cardsList--swiper cardsSwiper">
                            <div class="swiper js-cardSwiper">
                                <div class="swiper-wrapper">
                                    @foreach($articles as $article)
                                        <div class="swiper-slide">
                                            <div class="cardItem cardItem--news">
                                                <div class="cardItem__image">
                                                    <img src="{{ $article->display_thumbnail }}" alt="{{ $article->display_title }}">
                                                </div>
                                                <div class="cardItem__text">
                                                    <div class="date">{{ $article->display_published_at }}</div>
                                                    <div class="title f-h4">{{ $article->display_title }}</div>
                                                    <ul class="action">
                                                        <li>
                                                            <a href="{{ $article->display_url }}" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- news end -->

        <!-- exhibition start -->
        <section class="section section--exhibition">
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">{{ __('index.section-title.exhibition-area') }}</span>
                    <ul class="action">
                        <li>
                            <a href="#" class="btn btn--goSubpage is-dark"><span class="btn__text">MORE</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                <div class="container">
                    <div class="tabGroup tabGroup--select js-tabGroup">
                        <div class="tabGroup__selector js-tabGroup-selector" role="button" aria-haspopup="listbox" aria-expanded="false">
                            <div class="tabSelect js-tabSelect">
                                <span class="tabSelect__text f-h4 js-selectedOption">A 舊站特區</span>
                            </div>
                            <ul class="tabOption jc-start js-tabOption" role="listbox">
                                @foreach($zones as $zone)
                                    <li class="tabOption__item js-tabOption-item @if($loop->first) is-active @endif" data-tab-id="{{ $zone->display_html_tag }}" role="option"><span class="text">{{ $zone->display_code_name }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tabGroup__content js-tabGroup-content">
                            @foreach($zones as $zone)
                                <div class="tabContent js-tabList-item @if($loop->first) is-active @endif" data-tab-content="{{ $zone->display_html_tag }}">
                                    <div class="exhMap">
                                        <div class="exhMap__mapImage">
                                            <img src="{{ $zone->display_map_image }}" alt="{{ $zone->display_code_name }}" class="image">
                                        </div>
                                        <div class="exhMap__mapList">
                                            <div class="cardsList cardsList--exhMap">
                                                @foreach($zone->exhibitionOverviewProjects as $project)
                                                    <a href="{{ $project->display_url }}" class="cardItem cardItem--exhMap">
                                                        <div class="cardItem__venue">
                                                            <div class="label"><img src="{{ $project->display_logo }}" alt="{{ $project->display_project_name }}"></div>
                                                            <span class="text">{{ $project->display_venue_number }}</span>
                                                        </div>
                                                        <div class="cardItem__text">
                                                            <div class="title f-h4">{{ $project->display_project_name }}</div>
                                                            <div class="project">
                                                                @if(!empty($project->display_project_location))
                                                                    <div class="project__location"><span class="f-h6">{{ $project->display_project_location }}</span></div>
                                                                @endif
                                                                @if(!empty($project->display_curation_nature_name))
                                                                    <div class="project__type"><span class="f-h5">{{ $project->display_curation_nature_name }}</span></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('user.layout.balloon')
        </section>
        <!-- exhibition end -->

        <!-- day of start -->
        <section class="section section--dayOf">
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">{{ __('index.section-title.today-event') }}</span>
                    <ul class="action">
                        <li>
                            <a href="{{ lang_route('user.event.list') }}" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            @if($activities->isNotEmpty())
                <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                    <div class="container">
                        <div class="cardsList cardsList--swiper cardsSwiper">
                            <div class="swiper js-cardSwiper">
                                <div class="swiper-wrapper">
                                    @foreach($activities as $activity)
                                        <div class="swiper-slide">
                                            <a href="{{ $activity->display_url }}" class="cardItem cardItem--dayOf">
                                                <div class="cardItem__text">
                                                    <div class="time">{{ $activity->display_time_range }}</div>
                                                    <div class="title f-h4">{{ $activity->display_title }}</div>
                                                    <div class="project">
                                                        <div class="project__name"><span class="f-h5">{{ $activity->display_project_name }}</span></div>
                                                        <div class="project__location"><span class="f-h5">{{ $activity->display_activity_location }}</span></div>
                                                        @if($activity->getProjectNatures()->isNotEmpty())
                                                            <ul class="project__nature">
                                                                @foreach($activity->getProjectNatures() as $nature)
                                                                    <li><span class="f-h5">{{ $nature->display_name }}</span></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- day of start end -->
        </section>
        <!-- event end -->
    </main>
    @include('user.layout.stickyBtns')
@endsection
