@extends('frontend.layout.master')
@section('title')
@lang('language.cart')
@endsection
@section('content')
<script type="text/javascript">
    function updateCart (qty, id)
    {
        $.get(
            '{{ asset("index/checkout/cart/update") }}',
            {qty:qty, id:id},
            function(){
                location.reload();
        });
    }

</script>
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.cart') </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table cart-table" ng-controller="CartController">
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
                                if ($cartDetail->pro_quantity > 0) {
                                    $totalP += $totalPrice;
                                    $totalQty += $cartDetail->qty;
                                }
                        @endphp
                        <tr>
                            <td class="product-name-col">
                                <figure>
                                    <a href="{{ route('product.detail', $cartDetail->product_id) }}"><img src="storage/image/{{ $cartDetail->image1 }}" alt="White linen sheer dress"></a>
                                </figure>
                                <h2 class="product-name"><a href="{{ route('product.detail', $cartDetail->product_id) }}">{{ $cartDetail->name }}</a></h2>
                            </td>
                            <td class="product-price-col"><span class="product-price-special">{{ number_format($price) }} VNĐ</span></td>
                                @if($cartDetail->pro_quantity == 0)
                                <td>
                                    <p class="product-price">sản phẩm tạm hết hàng</p>
                                </td>
                                <td></td>
                                @else
                                <td>
                                    @if($cartDetail->pro_quantity <= 10)
                                        <p class="product-price">còn lại {{ $cartDetail->pro_quantity  }} sản phẩm</p>
                                    @endif
                                    <div class="custom-quantity-input">
                                        <input type="number" name="qty" value="{{ $cartDetail->qty }}" onchange="updateCart(this.value, '{{ $cartDetail->id }}')">
                                    </div>

                                </td>
                            <td class="product-total-col"><span class="product-price-special">{{ number_format($cartDetail->price * $cartDetail->qty) }}</span></td>
                                @endif
                            <td>
                                <a ng-click="remove({{ $cartDetail->id }})" class="close-button"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="md-margin"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-container left clearfix">
                            <ul class="nav nav-tabs" role="tablist">
                                <li>
                                    <a href="#discount" data-toggle="tab">Discount Code</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="discount">
                                    <p class="ship-desc">Enter your discount coupon here:</p>
                                    <hr>
                                    <div class="ship-row clearfix"><span class="ship-label col-3">Discount Code<i>*</i></span>
                                        <div class="col-3-2x"><input type="text" class="form-control" placeholder="coupon here"></div>
                                    </div>
                                    <div class="ship-row"><a class="btn btn-custom-5">Activate</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="md-margin"></div>
                        <a href="{{ route('eshop') }}" class="btn btn-custom-5 btn-lger min-width-lg">Continue Shopping</a>
                    </div>
                    <div class="md-margin visible-sm visible-xs clearfix"></div>
                    <div class="col-md-4">
                        <table class="table total-table">
                            <tbody>
                                <tr>
                                    <td class="total-table-title">@lang('language.sub_total'):</td>
                                    <td>{{ number_format($totalP) }} VNĐ</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">Shipping:</td>
                                    <td>free</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">TAX (0%):</td>
                                    <td>free</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>@lang('language.total_price'):</td>
                                    <td>{{ number_format($totalP) }} VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="md-margin"></div>
                        <div class="text-right"><a href="{{ route('checkout.get', $cart->id) }}" class="btn btn-custom-6 btn-lger min-width-sm">@lang('language.check_out') </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin2x"></div>
</section>
<script type="text/javascript" >
    app.controller('CartController', function($scope,$http){
        $scope.remove = function(id) {
            $http({
                    method: 'POST',
                    url: 'index/checkout/cart/'+id+'/remove',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).success(function(reponsse) {
                    console.log(reponsse);
                    location.reload();
                })
                .error(function(reponsse) {
                    console.log(reponsse);
                    alert('loi xay ra'+reponsse);
                })
        }
    })
</script>
@endsection