@extends('frontend.layout.master')
@section('title','eshop')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thông tin chi tiết đơn hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('bills.index') }}">bills</a>
                        <span>Bill Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <p>Tên Khách Hàng: <span class="text-danger">{{ $bill->name }}</span></p>
            <p>Email: <span class="text-danger">{{ $bill->email }}</span></p>
            <p>Số điện thoại: <span class="text-danger">{{ $bill->phone }}</span></p>
            <p>Địa chỉ: <span class="text-danger">{{ $bill->address }}</span></p>
            <p>Ghi chú: <span class="text-danger">{{ $bill->note }}</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-inverse">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalPrice =0; ?>
                    @foreach ($billDetails as $billDetail)
                    <tr>
                        <td>{{ $billDetail->name }}</td>
                        <td>{{ number_format($billDetail->price) }} VNĐ</td>
                        <td>{{ $billDetail->qty }}</td>
                        <td>{{ number_format($billDetail->price * $billDetail->qty) }} VNĐ</td>
                        <?php $totalPrice += ($billDetail->price * $billDetail->qty);?>
                    </tr>
                    @endforeach
                    <tr>
                        <td><p class="font-weight-bold">Tổng tiền</p></td>
                        <td></td><td></td>
                        <td colspan="3" class=" font-weight-bold text-danger">{{ number_format($totalPrice) }} VNĐ</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection