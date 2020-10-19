@extends('frontend.layout.master')
@section('title')
product | {{ $product->name }}
@endsection
@section('content')

<section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('eshop') }}">Shop</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="storage/image/{{ $product->image }}">
                                    </div>
                                </a>
                            </li>
                            <?php $i = 1; ?>
                            @foreach ($image as $img)
                            <?php $i++; ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-{{$i}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="storage/image/{{$img->emagery}}">
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="storage/image/{{$product->image}}" alt="">
                                </div>
                            </div>
                            <?php $i =1; ?>
                            @foreach ($image as $img)
                            <?php $i++; ?>
                            <div class="tab-pane" id="tabs-{{$i}}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="storage/image/{{$img->emagery}}" alt="">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="qty" value="1">
                            <div class="product__details__text">
                                <h4>{{ $product->name }}</h4>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span> - 5 Reviews</span>
                                </div>
                                <h3>{{ number_format($product->price-(($product->price * $product->discount)/100)) }} VND
                                	@if($product->discount != 0)
                                	<span>{{ number_format($product->price) }} VND</span>
                                	@endif
                                </h3>
                                <p>{{ $product->desc }}</p>
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                    <button class="primary-btn">add to cart</button>
                                </div>
                                <div class="product__details__btns__option">
                                    <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">
                                        	{{ $product->content }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                       <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
            	@foreach ($productByBrand as $byBrand)
            	@if ($byBrand['discount'] == 0)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <form action="{{ route('cart.add', $product['id']) }}" method="post">
                    @csrf
                    <input type="hidden" name="qty" value="1">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="storage/image/{{ $byBrand['image'] }}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $byBrand['id']) }}"><i class="fa fa-info"></i> chi tiết</a></li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $byBrand['name'] }}</h6>
                            <button class="add-cart">thêm vào giỏ hàng</button>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{ number_format($byBrand['price']) }} VND</h5>
                           
                        </div>
                    </div>
                </form>
                </div>
                @else
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="qty" value="1">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="storage/image/{{ $byBrand['image'] }}">
                                <span class="label">sale</span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                    <li><a class="detail" href="{{ route('product.detail', $byBrand['id']) }}"><i class="fa fa-info"></i> chi tiết</a></li>
                                    
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $byBrand['name'] }}</h6>
                                <button class="add-cart">thêm vào giỏ hàng</button>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>{{ number_format($byBrand['price']) }} VND</h5>
                               
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection