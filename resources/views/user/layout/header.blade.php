<!-- header start -->
<header class="l-header">
    <div class="sticky-wrapper">
        <div class="container-fluid">
            <div class="l-header__toggler">
                <div class="menuSwitcher is-closed js-navOpen">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="l-header__logo d-flex">
                <a class="logoItem" href="{{ route('user.index') }}" rel="noopener noreferrer">
                    <img src="{{ asset('images/logo_expo.svg') }}" alt="2026 Taitung EXPO 台東博覽會">
                </a>
            </div>
            <!-- navigation start -->
            <nav class="l-header__nav navigation js-navigation">
                <div class="overlay js-navClose"></div>
                <div class="navWrap">
                    <div class="navToggler">
                        <div class="menuSwitcher is-opened js-navClose">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <ul class="mainMenu">
                        <li class="mainMenu__item mainMenu__item--single"><a href="{{ route('user.news.list') }}" class="menuText"><span>{{ __('frontend.articles') }}</span></a></li>
                        <li class="mainMenu__item mainMenu__item--single"><a href="#event" class="menuText"><span>活動行事曆</span></a></li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>交通資訊</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="#" class="menuText"><span>交通資訊</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>建議路線</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>展會資訊</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ route('user.about.themes') }}" class="menuText"><span>主題介紹</span></a></li>
                                <li class="subMenu__item"><a href="{{ route('user.about.statement') }}" class="menuText"><span>策展論述</span></a></li>
                                <li class="subMenu__item"><a href="{{ route('user.about.vi') }}" class="menuText"><span>品牌視覺系統</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>展會概覽</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>民間參與計畫</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="#" class="menuText"><span>計畫介紹</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>計畫一覽</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>品牌授權專區</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="#" class="menuText"><span>計畫介紹</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>商品專區</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>東博STYLE</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="#" class="menuText"><span>台東博覽會形象影片</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>展會導覽手冊</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>電子邀請卡下載</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>大會人員招募專區</span></a></li>
                                <li class="subMenu__item"><a href="#" class="menuText"><span>台東博覽會紀錄專書</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- navigation end -->
            <!-- 語言切換按鈕 -->
            <div class="l-header__lang">
                <div class="langSwitcher">
                    @if(app()->getLocale() === \App\Enums\Language::EN->value)
                        <a id="langToggleBtn" class="lang-btn" href="{{ request()->fullUrlWithoutQuery('lang') }}">中文</a>
                    @else
                        <a id="langToggleBtn" class="lang-btn" href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}">EN</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
