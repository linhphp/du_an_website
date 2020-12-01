<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{ route('home.admin') }}">ESHOP</a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="backend/assets/images/users/avatar.jpg" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="backend/assets/images/users/avatar.jpg" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ Session::get('user')->name }}</div>
                    <div class="profile-data-title">@lang('language.web_dev') </div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left">
                        <span class="fa fa-info"></span>
                    </a>
                </div>
            </div>
        </li>
        <li class="xn-title">Menu</li>
        <li>
            <a href="{{ route('categories.index') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.categories') @lang('language.product') </span>
            </a>
        </li>
        <li>
            <a href="{{ route('brands.index') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.brand') @lang('language.product') </span>
            </a>
        </li>
        <li class="xn-openable">
            <a href="#">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.product')</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('products.index') }}">
                        <span class="fa fa-list-alt"></span>@lang('language.list') 
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}">
                        <span class="fa fa-list-alt"></span>@lang('language.create') 
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('news-categories.index') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.news_categories')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('kind-of-news.index') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.type_of_news')</span>
            </a>
        </li>
        <li class="xn-openable">
            <a href="#">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.news')</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('news.index') }}">
                        <span class="fa fa-list-alt"></span> @lang('language.list')
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.create') }}">
                        <span class="fa fa-list-alt"></span> @lang('language.create')
                    </a>
                </li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.user')</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('users.index') }}">
                        <span class="fa fa-list-alt"></span> @lang('language.list')
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}">
                        <span class="fa fa-list-alt"></span> @lang('language.create')
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('adminCart.show') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.cart')</span>
            </a>
        </li>
        <li>
            <a href="{{ route('billAdmin.show') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.bills') </span>
            </a>
        </li>
        <li class="xn-openable">
            <a href="#">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.comments')</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('comments.product') }}">
                        <span class="fa fa-list-alt"></span>@lang('language.comment_product')
                    </a>
                </li>
                <li>
                    <a href="{{ route('comments.news') }}">
                        <span class="fa fa-list-alt"></span>@lang('language.comment_news') 
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('revenue') }}">
                <span class="fa fa-files-o"></span>
                <span class="xn-text">@lang('language.revenue') </span>
            </a>
        </li>
    </ul>
</div>
