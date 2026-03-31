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
                <p class="intro__text introText f-p wow fadeIn" data-json-key="text" data-wow-duration="0.3s" data-wow-delay="1s"
                    data-json-key="introText1">在台東，「慢」不只是速度，更是一種選擇——選擇與自然共生，與土地共鳴的生活哲學。</p>
                <p class="intro__text introText f-p wow fadeIn" data-json-key="text" data-wow-duration="0.3s" data-wow-delay="1s"
                    data-json-key="introText2">2026 台東博覽會，以「慢經濟」為策展核心，綻放「台東藍」為願景，融合南島文化精神與永續發展理念，鋪展山之路、海之路，到通往世界之路的未來藍圖。</p>
                <p class="intro__text introText f-p wow fadeIn" data-json-key="text" data-wow-duration="0.3s" data-wow-delay="1s"
                    data-json-key="introText3">誠摯邀請每一位踏上台東的人，放慢腳步，品味這片土地的靜謐與豐盛，找回生活最純粹的節奏。</p>
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
                        <!-- Slide 0: YouTube影片 -->
                        <div class="swiper-slide videoFrame" data-youtube="true">
                            <iframe id="youtube-player-1"
                                    src="https://www.youtube.com/embed/L1jH8EZP5zQ?enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>

                        <!-- Slide 1: webP圖片 -->
                        <div class="swiper-slide videoFrame">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop" alt="Mountain landscape">
                        </div>

                        <!-- Slide 2: webP圖片 -->
                        <div class="swiper-slide videoFrame">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800&h=600&fit=crop" alt="Nature scene">
                        </div>

                        <!-- Slide 3: webM影片 -->
                        <div class="swiper-slide videoFrame" data-video="true">
                            <video playsinline controls muted>
                                <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <!-- Slide 4: webP圖片 -->
                        <div class="swiper-slide videoFrame">
                            <img src="https://images.unsplash.com/photo-1511593358241-7eea1f3c84e5?w=800&h=600&fit=crop" alt="Sunset">
                        </div>

                        <!-- Slide 5: webM影片 -->
                        <div class="swiper-slide videoFrame" data-video="true">
                            <video playsinline controls muted>
                                <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <!-- Slide 6: webP圖片 -->
                        <div class="swiper-slide videoFrame">
                            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&h=600&fit=crop" alt="Beach">
                        </div>

                        <!-- Slide 7: YouTube影片 -->
                        <div class="swiper-slide videoFrame" data-youtube="true">
                            <iframe id="youtube-player-2"
                                    src="https://www.youtube.com/embed/dQw4w9WgXcQ?enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>

                        <!-- Slide 8: webP圖片 -->
                        <div class="swiper-slide videoFrame">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop" alt="Mountain">
                        </div>

                        <!-- Slide 9: YouTube影片 -->
                        <div class="swiper-slide videoFrame" data-youtube="true">
                            <iframe id="youtube-player-3"
                                    src="https://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>
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
                    <span class="title f-title-primary">{{ __('frontend.articles') }}</span>
                    <ul class="action">
                        <li>
                            <a href="{{ route('user.news.list') }}" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
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
                    <span class="title f-title-primary">展區一覽</span>
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
                            <li class="tabOption__item js-tabOption-item is-active" data-tab-id="exh-a" role="option"><span class="text">A 舊站特區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-b" role="option"><span class="text">B 美術館區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-c" role="option"><span class="text">C 美學館區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-d" role="option"><span class="text">D 北町區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-e" role="option"><span class="text">E 總圖區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-f" role="option"><span class="text">F 臨海區</span></li>
                            <!-- <li class="tabOption__item js-tabOption-item" data-tab-id="exh-g" role="option"><span class="text">G 就藝會區</span></li>
                            <li class="tabOption__item js-tabOption-item" data-tab-id="exh-h" role="option"><span class="text">H 衛星展區</span></li> -->
                        </ul>
                    </div>
                    <div class="tabGroup__content js-tabGroup-content">
                        <div class="tabContent js-tabList-item is-active" data-tab-content="exh-a">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_a.webp') }}" alt="A 舊站特區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    <div class="exhibitionList">
                                        <div class="exhibitionList__item">
                                            <div class="cardsList cardsList--exhMap">
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">A1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">A1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">A1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">A1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">B1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">C2</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌台東品牌台東品牌台東品牌台東品牌台東品牌台東品牌台東品牌台東品牌台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">B1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="cardItem cardItem--exhMap">
                                                    <div class="cardItem__venue">
                                                        <span class="text">A1</span>
                                                    </div>
                                                    <div class="cardItem__text">
                                                        <div class="title f-h4">活動名稱</div>
                                                        <div class="project">
                                                            <div class="project__location"><span class="f-h6">台東鹿野高台</span></div>
                                                            <div class="project__type"><span class="f-h5">#台東品牌</span></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-b">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_b.webp') }}" alt="B 美術館區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    B 美術館區 內容
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-c">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_c.webp') }}" alt="C 美學館區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    C 美學館區 內容
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-d">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_d.webp') }}" alt="D 北町區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    D 北町區 內容
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-e">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_e.webp') }}" alt="E 總圖區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    E 總圖區 內容
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-f">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_f.webp') }}" alt="F 臨海區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    F 臨海區 內容
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tabContent js-tabList-item" data-tab-content="exh-g">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_g.webp') }}" alt="G 就藝會區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    G 就藝會區 內容
                                </div>
                            </div>
                        </div>
                        <div class="tabContent js-tabList-item" data-tab-content="exh-h">
                            <div class="exhMap">
                                <div class="exhMap__mapImage">
                                    <img src="{{ asset('images/index/exhMap/exhMap_h.webp') }}" alt="H 衛星展區" class="image">
                                </div>
                                <div class="exhMap__mapList">
                                    H 衛星展區 內容
                                </div>
                            </div>
                        </div> -->
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
                <span class="title f-title-primary">{{ __('frontend.today_activity_list') }}</span>
                <ul class="action">
                    <li>
                        <a href="#" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @if($activitySessions->isNotEmpty())
            <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                <div class="container">
                    <div class="cardsList cardsList--swiper cardsSwiper">
                        <div class="swiper js-cardSwiper">
                            <div class="swiper-wrapper">
                                @foreach($activitySessions as $activitySession)
                                    <div class="swiper-slide">
                                        <div class="cardItem cardItem--dayOf">
                                            <div class="cardItem__text">
                                                <div class="time">{{ $activitySession->display_time_range }}</div>
                                                <div class="title f-h4">{{ $activitySession->display_activity_title_name }}</div>
                                                <div class="project">
                                                    <div class="project__name"><span class="f-h5">{{ $activitySession->display_project_name }}</span></div>
                                                    <div class="project__location"><span class="f-h5">{{ $activitySession->display_activity_activity_location }}</span></div>
                                                    @if($activitySession->getProjectNatures()->isNotEmpty())
                                                        <ul class="project__nature">
                                                            @foreach($activitySession->getProjectNatures() as $nature)
                                                                <li><span class="f-h5">{{ $nature->display_name }}</span></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
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
        @endif
    <!-- day of start end -->
    </section>
    <!-- event end -->
</main>
@include('user.layout.stickyBtns')
@endsection
