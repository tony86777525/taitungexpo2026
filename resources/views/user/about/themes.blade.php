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
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary">主題介紹</span>
            </div>
        </div>
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                topic
            </div>
        </div>
    </section>
    <section class="section section--about">
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                <div class="sectionGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
					<div class="sectionGroup__title f-primary-title">台東：理想生活的實踐場域</div>
					<div class="sectionGroup__content">
						<p class="f-section-p">坐落於山海交匯之處的台東，蘊藏豐饒的自然資源與多元共融的文化風貌，凝聚純粹壯麗的地景與深厚人文底蘊，孕育出獨具一格的地方價值。</p>
						<p class="f-section-p">2026 TAITUNG EXPO台東博覽會，將凝聚政府、在地產業與社會各界的力量，共同擘劃兼具包容性與永續性的地方發展藍圖。透過整年度的策展行動，深度呈現台東的文化底色與未來潛力，邀請來訪台東的人親身體驗這片土地的真、善、美，打造具有全球辨識度的「台東品牌」，讓台東的精神價值被世界看見、理解並珍惜。</p>
					</div>
				</div>
				<div class="sectionGroup wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
					<div class="sectionGroup__title f-primary-title">台東博覽會，現在進行式——<br>改變，從此刻開始</div>
					<div class="sectionGroup__content">
						<p class="f-section-p">台東博覽會不僅是一場正在進行的行動實踐，更象徵著一個持續成長、逐步轉變的過程——每一次對話、每一場展演、每一項計畫，都是台東變革的見證與起點。我們誠邀每一位關心台東的夥伴，攜手成為這場改變的共同創造者。透過「現在進行式」的概念，讓改變從此刻開始，將永續發展的理想深植於台東，並將這股能量推向世界。</p>
					</div>
				</div>
            </div>
        </div>
    </section>
    <section class="section section--documents">
        <div class="section__content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1s">
            <div class="container">
                台東博覽會品牌手冊下載
            </div>
        </div>
    </section>
</main>
@endsection