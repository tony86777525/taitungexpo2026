@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/form.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/reservation/form.js')
@endpush

@section('content')
<main class="main">
    <section class="section--intro">
		<div class="section__title">
            <div class="container">
                <span class="title f-title-primary is-pageTitle">{{ __('reservation.page-title') }}</span>
            </div>
        </div>
        <div class="section__content">
            <div class="container">
                <div class="steps">
                    <div class="steps__item stepItem stepItem--step1">
                        <div class="stepItem__title">
                            <span class="number">1</span>
                            <div class="intro">
                                <h3 class="intro__topic f-title-secondary">{{ __('reservation.steps.step1.title') }}</h3>
                                <span class="intro__desc f-p">{!! __('reservation.steps.step1.desc') !!}</span>
                            </div>
                        </div>
                        <ul class="stepItem__list">
                            <li class="f-h5">{!! __('reservation.steps.step1.list.list-item1') !!}</li>
                        </ul>
                    </div>
                    <div class="steps__item stepItem stepItem--step2">
                        <div class="stepItem__title">
                            <span class="number">2</span>
                            <div class="intro">
                                <h3 class="intro__topic f-title-secondary">{{ __('reservation.steps.step2.title') }}</h3>
                                <span class="intro__desc f-p">{{ __('reservation.steps.step2.desc') }}</span>
                            </div>
                        </div>
                        <ul class="stepItem__list">
                            <li class="f-h5">{!! __('reservation.steps.step2.list.list-item1') !!}</li>
                            <li class="f-h5">{!! __('reservation.steps.step2.list.list-item2') !!}</li>
                            <li class="f-h5">{!! __('reservation.steps.step2.list.list-item3') !!}</li>
                        </ul>
                    </div>
                    <div class="steps__item stepItem stepItem--step3">
                        <div class="stepItem__title">
                            <span class="number">3</span>
                            <div class="intro">
                                <h3 class="intro__topic f-title-secondary">{{ __('reservation.steps.step3.title') }}</h3>
                                <span class="intro__desc f-p">{{ __('reservation.steps.step3.desc') }}</span>
                            </div>
                        </div>
                        <ul class="stepItem__list">
                            <li class="f-h5">{!! __('reservation.steps.step3.list.list-item1') !!}</li>
                            <li class="f-h5">{!! __('reservation.steps.step3.list.list-item2') !!}</li>
                        </ul>
                    </div>
                </div>
                <div class="declaration f-h5">2026台東博覽會保留團體導覽預約最終審核權及各項規則調整權。</div>
            </div>
        </div>
	</section>
    <section class="section--form">
        <div class="section__content">
            @include('user.frontend.reservation.form')
        </div>
    </section>
</main>
@endsection
