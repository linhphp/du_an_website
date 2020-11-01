<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>@lang('language.free_shipping') </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <form action="{{ route('signOut.post') }}" method="post">
                            @csrf
                            <div class="header__top__links">
                                @if ((Auth::check()) && (Auth::user()->jurisdiction == null))
                                    <span style="color: #e63334; text-transform: uppercase;" >@lang('language.welcome') - {{ Auth::user()->name }}</span>
                                    <button type="submit" class="btn text-white" >@lang('language.sign_out') </button>
                                @else
                                    <a href="{{ route('signIn') }}">@lang('language.sign_in') </a>
                                    <a href="{{ route('signUp') }}">@lang('language.sign_up') </a>
                                @endif
                            </div>
                            <div class="header__top__hover">
                                <span>@lang('language.language') <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li><a href="{{ route('change_language', ['en']) }}">EN</a></li>
                                    <li><a href="{{ route('change_language', ['vi']) }}">VI</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><div class=" logo product__item__pic set-bg" data-setbg="storage/logo/logo.png"></div></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="@yield('home')"><a href="{{ route('home') }}">@lang('language.home') </a></li>
                        <li class="@yield('eshop')"><a href="{{ route('eshop') }}">@lang('language.shopping') </a></li>
                        <li class="@yield('new')"><a href="{{ route('news') }}">@lang('language.news') </a></li>
                        <li class="@yield('contact')"><a href="">@lang('language.contact') </a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <span class="search-switch"><img src="frontend/img/icon/search.png" alt=""></span>
                    <a href=""><img src="frontend/img/icon/heart.png" alt=""></a>
                    @if((Auth::check()) && (Auth::user()->jurisdiction == null)) 
                    <a href="{{ route('bills.index') }}" class="text-dark"><i class="fas fa-luggage-cart"></i></a>
                    @endif
                    <a href="{{ route('cart.show') }}"><img src="frontend/img/icon/cart.png" alt=""><span class="text-danger">{{ $totalQty }}</span></a>
                    <div class="price"></div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
