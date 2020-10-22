<header class="header fixed-top clearfix">
    <div class="brand">
        <a href="{{ route('home.admin') }}" class="logo">
            THUCLINH
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <form action="{{ route('logout.admin.post') }}" method="post">
        @csrf
        <div class="top-nav clearfix">
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                @if(Auth::check())
                    @if(Auth::user()->jurisdiction == 2)
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="backend/images/2.png">
                        <span class="username">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a><button type="submit" class="btn" style="background: white;"><i class="fa fa-key"></i> Log Out</button></a></li>
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </form>
</header>
