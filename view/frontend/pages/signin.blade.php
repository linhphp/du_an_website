@extends('frontend.layout.master')
@section('title','eshop')
@section('content')

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
                <div class="row">
                    <div class="col-8 m-auto">
                        <form action="{{ route('sigin.post') }}" method="post">
                        	@csrf
                            <h6 class="checkout__title text-md-center">@lang('language.sign_in') </h6>
                            @if(Session::has('signUp'))
                                <p class="alert-success">@lang('language.successful_sign_up')
                                </p>
                            @else 
                            <p>@lang('language.please_log_in') </p>
                            <p>@lang('language.not_account') <a href="{{ route('signUp') }}" class="btn-link text-danger">@lang('language.sign_up') </a> @lang('language.now') </p>
                            @endif
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email" placeholder="email">
                            </div>
                            <div class="checkout__input">
                                <p>@lang('language.password') <span>*</span></p>
                                <input type="password" name="password" placeholder="@lang('language.password')">
                            </div>
                              <button type="submit" class="site-btn">@lang('language.sign_in') </button>
                          </form>
                    </div>
                    
                </div>
        </div>
    </div>
</section>

@endsection
