@extends('frontend/layout.master')
@section('title', 'cart')
@section('content')
<script type="text/javascript">
    function updateCart (qty, id)
    {
        $.get(
            '{{ asset("index/checkout/cart/update") }}',
            {qty:qty, id:id},
            function(){
                location.reload();
            }
            );
    }
</script>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('eshop') }}">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>sản phẩm</th>
                                <th style="width: 150px;">Hình ảnh</th>
                                <th class="text-md-center">số lượng</th>
                                <th>Tổng giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totalQty = 0; 
                                $totalP = 0; 
                            ?>
                            @foreach($cartDetails as $cartDetail)
                            <?php $price =  ($cartDetail->price -($cartDetail->price * $cartDetail->discout)/100);
                                $totalPrice = $price * $cartDetail->qty;
                                $totalP += $totalPrice;
                                $totalQty += $cartDetail->qty;
                            ?>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-1.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $cartDetail->name }}</h6>
                                        <h5>{{ number_format($price) }} VNĐ</h5>
                                    </div>
                                </td>
                                <td>
                                    <img src="storage/image/{{ $cartDetail->image }}" alt="">
                                </td>
                                <td class="quantity__item">
                                    <div class="form-group ml-2 mr-2">
                                        <input  type="number" min="1" class="form-control" value="{{ $cartDetail->qty }}" onchange="updateCart(this.value, '{{ $cartDetail->id }}')">
                                    </div>
                                </td>
                                <td class="cart__price">{{ number_format($totalPrice) }} VNĐ</td>
                                <form action="{{ route('cart.remote', $cartDetail->id) }}" method="post">
                                    @csrf
                                    <td class="cart__close">
                                        <button class="btn-outline-danger btn"><i class="fa fa-close"></i></button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ route('eshop') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Tổng giỏ hàng</h6>
                    <ul>
                        <li>Số lượng mặt hàng <span>{{ $totalQty }}</span></li>
                        <li>Tổng tiền <span>{{ number_format($totalP) }} VNĐ</span></li>
                    </ul>
                    <a href="{{ route('checkout.get', $cart->id) }}" class="primary-btn">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection