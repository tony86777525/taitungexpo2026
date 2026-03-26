@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/traffic.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/traffic.js')
@endpush

@section('content')
<main class="main">
    交通資訊
</main>
@endsection
