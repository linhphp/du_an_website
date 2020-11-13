<!DOCTYPE html>
<html lang="en" ng-app="my-app">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
    <title>@yield('title')</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <base href="{{ asset('') }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" id="theme" href="backend/css/theme-default.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

</head>
<body>
    <div class="page-container">
        @include('backend/layouts/sidebar')
        <div class="page-content">
            @include('backend/layouts/header')
            @section('content')
            @show           
        </div>
    </div>

    @include('backend/layouts/js')     
</body>
</html>






