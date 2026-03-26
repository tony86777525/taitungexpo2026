@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/themes.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/themes.js')
@endpush

@section('content')
<main class="main">
    <section class="section section--topic">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary">主題介紹</span>
            </div>
        </div>
        <div class="section__content">
            <div class="container">
                <div class="topic">
                    <div class="topic__slogan wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.7s">SLOW FOR LIFE</div>
                    <div class="topic__paragraph">
                        <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">在台東，時間以更從容的節奏流動。「慢」是一種與自然同行的生活態度，也是一種與土地建立深度連結的思維方式。</p>
                        <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.9s">2026 TAITUNG EXPO 台東博覽會，所呈現的是台東近年在「慢經濟」脈絡中逐步累積的生活實踐。這些實踐，來自縣府在治理方向上的長期引導，也來自在地社群與民間場域中自然生成、持續推進的行動；不同角色在各自的位置行動，交織出台東此刻的生活樣貌與地方能量。</p>
                        <p class="f-p wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">台東博覽會，正是一處將這些「慢經濟」實踐轉化為可被理解、可被感受之文化經驗的公共場域。透過多元展覽、跨域策展與沉浸式體驗，將治理語言與生活經驗加以轉譯，引導來訪者放慢腳步，在行走與停留之間，重新理解人與土地的關係。於此，「慢」成為一種來自地方，也回應世界的價值選擇。</p>
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
					<div class="sectionGroup__title f-title-primary">台東：理想生活的實踐場域</div>
					<div class="sectionGroup__content">
						<p class="f-p">坐落於山海交匯之處的台東，蘊藏豐饒的自然資源與多元共融的文化風貌，凝聚純粹壯麗的地景與深厚人文底蘊，孕育出獨具一格的地方價值。</p>
						<p class="f-p">2026 TAITUNG EXPO台東博覽會，將凝聚政府、在地產業與社會各界的力量，共同擘劃兼具包容性與永續性的地方發展藍圖。透過整年度的策展行動，深度呈現台東的文化底色與未來潛力，邀請來訪台東的人親身體驗這片土地的真、善、美，打造具有全球辨識度的「台東品牌」，讓台東的精神價值被世界看見、理解並珍惜。</p>
					</div>
				</div>
				<div class="sectionGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
					<div class="sectionGroup__title f-title-primary">台東博覽會，現在進行式——<br>改變，從此刻開始</div>
					<div class="sectionGroup__content">
						<p class="f-p">台東博覽會不僅是一場正在進行的行動實踐，更象徵著一個持續成長、逐步轉變的過程——每一次對話、每一場展演、每一項計畫，都是台東變革的見證與起點。我們誠邀每一位關心台東的夥伴，攜手成為這場改變的共同創造者。透過「現在進行式」的概念，讓改變從此刻開始，將永續發展的理想深植於台東，並將這股能量推向世界。</p>
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
                    <div class="file__name wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><span class="text f-title-primary">台東博覽會品牌手冊下載</span></div>
                    <ul class="file__action wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <li><a href="#" class="btn btn--blankPage is-dark" target="_blank"><span class="btn__text">DOWNLOAD</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @include('user.frontend.layout.marquee')
</main>
@endsection
