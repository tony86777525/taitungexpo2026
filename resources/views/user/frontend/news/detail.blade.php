@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/news/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/news/detail.js')
@endpush

@section('content')
<main class="main">
    <!-- news start -->
    <section id="news" class="section section--news">
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
                <div class="tabGroup tabGroup--default js-tabGroup">
                    <div class="tabGroup__selector" role="button" aria-haspopup="listbox" aria-expanded="false">
                        <ul class="tabOption jc-center" role="listbox">
                            <li class="tabOption__item is-active" role="option"><span class="text">全部消息</span></li>
                            <li class="tabOption__item" role="option"><span class="text">官方公告</span></li>
                            <li class="tabOption__item" role="option"><span class="text">活動消息</span></li>
                            <li class="tabOption__item" role="option"><span class="text">媒體新聞</span></li>
                        </ul>
                    </div>
                </div>
                <div class="cardsList cardsList--fall">
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
        </div>
    </section>
    <!-- news end -->
</main>
@endsection
