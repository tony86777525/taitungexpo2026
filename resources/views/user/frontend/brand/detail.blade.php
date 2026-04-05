@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/brand/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/brand/detail.js')
@endpush

@section('content')
<main class="main">
	<div class="m-subPage">
		<div class="m-element m-subPage__head">
			<div class="container">
				<div class="wrapper">
					<div class="title f-title-primary is-pageTitle">商家名稱</div>
				</div>
			</div>
		</div>
		{{-- 活動內容：有圖片輪播 --}}
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
									<div class="swiper-slide">
										<div class="imgWrap">
											<img src="https://picsum.photos/id/160/300/300" alt="">
										</div>
									</div>
									<div class="swiper-slide">
										<div class="imgWrap">
											<img src="https://picsum.photos/id/162/300/300" alt="">
										</div>
									</div>
									<div class="swiper-slide">
										<div class="imgWrap">
											<img src="https://picsum.photos/id/164/300/300" alt="">
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
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">沒有限字數啊哈哈哈哈</span></a></li>
						</ul>
					</div>
				</div>
			</div>		
		</div>
		{{-- 活動內容：無圖片輪播 --}}
		<div class="m-element m-subPage__summary">
			<div class="container">
				<div class="summary">
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
							<li><a href="#" class="btn btn--customLink"><span class="btn__text">沒有限字數啊哈哈哈哈</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		{{-- 活動相簿 --}}
		<div class="m-element m-subPage__gallery">
			<div class="imageList imageList--gallery imageSwiper">
				<div class="swiper js-galleryImgSwiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/236/300/300" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/238/300/300" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/240/300/300" alt="">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="imgWrap">
								<img src="https://picsum.photos/id/242/300/300" alt="">
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
@endsection
