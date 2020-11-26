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
                        <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.check_out') </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="xs-margin"></div>
    <div class="accordion" id="collapse" ng-controller="CartCheckoutController">
        <form name="getCheckout" action="{{ route('checkout.post', $cart->id) }}" method="post">
            @csrf
            <div class="accordion-group panel darkerbg">
                <div class="container">
                    <h2 class="accordion-title"><span>Billing Informations</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-two"></a>
                    </h2>
                    <div class="accordion-body collapse in" id="collapse-two">
                        <div class="row accordion-body-wrapper">
                            <div class="col-sm-6 padding-right-md">
                                <h3 class="subtitle">Your Personal Details</h3>
                                <div class="xs-margin half"></div>
                                <div class="form-group">
                                    <label for="name" class="form-label">@lang('language.enter_name') <span class="required">*</span></label>
                                    <input ng-model="checkout.name" ng-requied="true" type="text" name="name" id="name" class="form-control input-lg" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                                    <input ng-model="checkout.email" ng-requied="true"  type="email" name="email" id="email" class="form-control input-lg" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">@lang('language.telephone_number') <span class="required">*</span></label>
                                    <input ng-model="checkout.phone" ng-requied="true"  type="text" name="phone" id="phone" class="form-control input-lg" required>
                                </div>
                                <div class="form-group">
                                    <label for="note" class="form-label">@lang('language.note') <span class="required">*</span></label>
                                    <input type="text" name="note" id="note" class="form-control input-lg" required>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="phone" class="form-label">@lang('language.payment_methods') <span class="required">*</span></label>
                                    <div class="custom-checkbox-wrapper">
                                        <span class="custom-checkbox-container">
                                            <input type="checkbox" name="payment" value="COD">
                                            <span class="custom-checkbox-icon"></span>
                                        </span>
                                        <span>@lang('language.payment_in_cash') </span>
                                    </div>
                                    <div class="custom-checkbox-wrapper">
                                        <span class="custom-checkbox-container">
                                            <input type="checkbox" name="payment" value="ATM">
                                            <span class="custom-checkbox-icon"></span>
                                        </span>
                                        <span>@lang('language.transfer')</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="md-margin visible-xs clearfix"></div>
                            <div class="col-sm-6 padding-left-md">
                                <h3 class="subtitle">@lang('language.address') </h3>
                                <div class="xs-margin half"></div>
                                <div class="form-group">
                                    <label for="country" class="form-label">@lang('language.province') <span class="required">*</span></label>
                                    <select ng-model="checkout.province" ng-requied="true" id="province" name="province" class="form-control input-lg">
                                        <option value="">@lang('language.select_a_province') </option>
                                        @foreach($provinces as $name => $id)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="district" class="form-label">@lang('language.distrist') <span class="required">*</span></label>
                                    <select ng-model="checkout.district" ng-requied="true" id="district" name="district" class="form-control input-lg">
                                        <option value="">@lang('language.not_selected_province') </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ward" class="form-label">@lang('language.wards') <span class="required">*</span></label>
                                    <select ng-model="checkout.ward" ng-requied="true" id="ward" name="ward" class="form-control input-lg">
                                        <option value="">@lang('language.no_district_selected') </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="street" class="form-label">@lang('language.street_hose') <span class="required">*</span></label>
                                    <input type="text" name="street" id="street" class="form-control input-lg" required>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-group panel">
                <div class="container">
                    <h2 class="accordion-title"><span>Confirm Order</span>
                        <a class="accordion-btn open" data-toggle="collapse" href="#collapse-five"></a>
                    </h2>
                    <div class="accordion-body collapse in" id="collapse-five">
                        <div class="row accordion-body-wrapper">
                            <div class="col-md-12">
                                <table class="table checkout-table">
                                    <thead>
                                        <tr>
                                            <th class="table-title">@lang('language.name_product') </th>
                                            <th class="table-title">@lang('language.price') </th>
                                            <th class="table-title">@lang('language.quantity') </th>
                                            <th class="table-title">@lang('language.sub_total') </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalP = 0;
                                            $totalQty = 0;
                                        @endphp
                                        @foreach($cartDetails as $cartDetail)
                                        @php $price =  ($cartDetail->price -($cartDetail->price * $cartDetail->discout)/100);
                                                $totalPrice = $price * $cartDetail->qty;
                                                $totalP += $totalPrice;
                                                $totalQty += $cartDetail->qty;
                                        @endphp
                                        <tr>
                                            <td class="product-name-col">
                                                <figure>
                                                    <a href="{{ route('product.detail', $cartDetail->product_id) }}"><img src="storage/image/{{ $cartDetail->image1 }}" alt="White linen sheer dress"></a>
                                                </figure>
                                                <h2 class="product-name"><a href="{{ route('product.detail', $cartDetail->product_id) }}">{{ $cartDetail->name }}</a></h2>
                                            </td>
                                            <td class="product-price-col"><span class="product-price-special">{{ number_format($price) }} VNĐ</span></td>
                                            <td>
                                                <div class="custom-quantity-input">
                                                    <input type="number" name="qty" value="{{ $cartDetail->qty }}" disabled="">
                                                </div>
                                            </td>
                                            <td class="product-total-col"><span class="product-price-special">{{ number_format($cartDetail->price * $cartDetail->qty) }}</span></td>
                                            <td>
                                                <a ng-click="remove()" class="close-button"></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="merged">
                                            <td class="checkout-table-title" colspan="3">@lang('language.sub_total'):</td>
                                            <td class="checkout-table-price" colspan="2">{{ number_format($totalP) }} VNĐ</td>
                                        </tr>
                                        <tr class="merged">
                                            <td class="checkout-table-title" colspan="3">Shipping:</td>
                                            <td class="checkout-table-price" colspan="2">free</td>
                                        </tr>
                                        <tr class="merged">
                                                <td class="checkout-table-title" colspan="3">TAX (0%):</td>
                                            <td class="checkout-table-price" colspan="2">free</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="checkout-total-title" colspan="3">@lang('language.total_price'):</td>
                                            <td class="checkout-total-price cart-total" colspan="2">{{ number_format($totalP) }} VNĐ</td>
                                            <input type="hidden" name="totalPrice" value="{{ $totalP }}">
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="md-margin half"></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" ng-disabled="getCheckout.$invalid" class="btn btn-custom btn-lger min-width-slg">@lang('language.confirm_order') </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="xlg-margin"></div>
</section>
@endsection
