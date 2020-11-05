@extends('frontend/layout.master')
@section('title')
@lang('language.cart')
@endsection
@section('content')

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>@lang('language.check_out') </h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">@lang('language.home') </a>
                        <a href="./shop.html">@lang('language.shopping') </a>
                        <span>@lang('language.check_out') </span>
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
                        
                        <h6 class="checkout__title">@lang('language.customer_information') </h6>
                        <div class="row">
                            <div class="col-12">
                                @if ($customer)
                                <p class="alert-danger">
                                    @lang('language.like_address')
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
                                    <p>@lang('language.full_name') <span>*</span></p>
                                    <input type="text" name="name">
                                </div>
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email">
                                </div>
                                <div class="checkout__input">
                                    <p>@lang('language.telephone_number') <span>*</span></p>
                                    <input type="number" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p>@lang('language.province') <span>*</span></p>
                                    <select class="form-control w-100" name="city" id="">
                                        <option value="">@lang('language.select_a_province') </option>
                                        @foreach($provinces as $key => $value)
                                        <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>@lang('language.distrist') <span>*</span></p>
                                    <select class="form-control w-100" name="district" id="">
                                       <option value="">@lang('language.not_selected_province') </option>
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>@lang('language.wards') <span>*</span></p>
                                    <select class="form-control w-100" name="ward" id="">
                                       <option value="">@lang('language.no_district_selected') </option>
                                    </select>
                                </div>
                                <div class="checkout__input">
                                    <p>@lang('language.street_hose') <span>*</span></p>
                                    <input type="text" name="street">
                                </div>                                 
                            </div>
                            
                        </div>
                        <div class="checkout__input">
                            <p>@lang('language.order_notes') </p>
                            <input type="text"
                            placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">@lang('language.your_order') </h4>
                            <div class="checkout__order__products">@lang('language.product') <span>@lang('language.quantity') </span></div>
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
                                <li>@lang('language.total_price') <span>{{ number_format($totalP) }} VNĐ</span></li>
                                <input type="hidden" name="total_price" value="{{ $totalP }}">
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    @lang('language.payment_in_cash')
                                    <input type="checkbox" id="payment" name="payment" value="COD">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    @lang('language.transfer')
                                    <input type="checkbox" id="paypal" name="payment" value="ATM">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">@lang('language.place_order') </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
