@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/news/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/news/detail.js')
@endpush

@section('content')
<main class="main">
	<div class="m-subPage">
		<div class="m-element m-subPage__head">
			<div class="container">
				<div class="pageLabel"><span class="pageLabel__text">#活動類型</span></div>
				<div class="wrapper">
					<div class="newsDate">2026.3.30</div>
					<div class="title f-title-primary is-pageTitle">新聞標題</div>
				</div>
			</div>
		</div>
        {{-- 消息內容：有圖片輪播 --}}
		<div class="m-element m-subPage__summary">
			<div class="container">
				<div class="summary">
					<div class="summary__image">
						<div class="imageList imageList--editor imageSwiper">
							<div class="swiper js-editorImgSwiper">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="imgWrap">
											<img src="https://picsum.photos/id/158/300/300" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
					<div class="summary__text">
						{{-- 標題 --}}
						<div class="title"><span class="f-title-secondary">標題一</span></div>
						{{-- 內文 --}}
						<div class="intro">
							<div class="customEditor">
								<p class="f-p">介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字</p>
								<p class="f-p">介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字</p>
							</div>
						</div>
						{{-- 項目 --}}
						<ul class="list">
							<li><span class="f-h5">補充說明文字</span></li>
						</ul>
						{{-- 連結按鈕 --}}
						<ul class="links">
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">自定義按鈕</span></a></li>
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">按鈕</span></a></li>
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">BTN</span></a></li>
						</ul>
					</div>
				</div>
			</div>		
		</div>
		{{-- 消息內容：無圖片輪播 --}}
		<div class="m-element m-subPage__summary">
			<div class="container">
				{{-- 標題 --}}
				<div class="title"><span class="f-title-secondary">標題一</span></div>
				<div class="summary">
					<div class="summary__text">
						{{-- 內文 --}}
						<div class="intro">
							<div class="customEditor">
								<p class="f-p">介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字</p>
								<p class="f-p">介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字介紹文字</p>
							</div>
						</div>
						{{-- 項目 --}}
						<ul class="list">
							<li><span class="f-h5">補充說明文字</span></li>
						</ul>
						{{-- 連結按鈕 --}}
						<ul class="links">
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">自定義按鈕</span></a></li>
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">按鈕</span></a></li>
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">沒有限字數啊哈哈哈哈</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		{{-- 相簿 --}}
		<div class="m-element m-subPage__gallery">
			<div class="imageList imageList--gallery imageSwiper">
				<div class="swiper js-galleryImgSwiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/236/626/469" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/238/626/469" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/240/626/469" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/242/626/469" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>
</main>
@include('user.frontend.layout.subPage-popup')
@endsection
