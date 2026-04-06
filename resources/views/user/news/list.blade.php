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
                <span class="title f-title-primary is-pageTitle">{{ __('news.page-title') }}</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="filterGroup filterGroup--default js-filterGroup">
                    <div class="filterGroup__selector" role="button" aria-haspopup="listbox" aria-expanded="false">
                        @if ($tags->isNotEmpty())
                            <ul class="filterOption jc-center" role="listbox">
                                <li class="filterOption__item js-filterOption-item @empty($currentTagId) is-active @endif" data-filter-id="all" role="option">
                                    <a
                                        @if (!empty($currentTagId))
                                            href="{{ lang_route('user.news.list') }}"
                                        @endif
                                        class="text"
                                    >{{ __('news.filter-text.filter1') }}</a>
                                </li>
                                @foreach($tags as $tag)
                                    <li class="filterOption__item js-filterOption-item @if($tag->is_current_tag) is-active @endif" role="option">
                                        <a
                                            @if($tag->is_current_tag === false)
                                                href="{{ $tag->display_url }}"
                                            @endif
                                            class="text"
                                        >{{ $tag->display_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
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
