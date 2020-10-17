<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

@include('backend/layout/head')

<body>
<section id="container">

    @include('backend/layout/header')
    @include('backend/layout/aside')
    @section('content')
    @show
    
</section>

@include('backend/layout/js')

</body>
</html>
