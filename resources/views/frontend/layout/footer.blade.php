 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{route('home')}}"><img width="120" src="storage/logo/logo.png"></a>
                        </div>
                        <p>@lang('language.customer_design') </p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>@lang('language.categories') </h6>
                        <ul class="nice-scroll">
                            @foreach($cates as $key => $value)
                            <li><a href="{{ route('eshop.category', $value) }}">{{$key}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>@lang('language.brand') </h6>
                        <ul>
                            @foreach($brands as $key => $value)
                            <li><a href="{{ route('eshop.brand', $value) }}">{{$key}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>@lang('language.receive') </h6>
                        <div class="footer__newslatter">
                            <p>@lang('language.information_product')</p>
                            <form action="#">
                                <input type="text" placeholder=" @lang('language.email_address') ">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            @lang('language.everything') <i class="far fa-heart"> </i> @lang('language.by') <a href="https://colorlib.com" target="_blank">ThucLinh</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>