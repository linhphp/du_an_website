@extends('frontend/layout.master')
@section('title', 'cart')
@section('content')

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ route('checkout.post', $cart->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        
                        <h6 class="checkout__title">Thông tin về khách hàng</h6>
                        <div class="row">
                            <div class="col-12">
                                @if ($customer)
                                <p class="alert-danger">
                                    Bạn có muốn sử dụng địa chỉ này không?
                                </p>
                                <div class="row">
                                    <div class="col-12 card text-center">
                                        <div class="card-body">
                                            <div class="checkout__input__checkbox">
                                                <label for="address">
                                                    <h4 class="card-title">{{ $customer->name }}</h4>
                                                    <p class="card-text">
                                                        {{ $customer->email }}  
                                                    </p>
                                                    <p class="card-text">
                                                        {{ $customer->phone }}  
                                                    </p>
                                                    <p class="card-text">
                                                        {{ $customer->address }}  
                                                    </p>
                                                </label>
                                                <input type="checkbox" id="address" name="address" value="{{ $customer->id }}">
                                                <span class="checkmark"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input type="text" name="name">
                                </div>
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email">
                                </div>
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="number" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p>Tỉnh thành<span>*</span></p>
                                    <select class="form-control w-100" name="city" id="">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($provinces as $key => $value)
                                        <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>Quận huyện<span>*</span></p>
                                    <select class="form-control w-100" name="district" id="">
                                       <option value="">chưa chọn tỉnh thành</option>
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>Phường xã<span>*</span></p>
                                    <select class="form-control w-100" name="ward" id="">
                                       <option value="">Chưa chọn quận huyện</option>
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>Tên đường / Số nhà<span>*</span></p>
                                    <input type="text" name="street">
                                </div>                                 
                            </div>
                            
                        </div>
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <input type="text"
                            placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>số lượng</span></div>
                            <?php
                                $totalP = 0; 
                            ?>
                            @foreach($cartDetails as $cartDetail)
                            <?php $price =  ($cartDetail->price -($cartDetail->price * $cartDetail->discout)/100);
                                $totalPrice = $price * $cartDetail->qty;
                                $totalP += $totalPrice;
                            ?>
                            <ul class="checkout__total__products">
                                <li>{{ $cartDetail->name }} <span class="text-danger font-weight-bold">{{ $cartDetail->qty }}</span>
                                    <p class="font-weight-bold">{{ number_format($cartDetail->price) }} VNĐ</p>
                                </li>
                            </ul>
                            @endforeach
                            <ul class="checkout__total__all">
                                <li>Tổng tiền <span>{{ number_format($totalP) }} VNĐ</span></li>
                                <input type="hidden" name="total_price" value="{{ $totalP }}">
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán tiền mặt
                                    <input type="checkbox" id="payment" name="payment" value="COD">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Chuyển khoản
                                    <input type="checkbox" id="paypal" name="payment" value="ATM">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection