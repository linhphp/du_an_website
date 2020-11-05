@extends('frontend.layout.master')
@section('title','eshop')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>@lang('language.contact') </h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">@lang('language.home') </a>
                        <span>@lang('language.contact') </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>@lang('language.welcome_to_eshop') </h1>
        <h2>@lang('language.we_always_strive_to_create_the_best') </h2>
    </div>
</section>
<main id="main">
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7" data-aos="fade-right">
                    <img src="storage/logo/logo2.png" class="img-fluid" alt="">
                </div>
                <div class="col-xl-6 col-lg-5 pt-5 pt-lg-0">
                    <h3 data-aos="fade-up">@lang('language.genuine_product') </h3>
                    <p data-aos="fade-up">@lang('language.commitment').
                    </p>
                    <div class="icon-box" data-aos="fade-up">
                        <i class="bx bx-receipt"></i>
                        <h4>@lang('language.receive_feedback') </h4>
                        <p>@lang('language.your_feedback') </p>
                    </div>
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <i class="fab fa-product-hunt"></i>
                        <h4>@lang('language.profession') </h4>
                        <p>@lang('language.friendly') </p>
                    </div>
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <i class="fab fa-envira"></i>
                        <h4>@lang('language.equality') </h4>
                        <p>@lang('language.everyone_important') </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="team">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>@lang('language.team') </h2>
                <p>@lang('language.our_development') </p>
            </div>
            <div class="row">
                @foreach ($admins as $admin)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="member">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $admin->name }}</h4>
                                @if($admin->jurisdiction == Config::get('auth.executive'))
                                <span>@lang('language.chief_Executive_Officer') </span>
                                @endif
                            </div>
                            <div class="social">
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>@lang('language.contact') </h2>
                <p>@lang('language.fell_free_contact') </p>
            </div>
            <div class="row no-gutters justify-content-center" data-aos="fade-up">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>@lang('language.location'):</h4>
                            <p>151 - Âu Cơ - Liên Chiểu - Đà Nẵng</p>
                        </div>
                        <div class="email mt-4">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>thuclinh997@gmail.com</p>
                        </div>
                        <div class="phone mt-4">
                            <i class="icofont-phone"></i>
                            <h4>@lang('language.call'):</h4>
                            <p>0522-451-655</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-stretch">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.903094550199!2d108.14162245002589!3d16.070517688825607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142192aa690fa83%3A0xf9949c4f3a3b4878!2zMTUxIMOCdSBDxqEsIEhvw6AgS2jDoW5oIELhuq9jLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1604242156248!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <form action="{{ route('sendEmail') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="@lang('language.your_name')" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="@lang('language.your_email')" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="@lang('language.subject')" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="@lang('language.message')"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit">@lang('language.send_message')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
