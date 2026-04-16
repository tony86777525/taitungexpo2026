@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/complete.scss')
@endpush

@section('content')
    <main class="main">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('fail'))
            <div class="alert alert-success">
                {{ session('fail') }}
            </div>
        @endif
    </main>
@endsection
