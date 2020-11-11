<header id="header" class="fullwidth-menu header2">
    <div id="header-top">
        <div class="container clearfix">
            <div class="left-side">
                <ul class="header-links">
                    <li>
                        <a href="checkout.html">
                            <span class="header-links-icon icon-checkout"></span><span>@lang('language.check_out') </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><span class="header-links-icon icon-wishlist"></span><span>My Wishlist</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="header-links-icon icon-account"></span><span>@lang('language.sign_up') </span>
                        </a>
                    </li>
                    <li>
                        <a href="login.html"><span class="header-links-icon icon-login"></span><span>@lang('language.sign_in') </span>
                        </a>
                    </li>
                </ul>
                <div class="user-dropdown dropdown visible-sm visible-xs">
                    <a title="My Account" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="header-links-icon icon-account"></span><span class="user-text">My Account</span><span class="dropdown-arrow"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">
                                <span class="header-links-icon icon-account"></span><span>My Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="checkout.html">
                                <span class="header-links-icon icon-checkout"></span><span>Checkout</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><span class="header-links-icon icon-wishlist"></span><span>My Wishlist</span>
                            </a>
                        </li>
                        <li>
                            <a href="login.html">
                                <span class="header-links-icon icon-login"></span><span>Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-side">
                <div class="search-container">
                    <form action="#" class="search-form">
                        <input type="search" name="s" class="s" placeholder="Search entry site here...">
                        <a href="#" title="Close Search" class="search-close-btn"></a>
                        <input type="submit" value="Submit" class="search-submit-btn">
                    </form>
                </div>
                <a href="#" class="header-search-btn" title="Search">
                    <span class="hidden-sm hidden-xs">@lang('search') </span>
                </a>
                <div class="cart-dropdown dropdown pull-right">
                    <a title="Shopping Cart" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="dropdown-icon"></span>
                        <span class="badge">2</span>
                        <span class="hidden-sm hidden-xs">2 item(s)</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="cart-dropdown-header">
                            <span class="dropdown-icon"></span>2 item(s) - $665.00
                        </div>
                        <p class="cart-desc">2 item(s) in your cart - $658.00</p>
                        <div class="product clearfix">
                            <a href="#" class="delete-btn" title="Delete Product"></a>
                            <figure class="product-image-container">
                                <a href="product.html" title="Navy Blue Silk Pleated Shift Dress">
                                    <img src="frontend/images/products/product2.jpg" alt="Product image" class="product-image">
                                </a>
                            </figure>
                            <div class="product-content">
                                <h3 class="product-name">
                                    <a href="product.html" title="Navy Blue Silk Pleated Shift Dress">Navy Blue Silk Pleated Shift Dress</a>
                                </h3>
                                <div class="product-price-container">
                                    <span class="product-old-price">$250.00</span> <span class="product-price">$180.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <ul class="pull-left action-info-container">
                                <li>Shipping: <span class="first-color">$7.00</span></li>
                                <li>Tax: <span class="text-lowercase">free</span></li>
                                <li>Total: <span class="first-color">$665.00</span></li>
                            </ul>
                            <ul class="pull-right action-btn-container">
                                <li>
                                    <a href="cart.html" class="btn btn-custom-5">Cart</a>
                                </li>
                                <li>
                                    <a href="cart.html" class="btn btn-custom">Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="language-dropdown dropdown">
                    <a title="Language" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="long-name">English</span>
                        <span class="short-name">Eng</span>
                        <span class="dropdown-arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('change_language', ['en']) }}">
                            <span class="long-name">English</span>
                            <span class="short-name">Eng</span>
                            <img src="frontend/images/flags/england.jpg" alt="English">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('change_language', ['vi']) }}">
                            <span class="long-name">Vietnames</span>
                            <span class="short-name">VN</span>
                            <img src="frontend/images/flags/england.jpg" alt="English">
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" data-clone="sticky">
        <div class="row">
            <div class="col-md-5">
                <ul class="menu left-menu clearfix">
                    <li><a href="index-2.html">@lang('language.home') </a>
                    </li>
                    <li><a href="category.html">@lang('language.shopping') </a>
                    <li><a href="category.html">@lang('language.news') </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 logo-container">
                <h1 class="logo clearfix"><a href="index-2.html" title="Granada - Premium Bootstrap eCommerce Template">Eshop</a></h1>
            </div>
            <div class="col-md-5 clearfix">
                <nav>
                    <div id="responsive-nav">
                        <a id="responsive-btn" href="#">
                            <span class="responsive-btn-icon">
                                <span class="responsive-btn-block"></span>
                                <span class="responsive-btn-block"></span>
                                <span class="responsive-btn-block last"></span></span>
                                <span class="responsive-btn-text visible-sm-inline-block visible-xs-inline-block">Menu</span>
                            </a>
                        <div id="responsive-menu-container"></div>
                    </div>
                    <ul class="menu right-menu clearfix">
                        <li class="megamenu-container"><a href="#">@lang('language.about_us') </a>
                        <li class="megamenu-container"><a href="#">@lang('language.contact') </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>