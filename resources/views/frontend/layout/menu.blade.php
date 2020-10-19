<div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <form action="{{ route('signOut.post') }}" method="post">
            @csrf
                <div class="offcanvas__links">
                     @if ((Auth::check()) && (Auth::user()->jurisdiction == null))
                        <span style="color: #e63334; text-transform: uppercase;" >Chào bạn - {{ Auth::user()->name }}</span>
                        <button type="submit" class="btn text-white" >Sign out</button>
                    @else
                        <a href="{{ route('signIn') }}">Sign in</a>
                        <a href="{{ route('signUp') }}">Sign up</a>
                    @endif
                </div>
                <div class="header__top__hover ">
                    <span class="text-dark">EN <i class="arrow_carrot-down"></i></span>
                    <ul>
                        <li>EN</li>
                        <li>VI</li>
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
            <p>miễn phí vận chuyển, hoàn trả lại trong 7 ngày với bất kỳ lý do.</p>
        </div>
    </div>