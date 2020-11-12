@extends('frontend.layout.master')
@section('title')
@lang('language.check_out')
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="index-2.html" title="Home">Home</a></li>
                        <li class="active">Register Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="xs-margin half"></div>
    <div class="container">
        <form name="signUp" action="{{ route('signup.post') }}" id="register-form" method="post">
        	@csrf
            <div class="row">
            	<div class="col-sm-6 padding-right-md">
                <h2 class="color2">@lang('language.already_account') </h2>
                <p>If you are not a member, you need to go to register page and create an account.</p>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <div class="xs-margin"></div>
                <a href="{{ route('signIn') }}" class="btn btn-custom btn-lg">@lang('language.sign_in')</a>
            </div>
            <div class="xlg-margin visible-xs clearfix"></div>
                <div class="col-sm-6 ml-auto mr-auto padding-right-md">
                    <h2 class="color2">@lang('language.sign_up') </h2>
                    <div class="form-group">
                        <label for="name" class="form-label">@lang('language.enter_name') <span class="required">*</span></label>
                        <input ng-model="sign_up.name" type="text" name="name" id="name" class="form-control input-lg" ng-required="true">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input ng-model="sign_up.email" ng-required="true" type="email" name="email" id="email" class="form-control input-lg" required>
                        <span ng-show=signUp.email.$error.email> Email Không đúng địng dạng</span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">@lang('language.password')<span class="required">*</span></label>
                        <input ng-model="sign_up.password" ng-required="true" type="password" name="password" id="password" class="form-control input-lg" required>
                    </div>
                    <div class="form-group">
                        <label for="re_password" class="form-label">@lang('language.re_password') <span class="required">*</span></label>
                        <input ng-model="sign_up.re_password" ng-required="true" type="password" name="re_password" id="re_password" class="form-control input-lg" required>
                    </div>
                    
		            <div class="xs-margin"></div>
		            <input ng-disabled="signUp.$invalid" type="submit" class="btn btn-custom btn-lg" value="@lang('language.create_account') ">
                </div>
                <div class="md-margin visible-xs clearfix"></div>
            </div>
        </form>
    </div>
</section>

@endsection
