@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/event/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/event/detail.js')
@endpush

@section('content')
    <main class="main">
        <div class="m-subPage">
            <div class="m-element m-subPage__head">
                <div class="container">
                    <div class="pageLabel">
                        @if($activity->getProjectTypes()->isNotEmpty())
                            @foreach($activity->getProjectTypes() as $projectTypes)
                                <span class="pageLabel__text">{{ $projectTypes->display_name }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="wrapper">
                        <div class="team"><a href="#">{{ $activity->display_project_name }}</a></div>
                        <div class="title f-title-primary is-pageTitle">{{ $activity->display_title }}</div>
                        <ul class="datas">
                            <li class="datas__item datas__item--date">
                                <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.dates') }}｜</div></div>
                                <div class="content"><span class="content__text f-h5">{{ $activity->display_date_range_detail }}</span></div>
                            </li>
                            <li class="datas__item datas__item--time">
                                <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.time') }}｜</div></div>
                                <div class="content"><span class="content__text f-h5">{{ $activity->display_time_range }}</span></div>
                            </li>
                            @if(!empty($activity->display_activity_location))
                                <li class="datas__item datas__item--location">
                                    <div class="content">
                                        @if(!empty($activity->display_map_link))
                                            <a href="{{ $activity->display_map_link }}" class="content__text f-h5">{{ $activity->display_activity_location }}</a>
                                        @else
                                            <span class="content__text f-h5">{{ $activity->display_activity_location }}</span>
                                        @endif
                                    </div>
                                </li>
                            @endif
                            @if($activity->getNatures()->isNotEmpty())
                                <li class="datas__item datas__item--natures">
                                    <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.natures') }}｜</div></div>
                                    <div class="content">
                                        <div class="content__list">
                                            @foreach($activity->getNatures() as $nature)
                                                <span class="f-h5">{{ $nature->display_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            {{-- 活動內容：有圖片輪播 --}}
            @foreach($activity->getContents() ?: collect() as $activityContent)
                <div class="m-element m-subPage__summary">
                    <div class="container">
                        <div class="summary">
                            @if(!empty($activityContent->getImages()))

                                <div class="summary__image">
                                    <div class="imageList imageList--editor imageSwiper">
                                        <div class="swiper js-editorImgSwiper">
                                            <div class="swiper-wrapper">
                                                @foreach($activityContent->getImages() as $activityContentImage)
                                                    <div class="swiper-slide">
                                                        <div class="imgWrap">
                                                            <img src="{{ $activityContentImage->display_url }}" alt="{{ $activityContentImage->alt_text }}">
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
                                <div class="title"><span class="f-title-secondary">{{ $activityContent->display_title }}</span></div>
                                {{-- 內文 --}}
                                <div class="intro">
                                    <div class="customEditor">
                                        {!! $activityContent->display_content !!}
                                    </div>
                                </div>
                                {{-- 項目 --}}
                                <ul class="list">
                                    <li><span class="f-h5">{{ $activityContent->display_item_text }}</span></li>
                                </ul>
                                {{-- 連結按鈕 --}}
                                @if(!empty($activityContent->getLinks()))
                                    <ul class="links">
                                        @foreach($activityContent->getLinks() as $activityContentLink)
                                            <li><a
                                                    href="{{ $activityContentLink->display_url }}"
                                                    class="btn btn--customLink"
                                                ><span class="btn__text">{{ $activityContentLink->display_name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- 活動相簿 --}}
            @if(!empty($activity->getImages()))
                <div class="m-element m-subPage__gallery">
                    <div class="imageList imageList--gallery imageSwiper">
                        <div class="swiper js-galleryImgSwiper">
                            <div class="swiper-wrapper">
                                @foreach($activity->getImages() as $activityImage)
                                    <div class="swiper-slide">
                                        <div class="imgWrap">
                                            <img src="{{ $activityImage->display_url }}" alt="{{ $activityImage->alt_text }}">
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
