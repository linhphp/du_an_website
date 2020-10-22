<aside>
    <div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a href="{{ route('brands.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Brands</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{ route('categories.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Categories</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>product</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('products.index') }}">index</a></li>
                        <li><a href="{{ route('products.create') }}">create</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{ route('adminCart.show') }}">
                        <i class="fa fa-book"></i>
                        <span>Carts</span>
                    </a>
                </li>
                
<!-- ----------------------------------------------------------- -->
                <li>
                    <a href="{{ route('login.admin') }}">
                    <i class="fa fa-user"></i>
                    <span>Login Page</span>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
</aside>