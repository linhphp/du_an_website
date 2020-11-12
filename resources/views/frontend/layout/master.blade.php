<!DOCTYPE html>
<html leng="en" ng-app="my-app">

@include('frontend/layout/head')

<body>
    <div id="wrapper">
        <div id="sticky-header" class="fullwidth-menu header2" data-fixed="fixed"></div>
        @include('frontend/layout/header')
        
        @section('content')
        @show

        @include('frontend/layout/footer')
    </div><a href="#header" id="scroll-top" title="Go to top">Top</a>
@include('frontend.layout.js')
</body>

</html>
