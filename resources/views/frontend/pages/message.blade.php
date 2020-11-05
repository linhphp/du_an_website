@extends('frontend/layout.master')
@section('content')
@if(Session::has('message'))
@section('title')
@lang('language.message')
@endsection
<div class="bg-light mt-3 mb-3 show fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="far fa-check-circle"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>@lang('language.successfully')! </h4>    
                <p>@lang('language.successfully_booked') </p>
                <p>@lang('language.been_sent_email') </p>
                <a href="{{ route('eshop') }}" class="btn btn-success" data-dismiss="modal"><span>@lang('language.continue_shopping') </span> <i class="fas fa-cart-plus"></i></a>
                <a href="{{ route('bills.index') }}" class="btn btn-danger" data-dismiss="modal"><span>@lang('language.track_your_order') </span> <i class="fas fa-eye"></i></a>
            </div>
        </div>
    </div>
</div>

@elseif(Session::has('successSendEMail'))
@section('title')
@lang('language.success')
@endsection
<div class="bg-light mt-3 mb-3 show fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>@lang('language.successfully')! </h4>    
                <p>@lang('language.has_been_sent') </p>
                <p>@lang('language.we_will_get_back') </p>
                <a href="{{ url()->previous() }}" class="btn btn-success" data-dismiss="modal"><span>@lang('language.back') </span> <i class="fas fa-step-backward"></i></a>
            </div>
        </div>
    </div>
</div>

@else
@section('title')
@lang('language.error')
@endsection
<div class="bg-light mt-3 mb-3 show fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-danger">
                <div class="icon-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>@lang('language.error')!</h4>    
                <p>@lang('language.page_doesn_exist') </p>
                <a href="{{ route('home') }}" class="btn btn-warning" data-dismiss="modal"><span>@lang('language.return_to_home_page') </span> <i class="fas fa-home"></i></a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection