@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/style.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/style.js')
@endpush

@section('content')
<main class="main">
    東博STYLE
</main>
@endsection
