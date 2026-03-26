@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/authorization.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/authorization.js')
    <script src="https://www.youtube.com/iframe_api"></script>
@endpush

@section('content')
<main class="main">

<!-- authorization start -->
    <div id="authorization" class="section section--authorization">
        <div class="container">
            <div class="section__title f-section-title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <span class="f-section-title">品牌授權專區</span>
            </div>
            <div class="section__content imgTextFlex wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
                <div class="imgTextFlex__text">
                    <div class="intro">
                        <p class="f-section-p">為推廣「2026台東博覽會」品牌識別的應用與價值延伸，臺東縣政府訂定《品牌商標授權作業辦法》，建立授權合作機制，誠摯邀請品牌、廠商、通路及企業參與。透過授權使用博覽會標誌、標準字、輔助圖形及專用色等核心識別元素，擴大博覽會的社會影響力，並促進產業共創與地方品牌發展，展現台東的文化能量與創新精神。</p>
                        <p class="f-section-p">授權機制明訂申請條件、使用規範與審查流程，確保識別系統的正確一致性，提升辨識度並支持永續發展。詳細規範請參見《2026台東博覽會品牌商標授權作業辦法》與《2026台東博覽會品牌手冊》。</p>
                    </div>
                    <div class="rule">
                        <div class="rule__title">申請資訊</div>
                        <ul class="rule__list rule__list--li">
                            <li class="f-section-h5">申請時間：即日起至114年9月30日（二）止</li>
                            <li class="f-section-h5"><a href="https://forms.gle/ddYC65vRZMA3ZrDc8" class="f-underline" target="_blank">線上報名表單</a></li>
                            <li class="f-section-h5">紙本及電子資料寄送地址：950臺東縣臺東市博愛路478號 / <a href="mailto:info@taitungexpo2026.com.tw">info@taitungexpo2026.com.tw</a></li>
                        </ul>
                    </div>
                    <ul class="action">
                        <li><a href="https://reurl.cc/aemb9l" class="btn btn--blank" target="_blank"><span class="btn__text">作業辦法</span></a></li>
                        <li><a href="https://reurl.cc/yR8rzD" class="btn btn--blank" target="_blank"><span class="btn__text" target="https://reurl.cc/yR8rzD">品牌手冊及授權素材</span></a></li>
                        <li><a href="https://reurl.cc/pa7KbZ" class="btn btn--blank" target="_blank"><span class="btn__text">說明會簡報</span></a></li>
                    </ul>
                </div>
                <div class="imgTextFlex__image">
                    <img src="{{ asset('images/img_application.png') }}" alt="品牌授權計畫徵件申請">
                </div>
            </div>
        </div>
    </div>
<!-- authorization end -->
</main>
@endsection
