@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/brand/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/brand/detail.js')
@endpush

@section('content')
    <main class="main">
        <div class="m-subPage">
            <div class="m-element m-subPage__head">
                <div class="container">
                    <div class="wrapper">
                        <div class="title f-title-primary is-pageTitle">{{ $brand->display_name }}</div>
                    </div>
                </div>
            </div>
            {{-- 品牌介紹 --}}
            <div class="m-element m-subPage__summary">
                <div class="container">
                    <div class="summary">
                        <div class="summary__text">
                            {{-- 內文 --}}
                            <div class="intro">
                                <div class="customEditor">
                                    {!! $brand->display_description !!}
                                </div>
                            </div>
                            {{-- 連結按鈕 --}}
                            @if(!empty($brand->getLinks()))
                                <ul class="links">
                                    @foreach($brand->getLinks() as $brandLink)
                                        <li><a
                                                href="{{ $brandLink->display_url }}"
                                                class="btn btn--customLink"
                                            ><span class="btn__text">{{ $brandLink->display_name }}</span></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- 活動內容：有圖片輪播 --}}
            @foreach($brand->getContents() ?: collect() as $brandContent)
                <div class="m-element m-subPage__summary">
                    <div class="container">
                        <div class="summary">
                            @if(!empty($brandContent->getImages()))
                                <div class="summary__image">
                                    <div class="imageList imageList--editor imageSwiper">
                                        <div class="swiper js-editorImgSwiper">
                                            <div class="swiper-wrapper">
                                                @foreach($brandContent->getImages() as $brandContentImage)
                                                    <div class="swiper-slide">
                                                        <div class="imgWrap">
                                                            <img src="{{ $brandContentImage->display_url }}" alt="{{ $brandContentImage->alt_text }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="summary__text">
                                {{-- 標題 --}}
                                <div class="title"><span class="f-title-secondary">{{ $brandContent->display_title }}</span></div>
                                {{-- 內文 --}}
                                <div class="intro">
                                    <div class="customEditor">
                                        {!! $brandContent->display_content !!}
                                    </div>
                                </div>
                                {{-- 項目 --}}
                                @if(!empty($brandContent->display_item_text))
                                    <ul class="list">
                                        <li><span class="f-h5">{{ $brandContent->display_item_text }}</span></li>
                                    </ul>
                                @endif
                                {{-- 連結按鈕 --}}
                                @if(!empty($brandContent->getLinks()))
                                    <ul class="links">
                                        @foreach($brandContent->getLinks() as $brandContentLink)
                                            <li><a
                                                    href="{{ $brandContentLink->display_url }}"
                                                    class="btn btn--customLink"
                                                ><span class="btn__text">{{ $brandContentLink->display_name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- 活動相簿 --}}
            @if(!empty($brand->getImages()))
                <div class="m-element m-subPage__gallery">
                    <div class="imageList imageList--gallery imageSwiper">
                        <div class="swiper js-galleryImgSwiper">
                            <div class="swiper-wrapper">
                                @foreach($brand->getImages() as $brandImage)
                                    <div class="swiper-slide">
                                        <div class="imgWrap">
                                            <img src="{{ $brandImage->display_url }}" alt="{{ $brandImage->alt_text }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('user.layout.subPage-popup')
@endsection
