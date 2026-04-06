@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/themes.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/themes.js')
@endpush

@section('content')
    <main class="main">
        <section class="section section--topic">
            <div class="section__title is-pageTitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary">{{ __('about.themes.page-title') }}</span>
                </div>
            </div>
            <div class="section__content">
                <div class="container">
                    <div class="topic">
                        <div class="topic__slogan wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.7s">{{ __('about.themes.topic.title') }}</div>
                        <div class="topic__paragraph">
                            <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">{{ __('about.themes.topic.paragraph1') }}</p>
                            <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.9s">{{ __('about.themes.topic.paragraph2') }}</p>
                            <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">{{ __('about.themes.topic.paragraph3') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--about">
            <div class="decoWave decoWave--before"></div>
            <div class="section__content">
                <div class="container">
                    <div class="sectionGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="sectionGroup__title f-title-primary">{{ __('about.themes.about.group1.title') }}</div>
                        <div class="sectionGroup__content">
                            <p class="f-p">{{ __('about.themes.about.group1.paragraph1') }}</p>
                            <p class="f-p">{{ __('about.themes.about.group1.paragraph2') }}</p>
                        </div>
                    </div>
                    <div class="sectionGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                        <div class="sectionGroup__title f-title-primary">{!! __('about.themes.about.group2.title') !!}</div>
                        <div class="sectionGroup__content">
                            <p class="f-p">{{ __('about.themes.about.group2.paragraph1') }}<br class="display--en">{{ __('about.themes.about.group2.paragraph2') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="decoWave decoWave--after"></div>
        </section>
        <section class="section section--file">
            <div class="section__content">
                <div class="container">
                    <div class="file">
                        <div class="file__cover wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <img src="{{ asset('images/about/img_cover-guidebook.jpg') }}" alt="">
                        </div>
                        <div class="file__name wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><span class="text f-title-primary">{{ __('about.themes.file.title') }}</span></div>
                        <ul class="file__action wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <li><a href="#" class="btn btn--blankPage is-dark" target="_blank"><span class="btn__text">DOWNLOAD</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @include('user.layout.marquee')
    </main>
@endsection
