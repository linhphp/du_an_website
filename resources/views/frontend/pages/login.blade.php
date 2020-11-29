@extends('frontend.layout.master')
@section('title')
@lang('language.sign_in')
@endsection
@section('content')
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.sign_in') </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="xs-margin half"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 padding-right-md">
                <h2 class="color2">@lang('language.not_account') </h2>
                <p>If you are not a member, you need to go to register page and create an account.</p>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <div class="xs-margin"></div>
                <a href="{{ route('signUp') }}" class="btn btn-custom btn-lg">@lang('language.sign_up')</a>
            </div>
            <div class="xlg-margin visible-xs clearfix"></div>
            <div class="col-sm-6 padding-left-md">
                <form name="login" action="{{ route('sigin.post') }}" id="login-form" method="post">
                    @csrf
                    <h2 class="color2">@lang('language.sign_in') </h2>
                    @php
                    if(count($errors) > 0){
                        foreach($errors->all() as $err)
                            echo $err .'<br>';
                    }
                    @endphp
                    <div class="form-group">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control input-lg" ng-model="postLogin.email" placeholder="" ng-required="true">
                        <span class="required" ng-show="login.email.$error.required" >@lang('language.enter_email') </span>
                        <span class="required" ng-show="login.email.$error.email" >@lang('language.email_invalidate') </span>
                        
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">@lang('language.password') <span class="required">*</span></label>
                        <input type="password" name="password" id="password" class="form-control input-lg" ng-model="postLogin.password" ng-required="true">
                        <span ng-show="login.password.$error.required">@lang('language.enter_password')</span>
                    </div>
                    <div class="xs-margin"></div><input ng-disabled="login.$invalid" type="submit" class="btn btn-custom btn-lg min-width" value="@lang('language.sign_in') ">
                </form>
            </div>
        </div>
    </div>
    <div class="lg-margin2x"></div>
</section>
@endsection