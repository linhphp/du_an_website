<!DOCTYPE html>
<html lang="zxx">

@include('frontend/layout/head')

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="offcanvas-menu-overlay"></div>
    @include('frontend/layout/menu')
    @include('frontend/layout/header')

        @section('content')
        @show
   
   @include('frontend/layout/footer')

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="" method="get">
                <input type="text" id="search-input" name="key" placeholder="Search here.....">
            </form>
        </div>
    </div>

    @include('frontend/layout/js')
</body>

</html>
