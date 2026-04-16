@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/form.scss')
@endpush

@push('scripts')
    @if(request()->routeIs('user.reservation.project'))
        @vite('resources/js/user/reservation/form_project.js')
    @else
        @vite('resources/js/user/reservation/form.js')
    @endif

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
                        <div class="stepsItem stepsItem--step1">
                            <div class="title">
                                <span class="title__number">1</span>
                                <div class="title__text">
                                    <h3>{{ __('reservation.steps.step1.title') }}</h3>
                                    <span>{{ __('reservation.steps.step1.desc') }}</span>
                                </div>
                            </div>
                            <ul class="list">
                                <li>{!! __('reservation.steps.step1.list.list-item1') !!}</li>
                            </ul>
                        </div>
                        <div class="stepsItem stepsItem--step2">
                            <div class="title">
                                <span class="title__number">2</span>
                                <div class="title__text">
                                    <h3>{{ __('reservation.steps.step2.title') }}</h3>
                                    <span>{{ __('reservation.steps.step2.desc') }}</span>
                                </div>
                            </div>
                            <ul class="list">
                                <li>{!! __('reservation.steps.step2.list.list-item1') !!}</li>
                                <li>{!! __('reservation.steps.step2.list.list-item2') !!}</li>
                                <li>{!! __('reservation.steps.step2.list.list-item3') !!}</li>
                            </ul>
                        </div>
                        <div class="stepsItem stepsItem--step3">
                            <div class="title">
                                <span class="title__number">3</span>
                                <div class="title__text">
                                    <h3>{{ __('reservation.steps.step3.title') }}</h3>
                                    <span>{{ __('reservation.steps.step3.desc') }}</span>
                                </div>
                            </div>
                            <ul class="list">
                                <li>{!! __('reservation.steps.step3.list.list-item1') !!}</li>
                                <li>{!! __('reservation.steps.step3.list.list-item2') !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section--form">
            <div class="section__content">
                @if(request()->routeIs('user.reservation.project'))
                    @include('user.reservation.form_project', $reservationFormData)
                @else
                    @include('user.reservation.form', $reservationFormData)
                @endif
            </div>
        </section>
    </main>
@endsection
