@extends('frontend.layout.master')
@section('title')
@lang('language.brand')
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="index-2.html" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.brand') </li>
                        <li class="active">{{ $brand->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="lg-margin"></div>
                <div class="row">
                    <div class="col-md-9 padding-right-lg">
                        <div class="category-grid">
                            <div class="row">
                                @foreach($products as $product)
                                <form action="{{ route('cart.add', $product->id) }}" method="post">
                                    @csrf
                                    <div class="col-sm-4 md-margin2x">
                                        <div class="product">
                                            <div class="product-top">
                                                @if($product->price * $product->discount !=0)
                                                <span class="discount-box top-left bg-danger">-{{ $product->discount }}%</span>
                                                @endif
                                                <figure class="product-image-container">
                                                    <a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image2 }}" alt="Product image hover" class="product-image-hover"></a>
                                                </figure>
                                                <div class="product-action-container">
                                                    <div class="product-action-wrapper action-responsive">
                                                        <button href="#" title="Add to Cart" class="btn btn-block p-1 product-add-btn">
                                                            <span class="add-btn-text">@lang('language.add_to_cart') </span>
                                                            <span class="product-btn product-cart">Cart</span>
                                                        </button>
                                                        <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="1" name="qty">
                                            <h3 class="product-name"><a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress">{{ $product->name }}</a></h3>
                                            <div class="product-price-container">
                                                @if($product->price * $product->discount == 0)
                                                <span class="product-price">
                                                    {{ number_format($product->price) }} VNĐ
                                                </span>
                                                @else
                                                <span class="product-old-price">
                                                    {{ number_format($product->price) }} VNĐ
                                                </span>
                                                <span class="product-price">
                                                    {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                    <aside class="col-md-3 sidebar margin-top-up" role="complementary">
                        <div class="widget">
                            <h3>@lang('language.brand') </h3>
                            <ul id="category-widget">
                            	@foreach($brands as $id => $name)
                                <li class="open"><a href="{{ route('eshop.brand', $id) }}">{{ $name }} </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x hidden-xs"></div>
    <div class="md-margin2x visible-xs"></div>
</section>

@endsection