<!DOCTYPE html>
<html lang="en" ng-app="my-app">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
    <title>@yield('title')</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <base href="{{ asset('') }}">
    <link rel="icon" href="frontend/images/logoio.png" type="image/x-icon" />
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
            <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <form action="{{ route('logout.admin.post') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">Yes</button>
                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="backend/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="backend/audio/fail.mp3" preload="auto"></audio>
    @include('backend/layouts/js')     
</body>
</html>






