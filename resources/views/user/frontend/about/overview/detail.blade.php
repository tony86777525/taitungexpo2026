@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/about/overview/detail.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/about/overview/detail.js')
@endpush

@section('content')
<main class="main">
	<div class="m-subPage">
		<div class="m-element m-subPage__head">
			<div class="container">
				<div class="pageLabel"><span class="pageLabel__text">#計畫類型</span></div>
				<div class="logo">
					<div class="imgWrap">
						<img src="https://picsum.photos/50/123" alt="">
					</div>
				</div>
				<div class="wrapper">
                	<div class="team">團隊名稱</div>
					<div class="title f-title-primary is-pageTitle">計畫標題</div>
					<ul class="datas">
						<li class="datas__item datas__item--date">
							<div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.dates') }}｜</div></div>
							<div class="content"><span class="content__text f-h5">2026.7.3（五）－2026.8.20（四）</span></div>
						</li>
						<li class="datas__item datas__item--time">
							<div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.time') }}｜</div></div>
							<div class="content"><span class="content__text f-h5">10:00-12:00</span></div>
						</li>
						<li class="datas__item datas__item--location">
							<div class="content"><a class="content__text f-h5">台東縣立體育館</a></div>
						</li>
						<li class="datas__item datas__item--natures">
							<div class="label"><div class="label__text f-h5">{{ __('event.sub-page.datas.natures') }}｜</div></div>
							<div class="content">
								<div class="content__list">
									<span class="f-h5">＃展覽</span>
									<span class="f-h5">＃講座</span>
									<span class="f-h5">＃工作坊</span>
									<span class="f-h5">＃展演</span>
									<span class="f-h5">＃市集</span>
									<span class="f-h5">＃銷售</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
        {{-- 主視覺：上傳圖片（可輪播） --}}
        <div class="m-element m-subPage__hero">
            <div class="container">
                <div class="imageList imageList--editor imageSwiper">
                    <div class="swiper js-editorImgSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="https://picsum.photos/id/132/1960/1103" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="https://picsum.photos/id/133/1960/1103" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="https://picsum.photos/id/134/1960/1103" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="imgWrap">
                                    <img src="https://picsum.photos/id/135/1960/1103" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
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
		{{-- 相簿 --}}
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
        {{-- 相關單位 --}}
        <div class="m-element m-subPage__department">
            <div class="container">
                <div class="department">
                    <div class="department__title"><span class="f-h6">主辦單位</span></div>
                    <ul class="department__list">
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/123/100/300" alt=""></div></a></li>
                    </ul>
                </div>
                <div class="department">
                    <div class="department__title"><span class="f-h6">指導單位</span></div>
                    <ul class="department__list">
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/124/300/300" alt=""></div></a></li>
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/125/300/100" alt=""></div></a></li>
                    </ul>
                </div>
                <div class="department">
                    <div class="department__title"><span class="f-h6">承辦單位</span></div>
                    <ul class="department__list">
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/126/769/200" alt=""></div></a></li>
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/127/414/567" alt=""></div></a></li>
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/128/200/300" alt=""></div></a></li>
                    </ul>
                </div>
                <div class="department">
                    <div class="department__title"><span class="f-h6">協助單位</span></div>
                    <ul class="department__list">
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/129/513/300" alt=""></div></a></li>
                        <li><a href="#"><div class="imgWrap"><img src="https://picsum.photos/id/130/315/315" alt=""></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</main>
@include('user.frontend.layout.subPage-popup')
@endsection