@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/participation/list.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/participation/list.js')
@endpush

@section('content')
    <main class="main">
        <div class="section section--intro">
            <div class="container">
                <div class="section__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                    <span class="title f-title-primary">{{ __('participation.page-title') }}</span>
                </div>
                <div class="section__content">
                    <div class="intro wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                        <div class="paragraph f-p">{!! __('participation.intro.paragraph1') !!}</div>
                        <div class="paragraph f-p">{!! __('participation.intro.paragraph2') !!}</div>
                        <div class="paragraph f-p">{!! __('participation.intro.paragraph3') !!}</div>
                    </div>
                    <div class="imageList imageSwiper wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.8s">
                        <div class="swiper js-singleImgSwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="imgWrap">
                                        <img src="{{ asset('images/participation/banner.webp') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <ul class="action wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                        <li><a href="https://drive.google.com/drive/folders/17a3khgL9hlDadQEusR31Q7mRw9AdGv5Q" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('participation.intro.buttons.btnText1') }}</span></a></li>
                        <li><a href="https://reurl.cc/qKxrqR" class="btn btn--blank is-light" target="_blank"><span class="btn__text">{{ __('participation.intro.buttons.btnText2') }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section section--review">
            <div class="container">
                <div class="section__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                    <span class="title f-title-primary">{{ __('participation.review.review1.title') }}</span>
                </div>
                <div class="section__content f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                    <div class="intro">
                        <div class="paragraph f-p">{!! __('participation.review.review1.paragraph1') !!}</div>
                        <div class="paragraph f-p display--en">{!! __('participation.review.review1.paragraph2') !!}</div>
                    </div>
                    <ul class="action">
                        <li><a href="https://www.taitung.gov.tw/News_Content.aspx?n=13370&s=141371" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review1.buttons.btnText1') }}</span></a></li>
                        <li><a href="https://drive.google.com/drive/folders/1FoZpIRXDxo6eMBjc4iV-QrxW42lT15sX" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review1.buttons.btnText2') }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section id="list" class="section section--list">
            <div class="section__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">計畫一覽</span>
                </div>
            </div>
            <div class="section__content wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                <div class="container">
                    <div class="filterGroup filterGroup--fakeSelect js-filterGroup-select">
                        <div class="filterGroup__selector" aria-haspopup="listbox" aria-expanded="false">
                            <div class="filterSelect js-filterSelect">
                                @if(empty($currentProjectCategoryId))
                                    <span class="filterSelect__text f-h4 js-selectedOption">{{ __('participation.list.filters.filterTxt1') }}</span>
                                @elseif(!empty($projectCategories->firstWhere('id', $currentProjectCategoryId)))
                                    <span class="filterSelect__text f-h4 js-selectedOption">{{ $projectCategories->firstWhere('id', $currentProjectCategoryId)->display_name }}</span>
                                @endif
                            </div>
                            <ul class="filterOption jc-center" role="listbox">
                                <li class="filterOption__item js-filterOption-item @empty($currentProjectCategoryId) is-active @endif" data-filter-id="all" role="option">
                                    <a
                                        @if (!empty($currentProjectCategoryId))
                                            href="{{ lang_route('user.participation.list') }}#list"
                                        @endif
                                        class="text">{{ __('participation.list.filters.filterTxt1') }}</a>
                                </li>
                                @if ($projectCategories->isNotEmpty())
                                    @foreach($projectCategories as $projectCategory)
                                        <li class="filterOption__item js-filterOption-item @if($projectCategory->is_current_project_category) is-active @endif" role="option">
                                            <a
                                                @if($projectCategory->is_current_project_category === false)
                                                    href="{{ $projectCategory->display_url }}#list"
                                                @endif
                                                class="text"
                                            >{{ $projectCategory->display_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="filterGroup__content js-filterGroup-content">
                            <div class="cardsList cardsList--default">
                                @foreach($projects as $project)
                                    <a href="{{ $project->display_url }}" class="cardItem cardItem--participation" data-filter-target="living">
                                        <div class="cardItem__image">
                                            <img src="{{ $project->display_thumbnail }}" alt="{{ $project->display_project_name }}">
                                        </div>
                                        <div class="cardItem__text">
                                            <div class="venue">
                                                <div class="venue__label">{{ $project->display_venue_number }}</div>
                                            </div>
                                            <div class="title f-h4">{{ $project->display_project_name }}</div>
                                            <div class="department f-h6">{{ $project->display_executing_unit_name }}></div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('user.layout.stickyBtns')
@endsection
