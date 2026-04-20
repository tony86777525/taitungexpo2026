@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/participation/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/participation/detail.js')
@endpush

@section('content')
    <main class="main">
        <div class="m-subPage">
            <div class="m-element m-subPage__head">
                <div class="container">
                    @if(!empty($project->display_project_category_name))
                        <div class="pageLabel"><span class="pageLabel__text">{{ $project->display_project_category_name }}</span></div>
                    @endif
                    <div class="wrapper">
                        <div class="team">
                            @if($project->display_executing_unit_link)
                                <a href="{{ $project->display_executing_unit_link }}">{{ $project->display_executing_unit_name }}</a>
                            @else
                                {{ $project->display_executing_unit_name }}
                            @endif
                        </div>
                        <div class="title f-title-primary is-pageTitle">{{ $project->display_project_name }}</div>
                        <ul class="datas">
                            <li class="datas__item datas__item--date">
                                <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.dates') }}｜</div></div>
                                <div class="content"><span class="content__text f-h5">{{ $project->display_date_range }}</span></div>
                            </li>
                            <li class="datas__item datas__item--time">
                                <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.time') }}｜</div></div>
                                <div class="content"><span class="content__text f-h5">{{ $project->display_time_range }}</span></div>
                            </li>
                            @if(!empty($project->display_project_location))
                                <li class="datas__item datas__item--location">
                                    <div class="content"><a
                                            @if(!empty($project->map_link))
                                                href="{{ $project->map_link }}"
                                            @endif
                                            class="content__text f-h5"
                                        >{{ $project->display_project_location }}</a></div>
                                </li>
                            @endif
                            @if(!empty($project->getProjectNatures()))
                                <li class="datas__item datas__item--natures">
                                    <div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.natures') }}｜</div></div>
                                    <div class="content">
                                        <div class="content__list">
                                            @foreach($project->getProjectNatures() as $projectNature)
                                                <span class="f-h5">{{ $projectNature->display_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            {{-- 主視覺：上傳圖片（可輪播） --}}
            @if(!empty($project->getFeaturedImages()))
                <div class="m-element m-subPage__hero">
                    <div class="container">
                        <div class="imageList imageList--editor imageSwiper">
                            <div class="swiper js-editorImgSwiper">
                                <div class="swiper-wrapper">
                                    @foreach($project->getFeaturedImages() as $featuredImages)
                                        <div class="swiper-slide">
                                            <div class="imgWrap">
                                                <img src="{{ $featuredImages->display_url }}" alt="{{ $featuredImages->alt_text }}">
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
            {{-- 活動內容：有圖片輪播 --}}
            @foreach($project->getContents() ?: collect() as $projectContent)
                <div class="m-element m-subPage__summary">
                    <div class="container">
                        <div class="summary">
                            @if(!empty($projectContent->getImages()))

                                <div class="summary__image">
                                    <div class="imageList imageList--editor imageSwiper">
                                        <div class="swiper js-editorImgSwiper">
                                            <div class="swiper-wrapper">
                                                @foreach($projectContent->getImages() as $projectContentImage)
                                                    <div class="swiper-slide">
                                                        <div class="imgWrap">
                                                            <img src="{{ $projectContentImage->display_url }}" alt="{{ $projectContentImage->alt_text }}">
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
                                <div class="title"><span class="f-title-secondary">{{ $projectContent->display_title }}</span></div>
                                {{-- 內文 --}}
                                <div class="intro">
                                    <div class="customEditor">
                                        {!! $projectContent->display_content !!}
                                    </div>
                                </div>
                                {{-- 項目 --}}
                                @if(!empty($brandContent->display_item_text))
                                    <ul class="list">
                                        <li><span class="f-h5">{{ $brandContent->display_item_text }}</span></li>
                                    </ul>
                                @endif
                                {{-- 連結按鈕 --}}
                                @if(!empty($projectContent->getLinks()))
                                    <ul class="links">
                                        @foreach($projectContent->getLinks() as $projectContentLink)
                                            <li><a
                                                    href="{{ $projectContentLink->display_url }}"
                                                    class="btn btn--customLink"
                                                ><span class="btn__text">{{ $projectContentLink->display_name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- 活動相簿 --}}
            @if(!empty($project->getImages()))
                <div class="m-element m-subPage__gallery">
                    <div class="imageList imageList--gallery imageSwiper">
                        <div class="swiper js-galleryImgSwiper">
                            <div class="swiper-wrapper">
                                @foreach($project->getImages() as $projectImage)
                                    <div class="swiper-slide">
                                        <div class="imgWrap">
                                            <img src="{{ $projectImage->display_url }}" alt="{{ $projectImage->alt_text }}">
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
