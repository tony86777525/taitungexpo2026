@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/statement.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/statement.js')
@endpush

@section('content')
<main class="main">
    <!-- preview start -->
    <div id="preview" class="section section--preview">
        <div class="section__content">
            <div class="previewGroup previewGroup--curating">
                <div class="hero">
                    <div class="container">
                        <span class="previewGroup__topic f-title-primary is-pageTitle">{{ __('about.statement.page-title') }}</span>
                        <div class="previewGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <span>{!! __('about.statement.hero.title1') !!}</span>
                            <span>{!! __('about.statement.hero.title2') !!}</span>
                        </div>
                        <div class="previewGroup__content">
                            <div class="intro wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                <p class="f-p">{{ __('about.statement.hero.paragraph1') }}</p>
                            </div>
                            <div class="hint wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                                <span class="hint__text">{{ __('about.statement.hero.hint') }}</span>
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
                                <path class="wheel-section js-curatingBtn"
                                        data-section="1"
                                        data-name="空氣"
                                        d="M 250 250 L 250 2 A 248 248 0 0 1 425.3 74.7 Z"/>

                                <!-- 扇形區域 2: 水 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="2"
                                        data-name="水"
                                        d="M 250 250 L 425.3 74.7 A 248 248 0 0 1 498 250 Z"/>

                                <!-- 扇形區域 3: 自然力量 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="3"
                                        data-name="自然力量"
                                        d="M 250 250 L 498 250 A 248 248 0 0 1 425.3 425.3 Z"/>

                                <!-- 扇形區域 4: 聲音 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="4"
                                        data-name="聲音"
                                        d="M 250 250 L 425.3 425.3 A 248 248 0 0 1 250 498 Z"/>

                                <!-- 扇形區域 5: 香氣 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="5"
                                        data-name="香氣"
                                        d="M 250 250 L 250 498 A 248 248 0 0 1 74.7 425.3 Z"/>

                                <!-- 扇形區域 6: 生活 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="6"
                                        data-name="生活"
                                        d="M 250 250 L 74.7 425.3 A 248 248 0 0 1 2 250 Z"/>

                                <!-- 扇形區域 7: 慢經濟 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="7"
                                        data-name="慢經濟"
                                        d="M 250 250 L 2 250 A 248 248 0 0 1 74.7 74.7 Z"/>

                                <!-- 扇形區域 8: 台東品牌 -->
                                <path class="wheel-section js-curatingBtn"
                                        data-section="8"
                                        data-name="台東品牌"
                                        d="M 250 250 L 74.7 74.7 A 248 248 0 0 1 250 2 Z"/>

                                <!-- 中心圓圈: 種子 -->
                                <circle class="center-circle js-curatingBtn"
                                        cx="250" cy="250" r="80"
                                        data-section="center"
                                        data-name="種子"/>

                                <!-- 底部圓圈 9: 永續台東-->
                                <circle class="bottom-circle js-curatingBtn"
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
                        <span class="f-title-primary">{!! __('about.statement.features.title') !!}</span>
                    </div>
                    <div class="previewGroup__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                        <ul class="featuresList">
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-1.png') }}" alt="台東炮炸寒單爺" class="featureImage">
                                <a href="https://www.zztaitung.com/20114/taitung-bombhandan-2" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature1') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-2.png') }}" alt="自然醒慢活祭" class="featureImage">
                                <a href="https://www.taitungspiritfestival.tw" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature2') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-3.png') }}" alt="臺東慢食節" class="featureImage">
                                <a href="https://slowfoodtaitung.tw/festival" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature3') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-4.png') }}" alt="PASIWALI原住民族國際音樂節" class="featureImage">
                                <a href="https://taiwanpasiwalifestival.com" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature4') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-5.png') }}" alt="台東最美星空" class="featureImage">
                                <a href="https://www.facebook.com/StarryTaitung/?locale=zh_TW" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature5') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-6.png') }}" alt="臺灣國際熱氣球嘉年華" class="featureImage">
                                <a href="https://balloontaiwan.taitung.gov.tw/zh-tw" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature6') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-7.png') }}" alt="臺灣國際衝浪公開賽" class="featureImage">
                                <a href="https://www.facebook.com/taiwanopenofsurfing/" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature7') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-8.png') }}" alt="東海岸大地藝術節" class="featureImage">
                                <a href="https://www.eastcoast-nsa.gov.tw/teclandart/" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature8') !!}</a>
                            </li>
                            <li class="multiple">
                                <img src="{{ asset('images/about/features/img_feature-9.png') }}" alt="南迴藝術季 縱谷大地藝術季" class="featureImage">
                                <div class="featureText featureText--front">{!! __('about.statement.features.feature9.front') !!}</div>
                                <div class="featureText featureText--back" data-links-container>
                                    <a href="https://www.facebook.com/NanhuiArtProject/?locale=zh_TW" target="_blank" data-link-index="0">{!! __('about.statement.features.feature9.text1') !!}</a>
                                    <a href="https://www.eastcoast-nsa.gov.tw/teclandart/" target="_blank" data-link-index="1">{!! __('about.statement.features.feature9.text2') !!}</a>
                                </div>
                            </li>
                            <li class="multiple">
                                <img src="{{ asset('images/about/features/img_feature-10.png') }}" alt="臺東藝術節 臺東藝穗節" class="featureImage">
                                <div class="featureText featureText--front">{!! __('about.statement.features.feature10.front') !!}</div>
                                <div class="featureText featureText--back" data-links-container>
                                    <a href="https://www.facebook.com/Taitungartsfestival/?locale=zh_TW" target="_blank" data-link-index="0">{!! __('about.statement.features.feature10.text1') !!}</a>
                                    <a href="https://www.taitungfringefestival.com" target="_blank" data-link-index="1">{!! __('about.statement.features.feature10.text2') !!}</a>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-11.png') }}" alt="池上秋收稻穗藝術節" class="featureImage">
                                <a href="https://www.facebook.com/Chishangarts.org" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature11') !!}</a>
                            </li>
                            <li>
                                <img src="{{ asset('images/about/features/img_feature-12.png') }}" alt="台東光祭" class="featureImage">
                                <a href="https://www.facebook.com/TaitungLightFestival/?locale=zh_TW" class="featureText featureText--front" target="_blank">{!! __('about.statement.features.feature12') !!}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preview end -->
    @include('user.frontend.layout.marquee')
</main>
<div id="popup" class="popup">
    <div class="popup__overlay"></div>
    <div class="popupBox">
        <div class="popupBox__close">
            <button class="btn btn--closePopup"></button>
        </div>
        @foreach (range(0, 9) as $i)
        @php $wheel = __('about.statement.curating-map.wheel' . $i); @endphp
        <div class="popupBox__content" data-popup-id="{{ $wheel['id'] }}">
            <div class="flexBox">
                <div class="image">
                    <img src="{{ asset('images/about/curating/' . $wheel['id'] . '.svg') }}">
                </div>
                <div class="text">
                    <div class="text__title f-h4">{{ $wheel['chapter'] }}</div>
                    <div class="text__desc f-p">{{ $wheel['desc'] }}</div>

                    <div class="text__tags">
                        <span class="title">{{ __('about.statement.curating-map.tags-title') }}</span>
                        <ul class="tags">
                            @foreach ($wheel['tags'] as $tag)
                            <li>{{ $tag }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @if (!empty($wheel['events']))
                    <ul class="text__events">
                        @foreach ($wheel['events'] as $event)
                        <li>
                            @if (!empty($event['href']))
                            @php
                                $routeUrl = lang_route('user.frontend.about.overview.detail');
                                [$path, $query] = array_pad(explode('?', $routeUrl), 2, null);
                                $fullUrl = rtrim($path, '/') . '/' . $event['href'] . ($query ? '?' . $query : '');
                            @endphp
                            <a href="{{ $fullUrl }}" class="eventLink">
                                <span class="eventLink__locate">{{ $event['locate'] }}</span>
                                <span class="eventLink__name">{{ $event['name'] }}</span>
                            </a>
                            @else
                            <span class="eventLink">
                                <span class="eventLink__locate">{{ $event['locate'] }}</span>
                                <span class="eventLink__name">{{ $event['name'] }}</span>
                            </span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('user.frontend.layout.stickyBtns')
@endsection
