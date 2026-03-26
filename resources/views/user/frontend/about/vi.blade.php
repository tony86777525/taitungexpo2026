@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/vi.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/vi.js')
@endpush

@section('content')
<main class="main">
    {{-- vi start --}}
    <section class="section section--topic">
        <div class="section__title">
            <div class="container">
                <span class="title f-title-primary wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">品牌視覺系統</span>
                <div class="coverImg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <img src="{{ asset('images/about/vi/img_logo.svg') }}" alt="台東博覽會 2026 TAITUNG EXPO">
                </div>
            </div>
        </div>
        <div class="section__content">
            <div class="viGroup viGroup--intro">
                <div class="viGroup__content">
                    <div class="container">
                        <div class="introText wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
                            <div class="introText__title">
                                <div class="topic f-title-primary">Amazing Taitung</div>
                            </div>
                            <div class="introText__paragraph">
                                <p class="f-p">臺灣國際熱氣球嘉年華已成為台東一年一度的重要盛事，熱氣球更象徵這片土地的獨特魅力。從充氣、燃燒器點燃，到氣囊漸漸成形並緩緩升空，這個過程宛如台東的成長軌跡——醞釀、蓄勢，最終自信綻放，翱翔天際，邁向無限可能。</p>
                                <p class="f-p">台東博覽會標誌設計以此意象為核心，運用具代表性的「台東藍」作為主色調，並結合熱氣球升起的動態美感，巧妙構築出一個視覺化的驚嘆號。不僅展現台東的活力與蓬勃發展，更象徵這片土地所蘊藏的無限驚喜——壯麗的自然景觀、深厚的人文底蘊、獨特的文化風貌，等待人們探索、感受與共鳴。</p>
                            </div>
                        </div>
                    </div>
                    <div class="introImage wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <img src="{{ asset('images/about/vi/img_element-pc-zh.svg') }}" class="display--pc">
                        <img src="{{ asset('images/about/vi/img_element-mb-zh.svg') }}" class="display--mb">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- vi end --}}

    {{-- signs start --}}
    <section class="section--signs">
        <div class="section__content">
            <div class="viGroup viGroup--imagery">
                <div class="container">
                    <div class="viGroup__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><span class="f-title-primary">標誌圖形意象</span></div>
                    <div class="viGroup__content">
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="imageryGroup__title"><span class="f-h4">自然的孕育</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/about/vi/img_nature-pc-zh.svg') }}" alt="自然的孕育" class="display--pc">
                                <img src="{{ asset('images/about/vi/img_nature-mb-zh.svg') }}" alt="自然的孕育" class="display--mb">
                            </div>
                        </div>
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                            <div class="imageryGroup__title"><span class="f-h4">文化的積累</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/about/vi/img_culture-pc-zh.svg') }}" alt="文化的積累" class="display--pc">
                                <img src="{{ asset('images/about/vi/img_culture-mb-zh.svg') }}" alt="文化的積累" class="display--mb">
                            </div>
                        </div>
                        <div class="imageryGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.1s">
                            <div class="imageryGroup__title"><span class="f-h4">Amazing Taitung 綻放精彩</span></div>
                            <div class="imageryGroup__image">
                                <img src="{{ asset('images/about/vi/img_amazing-pc-zh.svg') }}" alt="Amazing Taitung 綻放精彩" class="display--pc">
                                <img src="{{ asset('images/about/vi/img_amazing-mb-zh.svg') }}" alt="Amazing Taitung 綻放精彩" class="display--mb">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- signs end --}}

    {{-- video start --}}
    <section class="section--video">
        <div class="waveBg">
            @include('user.frontend.about.svgWave')
            @include('user.frontend.about.svgWave')
            @include('user.frontend.about.svgWave')
        </div>
        <div class="section__content">
            <div class="container">
                <div class="viGroup viGroup--video wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="container">
                        <div class="viGroup__content">
                            <div class="videoFrame">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/-r_XCaG2WhY?si=hX_7aMpLsmbghZq0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- video end --}}
    @include('user.frontend.layout.marquee')
</main>
@endsection
