@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/participation.scss')
@endpush
    
@push('scripts')
    @vite('resources/js/user/participation.js')
@endpush

@section('content')
<main class="main">

<!-- participation start -->
    <div id="participation" class="section section--participation">
        <div class="container">
            <div class="section__title f-section-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <span class="f-section-title">民間參與計畫</span>
            </div>
            <div class="section__content imgTextFlex wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                <div class="imgTextFlex__text">
                    <div class="intro">
                        <p class="f-section-p">臺東縣政府推出「2026台東博覽會民間參與計畫」，邀請當地民間團體共同創造台東未來願景，透過創意實現對「台東博覽會」的獨特想像。本計畫將依循博覽會整體執行架構，並呼應聯合國17項永續發展目標（SDGs），公開徵選具前瞻性與多元觀點的策展提案。預計遴選至少12件計畫，透過民間的策展能量，共同勾勒台東多元而永續的未來藍圖，讓世界看見台東的創意與行動力！</p>
                    </div>

                    <!-- <div class="rule">
                        <div class="rule__title">民間參與計畫—開放式會議(OST)</div>
                        <ul class="rule__list rule__list--p">
                            <li class="f-section-h5">在民間參與計畫啟動前，將透過OST(Open Space Technology)開放空間會議，以不同以往的對話方式相聚討論，邀請民眾一起來參與，共同創造台東行動藍圖與未來想像！</li>
                        </ul>
                    </div> -->
                    <div class="rule">
                        <div class="rule__title">活動時間</div>
                        <ul class="rule__list rule__list--li">
                            <li class="f-section-h5">市區場｜114年8月16日(六) 9:00-18:30</li>
                            <li class="f-section-h5">縱谷場｜114年8月17日(日)  9:00-17:30 </li>
                            <li class="f-section-h5">海岸場｜114年8月25日(一)  9:00-17:30</li>
                            <li class="f-section-h5">南迴場｜114年8月26日(二)  9:00-17:30 </li>
                        </ul>
                    </div>
                    <ul class="action">
                        <li><a href="https://forms.gle/MsARv9eAtz9awRG3A"  target="_blank" class="btn btn--blank"><span class="btn__text">報名OST</span></a></li>
                        <!-- <li><a href="#" class="btn btn--blank"><span class="btn__text">候補</span></a></li>
                        <li><a href="#" class="btn btn--blank"><span class="btn__text">候補</span></a></li> -->
                    </ul>
                </div>
                <div class="imgTextFlex__image">
                    <img src="{{ asset('images/img_SDGs.png') }}" alt="聯合國17項永續發展目標(SDGs)" class="">
                </div>
            </div>
        </div>
    </div>
    <!-- participation end -->
</main>
@endsection
