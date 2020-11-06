
@extends('frontend.layout.master')
@section('title','eshop')
@section('content')

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <div class="row">
                <div class="col-12 col-md-8 m-auto">
                    <form action="{{ route('signup.post') }}" method="post">
                        @csrf
                        <h6 class="checkout__title text-md-center">@lang('language.sign_up') </h6>
                            <p>@lang('language.already_account') <a href="{{ route('signIn') }}" class="btn-link text-danger">@lang('language.sign_in') </a> @lang('language.now') </p>                        
                        <div class="checkout__input">
                            <p>@lang('language.name') <span>*</span></p>
                            <input type="text" name="name" placeholder="@lang('language.enter_name') ">
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" name="email" placeholder="@lang('language.enter_email') ">
                        </div>
                        <div class="checkout__input">
                            <p>@lang('language.password') <span>*</span></p>
                            <input type="password" name="password" placeholder="@lang('language.enter_password') ">
                        </div>
                        <div class="checkout__input">
                            <p>@lang('language.re_password') <span>*</span></p>
                            <input type="password" name="repass" placeholder="@lang('language.enter_re_password')">
                        </div>
                        <button type="submit" class="site-btn">@lang('language.sign_up') </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
