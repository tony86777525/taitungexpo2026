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
		
	</section>
    <section class="section--form">
        <div class="section__content">
            @include('user.reservation.form')
        </div>
    </section>
</main>
@endsection
