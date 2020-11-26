@extends('frontend.layout.master')
@section('title')
@lang('language.home')
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                        <li class="active">message</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="no-content-box wow fadeInRightBig">
            <div class="vcenter-container">
                <div class="vcenter">
                    <h2>@lang('language.successfully_booked') </h2>
                    <h3>@lang('language.been_sent_email') </h3>
                    <p></p>
			        <div class="row">
			            <div class="col-md-6">
			                <button type="button" class="btn btn-custom btn-block">@lang('language.continue_shopping') </button>
			            </div>
			            <div class="col-md-6">
			                <a href="{{ route('bills.index') }}" class="btn btn-custom btn-block">@lang('language.track_your_order') </a>
			            </div>
			        </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection