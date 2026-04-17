@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/complete.scss')
@endpush

@section('content')
<main class="main">
    <section class="section section--complete">
        <div class="section__content">
            <div class="container">
                {{-- 成功 --}}
                <div class="paragraph">
                    <p class="f-h4">{!! __('reservation.complete.success.p1') !!}</p>
                    <p class="f-h4">{!! __('reservation.complete.success.p2') !!}</p>
                </div>
                {{-- 額滿 --}}
                <div class="paragraph">
                    <p class="f-h4">{!! __('reservation.complete.full.p1') !!}</p>
                </div>
                {{-- 截止 --}}
                <div class="paragraph">
                    <p class="f-h4">{!! __('reservation.complete.closed.p1') !!}</p>
                </div>
                <ul class="action">
                    <li><a href="#" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText1') }}</span></a></li>
                    <li><a href="#" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText2') }}</span></a></li>
                    <li><a href="#" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText3') }}</span></a></li>
                </ul>
            </div>
        </div>
    </section>
</main>
@endsection
