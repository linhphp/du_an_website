<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <li class="xn-icon-button pull-right last">
        <a href="#"><span class="fa fa-power-off"></span></a>
        <ul class="xn-drop-left animated zoomIn">
            <li><a href="{{ route('lock.admin') }}"><span class="fa fa-lock"></span>@lang('language.lock_screen') </a></li>
            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>@lang('laguage.sign_in') </a></li>
        </ul>                        
    </li>
    <li class="xn-icon-button pull-right">
        <a href="#"><span class="flag flag-gb"></span></a>
        <ul class="xn-drop-left xn-drop-white animated zoomIn">
            <li><a href="{{ route('change_language', ['en']) }}"><span class="flag flag-gb"></span> English</a></li>
            <li><a href="{{ route('change_language', ['vi']) }}"><span class="flag flag-de"></span> Vietname</a></li>
        </ul>                        
    </li> 
</ul>
