@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/form.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/reservation/form.js')
@endpush

@section('content')
<main class="main">
    表單
</main>
@endsection
