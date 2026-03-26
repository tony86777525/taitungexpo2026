@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/news/list.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/news/list.js')
@endpush

@section('content')
<main class="main">
    <!-- news start -->
    <section id="news" class="section section--news">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary">最新消息</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="filterGroup filterGroup--default js-filterGroup">
                    <div class="filterGroup__selector" role="button" aria-haspopup="listbox" aria-expanded="false">
                        <ul class="filterOption jc-center" role="listbox">
                            <li class="filterOption__item js-filterOption-item is-active" data-filter-id="all" role="option"><span class="text">全部消息</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="official" role="option"><span class="text">官方公告</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="event" role="option"><span class="text">活動消息</span></li>
                            <li class="filterOption__item js-filterOption-item" data-filter-id="media" role="option"><span class="text">媒體新聞</span></li>
                        </ul>
                    </div>
                    <div class="filterGroup__content js-filterGroup-content">
                        <div class="cardsList cardsList--default">
                            @foreach($articles ?? [] as $article)
                                <div class="cardItem cardItem--news">
                                    <div class="cardItem__image">
                                        <img src="{{ $article->display_thumbnail }}" alt="{{ $article->display_title }}">
                                    </div>
                                    <div class="cardItem__text">
                                        <div class="date">{{ $article->display_published_at }}</div>
                                        <div class="title f-h4">{{ $article->display_title }}</div>
                                        <ul class="action">
                                            <li>
                                                <a href="{{ $article->display_url }}" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news end -->
</main>
@endsection
