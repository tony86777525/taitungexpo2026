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
        <div class="section__content">
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
                <span class="f-title-primary">最新消息</span>
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
                                        <div class="desc f-h5">新聞概述</div>
                                        <div class="more">
                                            <a href="#" class="btn btn--more" target="_blank"><span class="btn__text">MORE</span></a>
                                        </div>
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
                                        <div class="desc f-h5">全台首發聯名便當！69家好店推專屬優惠，消費集點抽好禮。邀請您自備餐盒，守護台東純淨山海。</div>
                                        <div class="more">
                                            <a href="https://www.facebook.com/taitungexpo2026/posts/pfbid0SZw9NEej79TwAsJ93JAx4fBXy4HHE1mcQrtCjzG4VFSzFGVPufk8TJZkZRAEYsYol" class="btn btn--more" target="_blank"><span class="btn__text">MORE</span></a>
                                        </div>
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
                                        <div class="desc f-h5">全台首發聯名便當！69家好店推專屬優惠，消費集點抽好禮。邀請您自備餐盒，守護台東純淨山海。</div>
                                        <div class="more">
                                            <a href="https://www.facebook.com/taitungexpo2026/posts/pfbid0SZw9NEej79TwAsJ93JAx4fBXy4HHE1mcQrtCjzG4VFSzFGVPufk8TJZkZRAEYsYol" class="btn btn--more" target="_blank"><span class="btn__text">MORE</span></a>
                                        </div>
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
                                        <div class="desc f-h5">作為2026年台東博覽會的序幕首展，《紅土之上棒球特展》將於3月21日(六)在台北松山文創園區A1倉庫盛大開幕。</div>
                                        <div class="more">
                                            <a href="https://ttbaseball.netlify.app/" class="btn btn--more" target="_blank"><span class="btn__text">MORE</span></a>
                                        </div>
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
                                        <div class="desc f-h5">爲激勵地方棒球小將，縣府舉辦《冠軍之路》電影欣賞，預告為呈現台東棒球的百年發展軌跡榮光，「2026台東博覽會：紅土之上棒球特展」將於3月21日至4月5日於台北松菸登場，邀請大家共襄盛舉。</div>
                                        <div class="more">
                                            <a href="https://www.taitung.gov.tw/News_Content.aspx?n=13370&amp;s=145176" class="btn btn--more" target="_blank"><span class="btn__text">MORE</span></a>
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
    <!-- news end -->

    

    <!-- preview start -->
    <div id="preview" class="section section--preview">
        <div class="section__content">
            <div class="previewGroup previewGroup--curating">
                <div class="hero">
                    <div class="container">
                        <div class="previewGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <span class="f-section-title" data-json-key="curatingTitle1">
                                <span>10大策展議題 X </span><span>超過13場大型展覽與活動 <i class="break-mb">X</i> </span><br class="display--pc">
                                <i class="break-pc">X</i> 台東12知名活動品牌聯動
                            </span>
                            <span class="f-section-title" data-json-key="curatingTitle2">
                                <span><i class="break-mb">——</i>2026年，邀您一起體驗</span><span>台東的多元精彩！</span>
                            </span>
                        </div>
                        <div class="previewGroup__content">
                            <div class="intro wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <p class="f-section-p" data-json-key="curatingIntro">由一顆落下台東土地的慢經濟種子開始，向下扎根，向上展望，逐漸萌芽、延展出「空氣」、「水」、「自然力量」、「聲音」、「漂流」、「生活」、「慢經濟體」、「台東品牌」與「永續台東」等策展議題，一層層勾勒出台東獨有的慢經濟想像藍圖。</p>
                            </div>
                            <div class="hint wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                                <span class="hint__text" data-json-key="curatingHint">點擊策展議題查看詳情</span>
                                <a href="#curatingMap" class="hint__icon js-anchor"><span class="arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="curatingMap" class="curatingMap wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="wheel-container">
                        <div class="click-overlay">
                            <svg class="wheel-svg" viewBox="0 0 500 639">
                                <!-- 扇形區域 1: 空氣 -->
                                <path class="wheel-section"
                                        data-section="1"
                                        data-name="空氣"
                                        d="M 250 250 L 250 2 A 248 248 0 0 1 425.3 74.7 Z"/>

                                <!-- 扇形區域 2: 水 -->
                                <path class="wheel-section"
                                        data-section="2"
                                        data-name="水"
                                        d="M 250 250 L 425.3 74.7 A 248 248 0 0 1 498 250 Z"/>

                                <!-- 扇形區域 3: 自然力量 -->
                                <path class="wheel-section"
                                        data-section="3"
                                        data-name="自然力量"
                                        d="M 250 250 L 498 250 A 248 248 0 0 1 425.3 425.3 Z"/>

                                <!-- 扇形區域 4: 聲音 -->
                                <path class="wheel-section"
                                        data-section="4"
                                        data-name="聲音"
                                        d="M 250 250 L 425.3 425.3 A 248 248 0 0 1 250 498 Z"/>

                                <!-- 扇形區域 5: 香氣 -->
                                <path class="wheel-section"
                                        data-section="5"
                                        data-name="香氣"
                                        d="M 250 250 L 250 498 A 248 248 0 0 1 74.7 425.3 Z"/>

                                <!-- 扇形區域 6: 生活 -->
                                <path class="wheel-section"
                                        data-section="6"
                                        data-name="生活"
                                        d="M 250 250 L 74.7 425.3 A 248 248 0 0 1 2 250 Z"/>

                                <!-- 扇形區域 7: 慢經濟 -->
                                <path class="wheel-section"
                                        data-section="7"
                                        data-name="慢經濟"
                                        d="M 250 250 L 2 250 A 248 248 0 0 1 74.7 74.7 Z"/>

                                <!-- 扇形區域 8: 台東品牌 -->
                                <path class="wheel-section"
                                        data-section="8"
                                        data-name="台東品牌"
                                        d="M 250 250 L 74.7 74.7 A 248 248 0 0 1 250 2 Z"/>

                                <!-- 中心圓圈: 種子 -->
                                <circle class="center-circle"
                                        cx="250" cy="250" r="80"
                                        data-section="center"
                                        data-name="種子"/>

                                <!-- 底部圓圈 9: 永續台東-->
                                <circle class="bottom-circle"
                                        cx="250" cy="543" r="96"
                                        data-section="9"
                                        data-name="永續台東"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="previewGroup previewGroup--features">
                <div class="container">
                    <div class="previewGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <span class="f-section-title" data-json-key="featuresTitle">
                            串連台東山海與特色活動品牌<br>
                            打造整年度的精彩！
                        </span>
                    </div>
                    <div class="previewGroup__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                        <ul class="featuresList">
                            <li>
                                <img src="{{ asset('images/features/img_feature-1.png') }}" alt="台東炮炸寒單爺" class="featureImage" data-json-key="feature1">
                                <a href="https://www.zztaitung.com/20114/taitung-bombhandan-2" class="featureText featureText--front" target="_blank" data-json-key="feature1">台東炮炸<br>寒單爺</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-2.png') }}" alt="自然醒慢活祭" class="featureImage" data-json-key="feature2">
                                <a href="https://www.taitungspiritfestival.tw" class="featureText featureText--front" target="_blank" data-json-key="feature2">自然醒<br>慢活祭</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-3.png') }}" alt="臺東慢食節" class="featureImage" data-json-key="feature3">
                                <a href="https://slowfoodtaitung.tw/festival" class="featureText featureText--front" target="_blank" data-json-key="feature3">臺東慢食節</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-4.png') }}" alt="PASIWALI原住民族國際音樂節" class="featureImage" data-json-key="feature4">
                                <a href="https://taiwanpasiwalifestival.com" class="featureText featureText--front" target="_blank" data-json-key="feature4">PASIWALI<br>原住民族<br>國際音樂節</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-5.png') }}" alt="台東最美星空" class="featureImage" data-json-key="feature5">
                                <a href="https://www.facebook.com/StarryTaitung/?locale=zh_TW" class="featureText featureText--front" target="_blank" data-json-key="feature5">台東<br>最美星空</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-6.png') }}" alt="臺灣國際熱氣球嘉年華" class="featureImage" data-json-key="feature6">
                                <a href="https://balloontaiwan.taitung.gov.tw/zh-tw" class="featureText featureText--front" target="_blank" data-json-key="feature6">臺灣國際<br>熱氣球嘉年華</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-7.png') }}" alt="臺灣國際衝浪公開賽" class="featureImage" data-json-key="feature7">
                                <a href="https://www.facebook.com/taiwanopenofsurfing/" class="featureText featureText--front" target="_blank" data-json-key="feature7">臺灣國際<br>衝浪公開賽</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-8.png') }}" alt="東海岸大地藝術節" class="featureImage" data-json-key="feature8">
                                <a href="https://www.eastcoast-nsa.gov.tw/teclandart/" class="featureText featureText--front" target="_blank" data-json-key="feature8">東海岸<br>大地藝術節</a>
                            </li>
                            <li class="multiple">
                                <img src="{{ asset('images/features/img_feature-9.png') }}" alt="南迴藝術季 縱谷大地藝術季" class="featureImage" data-json-key="feature9">
                                <div class="featureText featureText--front" data-json-key="feature9">
                                    南迴藝術季<br>縱谷大地藝術季
                                </div>
                                <div class="featureText featureText--back" data-json-key="feature9" data-links-container>
                                    <a href="https://www.facebook.com/NanhuiArtProject/?locale=zh_TW" target="_blank" data-link-index="0">南迴藝術季</a>
                                    <a href="https://www.eastcoast-nsa.gov.tw/teclandart/" target="_blank" data-link-index="1">縱谷大地藝術季</a>
                                </div>
                            </li>
                            <li class="multiple">
                                <img src="{{ asset('images/features/img_feature-10.png') }}" alt="臺東藝術節 臺東藝穗節" class="featureImage" data-json-key="feature10">
                                <div class="featureText featureText--front" data-json-key="feature10">
                                    臺東藝術節<br>臺東藝穗節
                                </div>
                                <div class="featureText featureText--back" data-json-key="feature10" data-links-container>
                                    <a href="https://www.facebook.com/Taitungartsfestival/?locale=zh_TW" target="_blank" data-link-index="0">臺東藝術節</a>
                                    <a href="https://www.taitungfringefestival.com" target="_blank" data-link-index="1">臺東藝穗節</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-11.png') }}" alt="池上秋收稻穗藝術節" class="featureImage" data-json-key="feature11">
                                <a href="https://www.facebook.com/Chishangarts.org" class="featureText featureText--front" target="_blank" data-json-key="feature11">池上秋收<br>稻穗藝術節</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/features/img_feature-12.png') }}" alt="台東光祭" class="featureImage" data-json-key="feature12">
                                <a href="https://www.facebook.com/TaitungLightFestival/?locale=zh_TW" class="featureText featureText--front" target="_blank" data-json-key="feature12">台東光祭</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preview end -->

    <!-- vi start -->
    <div id="vi" class="section section--vi">
        <div class="section__title">
            <div class="topic f-section-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.3s" data-json-key="title">品牌視覺系統</div>
            <div class="sub wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.6s" data-json-key="subtitle">Amazing Taitung</div>
        </div>
        <div class="section__content">
            <div class="viGroup viGroup--intro">
                <div class="container">
                    <div class="viGroup__content imgTextFlex">
                        <div class="coverImg imgTextFlex__image wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ asset('images/vi/img_logo.svg') }}" alt="台東博覽會 2026 TAITUNG EXPO">
                        </div>
                        <div class="introText imgTextFlex__text wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                            <div class="introText__title">
                                <div class="topic f-section-title" data-json-key="title">品牌視覺系統</div>
                                <div class="sub" data-json-key="subtitle">Amazing Taitung</div>
                            </div>
                            <div class="introText__paragraph">
                                <p class="f-section-p" data-json-key="introText1">臺灣國際熱氣球嘉年華已成為台東一年一度的重要盛事，熱氣球更象徵這片土地的獨特魅力。從充氣、燃燒器點燃，到氣囊漸漸成形並緩緩升空，這個過程宛如台東的成長軌跡——醞釀、蓄勢，最終自信綻放，翱翔天際，邁向無限可能。</p>
                                <p class="f-section-p" data-json-key="introText2">台東博覽會標誌設計以此意象為核心，運用具代表性的「台東藍」作為主色調，並結合熱氣球升起的動態美感，巧妙構築出一個視覺化的驚嘆號。不僅展現台東的活力與蓬勃發展，更象徵這片土地所蘊藏的無限驚喜——壯麗的自然景觀、深厚的人文底蘊、獨特的文化風貌，等待人們探索、感受與共鳴。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="viGroup__image wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <img src="{{ asset('images/vi/img_element-pc-zh.svg') }}" class="display--pc">
                    <img src="{{ asset('images/vi/img_element-mb-zh.svg') }}" class="display--mb">
                </div>
            </div>
            <div class="viGroup viGroup--imagery">
                <div class="container">
                    <div class="viGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><span class="f-section-title">標誌圖形意象</span></div>
                    <div class="viGroup__content">
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="imageryGroup__title"><span class="f-section-h4">自然的孕育</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/vi/img_nature-pc-zh.svg') }}" alt="自然的孕育" class="display--pc">
                                <img src="{{ asset('images/vi/img_nature-mb-zh.svg') }}" alt="自然的孕育" class="display--mb">
                            </div>
                        </div>
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                            <div class="imageryGroup__title"><span class="f-section-h4">文化的積累</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/vi/img_culture-pc-zh.svg') }}" alt="文化的積累" class="display--pc">
                                <img src="{{ asset('images/vi/img_culture-mb-zh.svg') }}" alt="文化的積累" class="display--mb">
                            </div>
                        </div>
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.1s">
                            <div class="imageryGroup__title"><span class="f-section-h4">Amazing Taitung 綻放精彩</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/vi/img_amazing-pc-zh.svg') }}" alt="Amazing Taitung 綻放精彩" class="display--pc">
                                <img src="{{ asset('images/vi/img_amazing-mb-zh.svg') }}" alt="Amazing Taitung 綻放精彩" class="display--mb">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- vi end -->

    <!-- participation start -->
    <div id="participation" class="section section--participation">
        <div class="container">
            <div class="section__title f-section-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <span class="f-section-title">民間參與計畫</span>
            </div>
            <div class="section__content imgTextFlex wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                <div class="imgTextFlex__text">
                    <div class="intro">
                        <p class="f-section-p">臺東縣政府推出「2026台東博覽會民間參與計畫」，邀請當地民間團體共同創造台東未來願景，透過創意實現對「台東博覽會」的獨特想像。本計畫將依循博覽會整體執行架構，並呼應聯合國17項永續發展目標（SDGs），公開徵選具前瞻性與多元觀點的策展提案。預計遴選至少12件計畫，透過民間的策展能量，共同勾勒台東多元而永續的未來藍圖，讓世界看見台東的創意與行動力！</p>
                    </div>

                    <!-- <div class="rule">
                        <div class="rule__title">民間參與計畫—開放式會議(OST)</div>
                        <ul class="rule__list rule__list--p">
                            <li class="f-section-h5">在民間參與計畫啟動前，將透過OST(Open Space Technology)開放空間會議，以不同以往的對話方式相聚討論，邀請民眾一起來參與，共同創造台東行動藍圖與未來想像！</li>
                        </ul>
                    </div> -->
                    <div class="rule">
                        <div class="rule__title">活動時間</div>
                        <ul class="rule__list rule__list--li">
                            <li class="f-section-h5">市區場｜114年8月16日(六) 9:00-18:30</li>
                            <li class="f-section-h5">縱谷場｜114年8月17日(日)  9:00-17:30 </li>
                            <li class="f-section-h5">海岸場｜114年8月25日(一)  9:00-17:30</li>
                            <li class="f-section-h5">南迴場｜114年8月26日(二)  9:00-17:30 </li>
                        </ul>
                    </div>
                    <ul class="action">
                        <li><a href="https://forms.gle/MsARv9eAtz9awRG3A"  target="_blank" class="btn btn--blank"><span class="btn__text">報名OST</span></a></li>
                        <!-- <li><a href="#" class="btn btn--blank"><span class="btn__text">候補</span></a></li>
                        <li><a href="#" class="btn btn--blank"><span class="btn__text">候補</span></a></li> -->
                    </ul>
                </div>
                <div class="imgTextFlex__image">
                    <img src="{{ asset('images/img_SDGs.png') }}" alt="聯合國17項永續發展目標(SDGs)" class="">
                </div>
            </div>
        </div>
    </div>
    <!-- participation end -->

    <!-- authorization start -->
    <div id="authorization" class="section section--authorization">
        <div class="container">
            <div class="section__title f-section-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <span class="f-section-title">品牌授權專區</span>
            </div>
            <div class="section__content imgTextFlex wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                <div class="imgTextFlex__text">
                    <div class="intro">
                        <p class="f-section-p">為推廣「2026台東博覽會」品牌識別的應用與價值延伸，臺東縣政府訂定《品牌商標授權作業辦法》，建立授權合作機制，誠摯邀請品牌、廠商、通路及企業參與。透過授權使用博覽會標誌、標準字、輔助圖形及專用色等核心識別元素，擴大博覽會的社會影響力，並促進產業共創與地方品牌發展，展現台東的文化能量與創新精神。</p>
                        <p class="f-section-p">授權機制明訂申請條件、使用規範與審查流程，確保識別系統的正確一致性，提升辨識度並支持永續發展。詳細規範請參見《2026台東博覽會品牌商標授權作業辦法》與《2026台東博覽會品牌手冊》。</p>
                    </div>
                    <div class="rule">
                        <div class="rule__title">申請資訊</div>
                        <ul class="rule__list rule__list--li">
                            <li class="f-section-h5">申請時間：即日起至114年9月30日（二）止</li>
                            <li class="f-section-h5"><a href="https://forms.gle/ddYC65vRZMA3ZrDc8" class="f-underline" target="_blank">線上報名表單</a></li>
                            <li class="f-section-h5">紙本及電子資料寄送地址：950臺東縣臺東市博愛路478號 / <a href="mailto:info@taitungexpo2026.com.tw">info@taitungexpo2026.com.tw</a></li>
                        </ul>
                    </div>
                    <ul class="action">
                        <li><a href="https://reurl.cc/aemb9l" class="btn btn--blank" target="_blank"><span class="btn__text">作業辦法</span></a></li>
                        <li><a href="https://reurl.cc/yR8rzD" class="btn btn--blank" target="_blank"><span class="btn__text" target="https://reurl.cc/yR8rzD">品牌手冊及授權素材</span></a></li>
                        <li><a href="https://reurl.cc/pa7KbZ" class="btn btn--blank" target="_blank"><span class="btn__text">說明會簡報</span></a></li>
                    </ul>
                </div>
                <div class="imgTextFlex__image">
                    <img src="{{ asset('images/img_application.png') }}" alt="品牌授權計畫徵件申請">
                </div>
            </div>
        </div>
    </div>
    <!-- authorization end -->

    <!-- event start -->
    <div id="event" class="section section--event">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="f-section-title">今日活動表</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="cards">
                    <div class="swiper cardsSwiper cardsSwiper--event">
                        <div class="swiper-wrapper">
                            <!-- common.js generateEventItems -->
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
