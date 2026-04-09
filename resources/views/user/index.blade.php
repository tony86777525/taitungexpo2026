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
                                <li class="tabOption__item js-tabOption-item is-active" data-tab-id="exh-a" role="option"><span class="text">{{ __('index.tab-title.tab1') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-b" role="option"><span class="text">{{ __('index.tab-title.tab2') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-c" role="option"><span class="text">{{ __('index.tab-title.tab3') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-d" role="option"><span class="text">{{ __('index.tab-title.tab4') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-e" role="option"><span class="text">{{ __('index.tab-title.tab5') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-f" role="option"><span class="text">{{ __('index.tab-title.tab6') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-g" role="option"><span class="text">{{ __('index.tab-title.tab7') }}</span></li>
                                <li class="tabOption__item js-tabOption-item" data-tab-id="exh-h" role="option"><span class="text">{{ __('index.tab-title.tab8') }}</span></li>
                            </ul>
                        </div>
                        <div class="tabGroup__content js-tabGroup-content">
                            <div class="tabContent js-tabList-item is-active" data-tab-content="exh-a">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_a.png') }}" alt="A 舊站特區" class="image">
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
                                        <img src="{{ asset('images/index/exhMap/exhMap_b.png') }}" alt="B 美術館區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        B 美術館區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-c">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_c.png') }}" alt="C 美學館區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        C 美學館區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-d">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_d.png') }}" alt="D 北町區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        D 北町區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-e">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_e.png') }}" alt="E 總圖區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        E 總圖區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-f">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_f.png') }}" alt="F 臨海區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        F 臨海區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-g">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_g.png') }}" alt="G 就藝會區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        G 就藝會區 內容
                                    </div>
                                </div>
                            </div>
                            <div class="tabContent js-tabList-item" data-tab-content="exh-h">
                                <div class="exhMap">
                                    <div class="exhMap__mapImage">
                                        <img src="{{ asset('images/index/exhMap/exhMap_h.png') }}" alt="H 衛星展區" class="image">
                                    </div>
                                    <div class="exhMap__mapList">
                                        H 衛星展區 內容
                                    </div>
                                </div>
                            </div>
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
                                            <div class="cardItem cardItem--dayOf">
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
