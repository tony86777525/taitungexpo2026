@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/reservation/complete.scss')
@endpush

@section('content')
    <main class="main">
{{--        @if(session('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if(session('fail'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('fail') }}--}}
{{--            </div>--}}
{{--        @endif--}}
        <section class="section section--complete">
            <div class="section__content">
                <div class="container">
                    <div class="paragraph">
                        <p class="f-h4">感謝您提交團體導覽預約申請，系統已將申請內容副本寄送至您填寫之電子信箱。</p>
                        <p class="f-h4">請耐心等候主辦單位完成審核後，將另行寄發「預約結果通知信」。</p>
                    </div>
                    <ul class="action">
                        <li><a href="#" class="btn btn--submit is-dark"><span class="btn__text">回申請頁面</span></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
