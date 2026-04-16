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
                <a class="logoItem" href="{{ lang_route('user.index') }}" rel="noopener noreferrer">
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
                        <li class="mainMenu__item mainMenu__item--single"><a href="{{ lang_route('user.news.list') }}" class="menuText {{ request()->routeIs('user.news.list') ? 'is-current' : '' }}"><span>{{ __('layout.navigation.nav1') }}</span></a></li>
                        <li class="mainMenu__item mainMenu__item--single"><a href="{{ lang_route('user.event.list') }}" class="menuText {{ request()->routeIs('user.event.list') ? 'is-current' : '' }}"><span>{{ __('layout.navigation.nav2') }}</span></a></li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>{{ __('layout.navigation.nav3') }}</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ lang_route('user.traffic') }}" class="menuText"><span>{{ __('layout.navigation.nav3-1') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.traffic') }}#route" class="menuText"><span>{{ __('layout.navigation.nav3-2') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText {{ request()->routeIs('user.about*') ? 'is-current' : '' }}"><span>{{ __('layout.navigation.nav4') }}</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ lang_route('user.about.themes') }}" class="menuText"><span>{{ __('layout.navigation.nav4-1') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.about.statement') }}" class="menuText"><span>{{ __('layout.navigation.nav4-2') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.about.vi') }}" class="menuText"><span>{{ __('layout.navigation.nav4-3') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.about.overview.list') }}" class="menuText"><span>{{ __('layout.navigation.nav4-4') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText {{ request()->routeIs('user.participation*') ? 'is-current' : '' }}"><span>{{ __('layout.navigation.nav5') }}</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ lang_route('user.participation.list') }}" class="menuText"><span>{{ __('layout.navigation.nav5-1') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.participation.list') }}#list" class="menuText"><span>{{ __('layout.navigation.nav5-2') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText {{ request()->routeIs('user.brand*') ? 'is-current' : '' }}"><span>{{ __('layout.navigation.nav6') }}</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ lang_route('user.brand.list') }}" class="menuText"><span>{{ __('layout.navigation.nav6-1') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.brand.list') }}#list" class="menuText"><span>{{ __('layout.navigation.nav6-2') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="mainMenu__item mainMenu__item--parent js-submenu-switcher">
                            <div class="menuText"><span>{{ __('layout.navigation.nav7') }}</span></div>
                            <ul class="subMenu">
                                <li class="subMenu__item"><a href="{{ lang_route('user.style') }}" class="menuText"><span>{{ __('layout.navigation.nav7-1') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.style') }}#guide" class="menuText"><span>{{ __('layout.navigation.nav7-2') }}</span></a></li>
                                <li class="subMenu__item"><a href="{{ lang_route('user.style') }}#documentary" class="menuText"><span>{{ __('layout.navigation.nav7-3') }}</span></a></li>
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
