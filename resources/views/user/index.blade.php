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
                        <img src="{{ asset('images/opening/kv-title.svg') }}" class="image"
                            alt="2026 TAITUNG EXPO 台東博覽會">
                    </div>
                    <div class="hero__layer hero__layer--2 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.7s">
                        <img src="{{ asset('images/opening/kv-hashtag-ch.svg') }}" class="display--zh"
                            alt="#永續發展 #台東藍 #慢經濟 #南島文化">
                        <img src="{{ asset('images/opening/kv-hashtag-en.svg') }}" class="display--en"
                            alt="#sustainable development #Taitung blue #slow economy #Austronesian sulture">
                    </div>
                    <div class="hero__layer hero__layer--3 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="1s">
                        <img src="{{ asset('images/opening/kv-duration.svg') }}" class="display--pc"
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
    <section id="media" class="section section--media">
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
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- media end -->

    <h3 class="marquee">
        <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
        <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
        <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
        <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
        <div class="marquee__content"><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span><span class="title">EXPO 2026</span><span class="slogan">SLOW FOR LIFE</span></div>
    </h3>

    <!-- news start -->
    <div id="news" class="section section--news">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary">最新消息</span>
                <ul class="action">
                    <li>
                        <a href="#" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="cards">
                    <div class="swiper cardsSwiper js-cardSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="https://picsum.photos/id/232/300/300" alt="news_title">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">2026.3.17</div>
                                        <div class="title f-h4">新聞標題</div>
                                        <ul class="action">
											<li>
												<a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="https://picsum.photos/id/233/300/300" alt="東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">2026.3.19</div>
                                        <div class="title f-h4">東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍</div>
                                        <ul class="action">
											<li>
												<a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="https://picsum.photos/id/234/300/300" alt="東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">2026.3.19</div>
                                        <div class="title f-h4">東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍</div>
                                        <ul class="action">
											<li>
												<a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="https://picsum.photos/id/235/300/300" alt="2026台東博覽會首展《紅土之上棒球特展》3/21松菸開展，重現台東棒球百年榮光">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">2026.2.26</div>
                                        <div class="title f-h4">2026台東博覽會首展《紅土之上棒球特展》3/21松菸開展，重現台東棒球百年榮光</div>
                                        <ul class="action">
											<li>
												<a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="https://picsum.photos/id/236/300/300" alt="縣府辦理《冠軍之路》電影欣賞 預告2026台東博覽會：紅土之上棒球特展">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">2026.2.25</div>
                                        <div class="title f-h4">縣府辦理《冠軍之路》電影欣賞 預告2026台東博覽會：紅土之上棒球特展</div>
                                        <ul class="action">
											<li>
												<a href="#" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- news end -->

    <!-- event start -->
    <div id="event" class="section section--event">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary">今日活動表</span>
                <ul class="action">
                    <li>
                        <a href="#" class="btn btn--goSubpage is-light"><span class="btn__text">MORE</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="cards">
                    <div class="swiper cardsSwiper js-cardSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--dayOf">
                                    <div class="cardItem__text">
                                        <div class="time">10:00-12:00</div>
                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱</div>
										<div class="project">
											<div class="project__name"><span class="f-h5">2026臺灣國際熱氣球嘉年華</span></div>
											<div class="project__location"><span class="f-h5">台東鹿野高台</span></div>
											<div class="project__nature"><span class="f-h5">#工作坊</span></div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--dayOf">
                                    <div class="cardItem__text">
                                        <div class="time">10:00-12:00</div>
                                        <div class="title f-h4">活動名稱</div>
										<div class="project">
											<div class="project__name"><span class="f-h5">計畫名稱</span></div>
											<div class="project__location"><span class="f-h5">活動地點</span></div>
											<div class="project__nature"><span class="f-h5">#計畫性質</span></div>
										</div>
                                    </div>
                                </div>
                            </div>
							<div class="swiper-slide">
                                <div class="cardItem cardItem--dayOf">
                                    <div class="cardItem__text">
                                        <div class="time">15:00-16:00</div>
                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱活動名稱</div>
										<div class="project">
											<div class="project__name"><span class="f-h5">2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華2026臺灣國際熱氣球嘉年華</span></div>
											<div class="project__location"><span class="f-h5">台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台台東鹿野高台</span></div>
											<div class="project__nature"><span class="f-h5">#工作坊工作坊工作坊工作坊工作坊工作坊工作坊工作坊工作坊</span></div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardItem cardItem--dayOf">
                                    <div class="cardItem__text">
                                        <div class="time">15:00-16:00</div>
                                        <div class="title f-h4">活動名稱活動名稱活動名稱活動名稱</div>
										<div class="project">
											<div class="project__name"><span class="f-h5">2026臺灣國際熱氣球嘉年華</span></div>
											<div class="project__location"><span class="f-h5">台東鹿野高台</span></div>
											<div class="project__nature"><span class="f-h5">#工作坊</span></div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- event end -->
</main>

@endsection
