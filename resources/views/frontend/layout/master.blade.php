<!DOCTYPE html>
<html leng="en" ng-app="my-app">

@include('frontend/layout/head')

<body>
    <div id="wrapper">
        <div id="sticky-header" class="fullwidth-menu header2" data-fixed="fixed"></div>
        @include('frontend/layout/header')
        
        @section('content')
        @show
       <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=install_email
        page_id="220891661953847"
  theme_color="#0A7CFF"
  logged_in_greeting="Xin chào! Chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7, hãy để lại lời nhắn ở đây !!"
  logged_out_greeting="Xin chào! Chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7, hãy để lại lời nhắn ở đây !!">
      </div>

        @include('frontend/layout/footer')
    </div><a href="#header" id="scroll-top" title="Go to top">Top</a>
	@include('frontend.layout.js')
      <!-- Load Facebook SDK for JavaScript -->
</body>

</html>
