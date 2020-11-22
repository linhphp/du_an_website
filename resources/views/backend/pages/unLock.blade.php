<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>Eshop - lock</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <base href="{{ asset('') }}">
        <link rel="stylesheet" type="text/css" id="theme" href="backend/css/theme-default.css"/>
	    <link rel="icon" href="frontend/images/logoio.png" type="image/x-icon" />
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js">
	    </script>
	    <script type="text/javascript" src="frontend/angular/app.js"></script>
    </head>
    <body>
        
        <div class="lockscreen-container">
            
            <div class="lockscreen-box animated fadeInDown">
                
                <div class="lsb-access">
                    <div class="lsb-box">
                        <div class="fa fa-lock"></div>
                        <div class="user animated fadeIn">
                            <img src="backend/assets/images/users/user2.jpg">
                            <div class="user_signin animated fadeIn">
                                <div class="fa fa-sign-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lsb-form animated fadeInDown">
                    <form action="{{ route('unlock.post') }}" method="post" class="form-horizontal">
                    	@csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="hidden"/>
                    </form>
                </div>
                
            </div>
            
        </div>
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="backend/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="backend/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="backend/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START TEMPLATE -->                
        <script type="text/javascript" src="backend/js/plugins.js"></script>
        <script type="text/javascript" src="backend/js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
        <!-- GOOGLE -->
        <script type="text/javascript">
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-36783416-1', 'aqvatarius.com');
          ga('send', 'pageview');
        </script>        
        <!-- END GOOGLE -->
        
        <!-- YANDEX -->
        <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({id:25836617,
                            webvisor:true,
                            accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="http://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div></noscript>     
        <!-- END YANDEX -->
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->
    
    </body>

<!-- Tieu Long Lanh Kute -->
</html>






