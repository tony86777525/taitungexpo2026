@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/news/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/news/detail.js')
@endpush

@section('content')
    <main class="main">
        <div class="m-subPage">
            <div class="m-element m-subPage__head">
                <div class="container">
                    @if(!empty($article->display_tag_name))
                        <div class="pageLabel"><span class="pageLabel__text">{{ $article->display_tag_name }}</span></div>
                    @endif
                    <div class="wrapper">
                        <div class="newsDate">{{ $article->display_published_at }}</div>
                        <div class="title f-title-primary is-pageTitle">{{ $article->display_title }}</div>
                    </div>
                </div>
            </div>
            {{-- 消息內容：有圖片輪播 --}}
            @foreach($article->getContents() ?: collect() as $articleContent)
                <div class="m-element m-subPage__summary">
                <div class="container">
                    <div class="summary">
                        @if(!empty($articleContent->getImages()))
                            <div class="summary__image">
                                <div class="imageList imageList--editor imageSwiper">
                                    <div class="swiper js-editorImgSwiper">
                                        <div class="swiper-wrapper">
                                            @foreach($articleContent->getImages() as $articleContentImage)
                                                <div class="swiper-slide">
                                                    <div class="imgWrap">
                                                        <img src="{{ $articleContentImage->display_url }}" alt="{{ $articleContentImage->alt_text }}">
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
                            <div class="title"><span class="f-title-secondary">{{ $articleContent->display_title }}</span></div>
                            {{-- 內文 --}}
                            <div class="intro">
                                <div class="customEditor">
                                    {!! $articleContent->display_content !!}
                                </div>
                            </div>
                            {{-- 項目 --}}
                            @if(!empty($brandContent->display_item_text))
                                <ul class="list">
                                    <li><span class="f-h5">{{ $brandContent->display_item_text }}</span></li>
                                </ul>
                            @endif
                            {{-- 連結按鈕 --}}
                            @if(!empty($articleContent->getLinks()))
                                <ul class="links">
                                    @foreach($articleContent->getLinks() as $articleContentLink)
                                        <li><a
                                                href="{{ $articleContentLink->display_url }}"
                                                class="btn btn--customLink"
                                            ><span class="btn__text">{{ $articleContentLink->display_name }}</span></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- 相簿 --}}
            @if(!empty($article->getImages()))
                <div class="m-element m-subPage__gallery">
                    <div class="imageList imageList--gallery imageSwiper">
                        <div class="swiper js-galleryImgSwiper">
                            <div class="swiper-wrapper">
                                @foreach($article->getImages() as $articleImage)
                                    <div class="swiper-slide">
                                        <div class="imgWrap">
                                            <img src="{{ $articleImage->display_url }}" alt="{{ $articleImage->alt_text }}">
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
@endsection
