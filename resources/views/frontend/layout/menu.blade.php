<div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <form action="{{ route('signOut.post') }}" method="post">
            @csrf
                <div class="offcanvas__links">
                     @if ((Auth::check()) && (Auth::user()->jurisdiction == null))
                        <span style="color: #e63334; text-transform: uppercase;" >@lang('language.welcome') - {{ Auth::user()->name }}</span>
                        <button type="submit" class="btn text-white" >@lang('language.sign_out') </button>
                    @else
                        <a href="{{ route('signIn') }}">@lang('language.sign_in') </a>
                        <a href="{{ route('signUp') }}">@lang('language.sign_up') /a>
                    @endif
                </div>
                <div class="header__top__hover ">
                    <span class="text-dark">@lang('language.language') <i class="arrow_carrot-down"></i></span>
                    <ul>
                        <li><a href="{{ route('change_language', ['en']) }}">EN</a></li>
                        <li><a href="{{ route('change_language', ['vi']) }}">VI</a></li>
                    </ul>
                </div>
            </form>
        </div>
        <div class="offcanvas__nav__option">
            <a class="search-switch"><img src="frontend/img/icon/search.png" alt=""></a>
            <a href="#"><img src="frontend/img/icon/heart.png" alt=""></a>
            <a href="{{ route('cart.show') }}"><img src="frontend/img/icon/cart.png" alt=""> <span>{{ $totalQty }}</span></a>
            <div class="price"></div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>@lang('language.free_shipping') </p>
        </div>
    </div>
   