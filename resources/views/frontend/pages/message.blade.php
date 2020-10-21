@extends('frontend/layout.master')
@section('content')
@if(Session::has('message'))
@section('title', 'message')
<div class="bg-light mt-3 mb-3 show fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="far fa-check-circle"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Successfully!</h4>    
                <p>bạn đã đặt thành công</p>
                <p>Đơn hàng đã gửi tới email của bạn </p>
                <a href="{{ route('eshop') }}" class="btn btn-success" data-dismiss="modal"><span>Tiếp tục mua sắm </span> <i class="fas fa-cart-plus"></i></a>
                <button class="btn btn-danger" data-dismiss="modal"><span>Theo dõi đơn hàng </span> <i class="fas fa-eye"></i></button>
            </div>
        </div>
    </div>
</div>
@else
@section('title', 'error')
<div class="bg-light mt-3 mb-3 show fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-danger">
                <div class="icon-box">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Error!</h4>    
                <p>Trang bạn tìm kiếm dường như không tồn tại</p>
                <a href="{{ route('home') }}" class="btn btn-warning" data-dismiss="modal"><span>Trở về trang chủ </span> <i class="fas fa-home"></i></a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection