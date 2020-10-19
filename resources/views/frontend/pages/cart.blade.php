@extends('frontend/layout.master')
@section('title', 'home')
@section('content')
<script type="text/javascript">
	function updateCart (qty, rowId)
	{
        $.get(
            '{{ asset("eshop/cart/update") }}',
            {qty:qty, rowId:rowId},
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
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
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
                            @foreach($carts as $cart)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shopping-cart/cart-1.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $cart->name }}</h6>
                                        <h5>{{ number_format($cart->price) }} VNĐ</h5>
                                    </div>
                                </td>
                                <td>
                                    <img src="storage/image/{{ $cart->options->image }}" alt="">
                                </td>
                                <td class="quantity__item">
                                    <div class="form-group ml-2 mr-2">
                                        <input  type="number" class="form-control" value="{{ $cart->qty }}" onchange="updateCart(this.value, '{{ $cart->rowId }}')">
                                    </div>
                                </td>
                                <td class="cart__price">{{ number_format($cart->price * $cart->qty) }} VNĐ</td>
                                <form action="{{ route('cart.remote', $cart->rowId) }}" method="post">
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
                        <li>Số lượng <span>{{ Cart::count() }}</span></li>
                        <li>Tổng tiền <span>{{ Cart::total() }} VNĐ</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection