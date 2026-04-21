@extends('user.frontend.layout.wrapper')

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
                    <div class="paragraph f-p display--en">{!! __('participation.intro.paragraph3') !!}</div>
                    <div class="paragraph f-p display--en">{!! __('participation.intro.paragraph4') !!}</div>
                </div>
                <div class="imageList imageSwiper wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.8s">
                    <div class="swiper js-singleImgSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="{{ asset('images/participation/img_banner-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="{{ asset('images/participation/img_banner-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="{{ asset('images/participation/img_banner-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="{{ asset('images/participation/img_banner-4.jpg') }}" alt="">
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
            <div class="section__content">
                <div class="reviewGroup">
                    <div class="reviewGroup__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                        <span class="title f-title-primary">{{ __('participation.review.review1.title') }}</span>
                    </div>
                    <div class="reviewGroup__content f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                        <ul class="list">
                            <li class="f-p">{{ __('participation.review.review1.list.listItem1') }}</li>
                            <li class="f-p">{{ __('participation.review.review1.list.listItem2') }}</li>
                            <li class="f-p">{{ __('participation.review.review1.list.listItem3') }}</li>
                            <li class="f-p">{{ __('participation.review.review1.list.listItem4') }}</li>
                            <li class="f-p">{{ __('participation.review.review1.list.listItem5') }}</li>
                        </ul>
                        <ul class="action">
                            <li><a href="https://www.taitung.gov.tw/News_Content.aspx?n=13370&s=141371" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review1.buttons.btnText1') }}</span></a></li>
                            <li><a href="https://drive.google.com/drive/folders/1FoZpIRXDxo6eMBjc4iV-QrxW42lT15sX" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review1.buttons.btnText2') }}</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="reviewGroup">
                    <div class="reviewGroup__title wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                        <span class="title f-title-primary">{{ __('participation.review.review2.title') }}</span>
                    </div>
                    <div class="reviewGroup__content f-p wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.5s">
                        <div class="intro">
                            <div class="paragraph f-p">{!! __('participation.review.review2.paragraph1') !!}</div>
                        </div>
                        <ul class="action">
                            <li><a href="https://culture.taitung.gov.tw/search?keyword=%E6%B0%91%E9%96%93%E5%8F%83%E8%88%87%E8%A8%88%E7%95%AB" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review2.buttons.btnText1') }}</span></a></li>
                            <li><a href="https://www.youtube.com/watch?v=GH7F2yjHaYY&list=PLwLIA_jIHfyqxgdE0RD1SifHH7i8i0BSP" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('participation.review.review2.buttons.btnText2') }}</span></a></li>
                        </ul>
                    </div>
                </div>
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
                            <span class="filterSelect__text f-h4 js-selectedOption">{{ __('participation.list.filters.filterTxt1') }}</span>
                        </div>
                        <ul class="filterOption jc-center" role="listbox">
                            <li class="filterOption__item js-filterOption-item is-active" data-filter-id="all" role="option"><span class="text">{{ __('participation.list.filters.filterTxt1') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="culture" role="option"><span class="text">{{ __('participation.list.filters.filterTxt2') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="sustainability" role="option"><span class="text">{{ __('participation.list.filters.filterTxt3') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="economy" role="option"><span class="text">{{ __('participation.list.filters.filterTxt4') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="education" role="option"><span class="text">{{ __('participation.list.filters.filterTxt5') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="society" role="option"><span class="text">{{ __('participation.list.filters.filterTxt6') }}</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="living" role="option"><span class="text">{{ __('participation.list.filters.filterTxt7') }}</span></li>
                        </ul>
                    </div>
                    <div class="filterGroup__content js-filterGroup-content">
                        <div class="cardsList cardsList--default">
                            <a href="#" class="cardItem cardItem--participation" data-filter-target="living">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/232/300/300" alt="news_title">
                                </div>
                                <div class="cardItem__text">
                                    <div class="venue">
                                        <div class="venue__label">A1</div>
                                    </div>
                                    <div class="title f-h4">【官方公告】新聞標題</div>
                                    <div class="department f-h6">單位名稱</div>
                                </div>
                            </a>
                            <a href="#" class="cardItem cardItem--participation" data-filter-target="culture">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/233/300/300" alt="東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍">
                                </div>
                                <div class="cardItem__text">
                                    <div class="venue">
                                        <div class="venue__label">G10</div>
                                    </div>
                                    <div class="title f-h4">【活動消息】東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍</div>
                                    <div class="department f-h6">單位名稱單位名稱單位名稱單位名稱單位名稱</div>
                                </div>
                            </a>
                            <a href="#" class="cardItem cardItem--participation" data-filter-target="sustainability">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/234/300/300" alt="東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍">
                                </div>
                                <div class="cardItem__text">
                                    <div class="venue">
                                        <div class="venue__label">E6</div>
                                    </div>
                                    <div class="title f-h4">【官方公告】東博聯名便當特約店家揭曉！擴大徵選69家好店正式成軍</div>
                                    <div class="department f-h6">單位名稱</div>
                                </div>
                            </a>
                            <a href="#" class="cardItem cardItem--participation" data-filter-target="society">
                                <div class="cardItem__image">
                                    <img src="https://picsum.photos/id/235/300/300" alt="2026台東博覽會首展《紅土之上棒球特展》3/21松菸開展，重現台東棒球百年榮光">
                                </div>
                                <div class="cardItem__text">
                                    <div class="venue">
                                        <div class="venue__label">B2</div>
                                    </div>
                                    <div class="title f-h4">【媒體新聞】2026台東博覽會首展《紅土之上棒球特展》3/21松菸開展，重現台東棒球百年榮光</div>
                                    <div class="department f-h6">單位名稱單位名稱</div>
                                </div>
                            </a>
                        </div>
                        <ul class="pagination">
                            <li class="pagination__item pagination__item--prev is-disabled"><span class="text">PREV</span></li>
                            <li class="pagination__item pagination__item--num is-current"><span class="text">1</span></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">2</a></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">3</a></li>
                            <li class="pagination__item pagination__item--num"><a href="#" class="text">4</a></li>
                            <li class="pagination__item pagination__item--ellipsis"><span class="text">...</span></li>
                            <li class="pagination__item pagination__item--next"><a href="#" class="text">NEXT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('user.frontend.layout.stickyBtns')
@endsection
