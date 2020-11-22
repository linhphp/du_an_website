<!DOCTYPE html>
<html lang="en" class="body-full-height" ng-app="my-app">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title>Eshop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <base href="{{ asset('') }}">
    <link rel="icon" href="frontend/images/logoio.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" id="theme" href="backend/css/theme-default.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js">
    </script>
    <script type="text/javascript" src="frontend/angular/app.js"></script>
</head>

<body>
    <div class="login-container">
        
            <div class="login-box animated fadeInDown">
            <div class="login-body">
                <h2 style="color: white; text-align: center;">ESHOP</h2>
                <div class="login-title"><strong>Welcome</strong>, Please login</div>
                <form name="adminLogin" action="{{ route('login.admin.post') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input ng-model="user.email" ng-required="true" type="email" class="form-control"
                                name="email" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input ng-model="user.password" ng-required="true" type="password" class="form-control"
                                name="password" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button ng-disabled="adminLogin.$invalid" type="submit" class="btn btn-info btn-block">Log
                                In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; 2020 thuclinh
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-36783416-1', 'aqvatarius.com');
        ga('send', 'pageview');

    </script>
    <script type="text/javascript">
        (function(d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({
                        id: 25836617,
                        webvisor: true,
                        accurateTrackBounce: true
                    });
                } catch (e) {}
            });
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function() {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");

    </script>
    <noscript>
        <div><img src="http://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
</body>

</html>


