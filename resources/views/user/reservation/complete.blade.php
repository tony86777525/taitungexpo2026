@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/complete.scss')
@endpush

@section('content')
    <main class="main">
        <section class="section section--complete">
            <div class="section__content">
                <div class="container">
                    @if(session('isSuccess'))
                        {{-- 成功 --}}
                        <div class="paragraph">
                            <p class="f-h4">{!! __('reservation.complete.success.p1') !!}</p>
                            <p class="f-h4">{!! __('reservation.complete.success.p2') !!}</p>
                        </div>
                        <ul class="action">
                            <li><a href="{{ session('linkForm') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText1') }}</span></a></li>
                            <li><a href="{{ route('user.about.overview.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText2') }}</span></a></li>
                            <li><a href="{{ route('user.event.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText3') }}</span></a></li>
                        </ul>
                    @elseif(session('isFull'))
                        {{-- 額滿 --}}
                        <div class="paragraph">
                            <p class="f-h4">{!! __('reservation.complete.full.p1') !!}</p>
                        </div>
                        <ul class="action">
                            <li><a href="{{ route('user.about.overview.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText2') }}</span></a></li>
                            <li><a href="{{ route('user.event.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText3') }}</span></a></li>
                        </ul>
                    @elseif(session('isClosed'))
                        {{-- 截止 --}}
                        <div class="paragraph">
                            <p class="f-h4">{!! __('reservation.complete.closed.p1') !!}</p>
                        </div>
                        <ul class="action">
                            <li><a href="{{ route('user.about.overview.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText2') }}</span></a></li>
                            <li><a href="{{ route('user.event.list') }}" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.complete.btnText3') }}</span></a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
