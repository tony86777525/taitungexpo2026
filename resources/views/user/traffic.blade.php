@extends('user.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/traffic.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/traffic.js')
@endpush

@section('content')
    <main class="main">
        <section class="section section--transport">
            <div class="section__title">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">{{ __('traffic.page-title') }}</span>
                </div>
            </div>
            <div class="section__content">
                <div class="container">
                    <div class="goal goal--city">
                        <div class="goal__title f-title-primary is-pageTitle">
                            <span class="title">{{ __('traffic.transport.goal1.title') }}</span>
                        </div>
                        <div class="goal__content">
                            <ul class="action">
                                <li><a href="https://tour.taitung.gov.tw/zh-tw/traffic/taitung" class="btn btn--blankPage is-dark" target="_blank"><span class="btn__text">MORE</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="goal goal--transport">
                        <div class="goal__title">
                            <span class="title f-title-primary is-pageTitle">{{ __('traffic.transport.goal2.title') }}</span>
                            <div class="desc"><span class="f-p">{{ __('traffic.transport.goal2.desc') }}</span></div>
                        </div>
                        <div class="goal__content">
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup1.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup1.paragraph') }}</div>
                                    <ul class="list">
                                        <li><span class="text">{{ __('traffic.transport.goal2.transportGroup1.list.list1') }}</span></li>
                                        <li><span class="text">{{ __('traffic.transport.goal2.transportGroup1.list.list2') }}</span></li>
                                    </ul>
                                    {{-- <ul class="action">
                                        <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup1.actions.btnText1') }}</span></a></li>
                                    </ul> --}}
                                </div>
                                <div class="transportGroup__image">
                                    <div class="imgWrap">
                                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup2.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup2.paragraph') }}</div>
                                    <ul class="action">
                                        <li><a href="http://ett333023.com.tw/page3.htm" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup2.actions.btnText1') }}</span></a></li>
                                        <li><a href="https://sdbus.com.tw/" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup2.actions.btnText2') }}</span></a></li>
                                        <li><a href="https://www.facebook.com/people/%E6%99%AE%E6%82%A0%E7%91%AA%E5%AE%A2%E9%81%8B%E8%82%A1%E4%BB%BD%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8/100063673315341/#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup2.actions.btnText3') }}</span></a></li>
                                        <li><a href="https://www.taiwanbus.tw/ebuspage/Default.aspx?lan=C" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup2.actions.btnText4') }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup3.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup3.paragraph') }}</div>
                                    <ul class="action">
                                        <li><a href="https://www.youbike.com.tw/region/taitung/stations/list/" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup3.actions.btnText1') }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup4.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup4.paragraph') }}</div>
                                    <ul class="action">
                                        <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup4.actions.btnText1') }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup5.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup5.paragraph') }}</div>
                                    <ul class="action">
                                        <li><a href="https://taisocbus.taitung.gov.tw/mainpage" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">{{ __('traffic.transport.goal2.transportGroup5.actions.btnText1') }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="transportGroup">
                                <div class="transportGroup__text">
                                    <div class="title f-title-primary">{{ __('traffic.transport.goal2.transportGroup6.title') }}</div>
                                    <div class="paragraph f-p">{{ __('traffic.transport.goal2.transportGroup6.paragraph') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="route" class="section section--route">
            @include('user.modules.wave_traffic-pc')
            <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <div class="container">
                    <span class="title f-title-primary is-pageTitle">{{ __('traffic.route.section-title') }}</span>
                </div>
            </div>
            <div class="section__content">
                <div class="container">
                    <div class="routes">
                        <div class="routes__item routesGroup js-routesGroup">
                            <div class="routesGroup__topic">
                                <div class="title">
                                    <span class="title__number">1</span>
                                    <span class="title__text f-title-secondary">{{ __('traffic.route.routesGroup1.title') }}</span>
                                </div>
                                <div class="desc f-p">{{ __('traffic.route.routesGroup1.desc') }}</div>
                            </div>
                            <div class="routesGroup__content">
                                <div class="place">{{ __('traffic.route.routesGroup1.place') }}</div>
                                <div class="routesDesc f-p">{!! __('traffic.route.routesGroup1.routesDesc') !!}</div>
                                <div class="notice f-h5">{!! __('traffic.route.routesGroup1.notice') !!}</div>
                            </div>
                            <div class="routesGroup__switch">
                                <button class="btn btn--routesSwitch js-routesSwitch"></button>
                            </div>
                        </div>
                        <div class="routes__item routesGroup js-routesGroup">
                            <div class="routesGroup__topic">
                                <div class="title">
                                    <span class="title__number">2</span>
                                    <span class="title__text f-title-secondary">{{ __('traffic.route.routesGroup2.title') }}</span>
                                </div>
                                <div class="desc f-p">{{ __('traffic.route.routesGroup2.desc') }}</div>
                            </div>
                            <div class="routesGroup__content">
                                <div class="place">{{ __('traffic.route.routesGroup2.place') }}</div>
                                <div class="routesDesc f-p">{!! __('traffic.route.routesGroup2.routesDesc') !!}</div>
                                <div class="notice f-h5">{!! __('traffic.route.routesGroup2.notice') !!}</div>
                            </div>
                            <div class="routesGroup__switch">
                                <button class="btn btn--routesSwitch js-routesSwitch"></button>
                            </div>
                        </div>
                        <div class="routes__item routesGroup js-routesGroup">
                            <div class="routesGroup__topic">
                                <div class="title">
                                    <span class="title__number">3</span>
                                    <span class="title__text f-title-secondary">{{ __('traffic.route.routesGroup3.title') }}</span>
                                </div>
                                <div class="desc f-p">{{ __('traffic.route.routesGroup3.desc') }}</div>
                            </div>
                            <div class="routesGroup__content">
                                <div class="place">{{ __('traffic.route.routesGroup3.place') }}</div>
                                <div class="routesDesc f-p">{!! __('traffic.route.routesGroup3.routesDesc') !!}</div>
                                <div class="notice f-h5">{!! __('traffic.route.routesGroup3.notice') !!}</div>
                            </div>
                            <div class="routesGroup__switch">
                                <button class="btn btn--routesSwitch js-routesSwitch"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('user.layout.stickyBtns')
@endsection
