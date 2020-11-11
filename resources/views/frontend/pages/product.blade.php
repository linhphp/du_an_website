@extends('frontend.layout.master')
@section('title')
@lang('language.product')
@endsection
@section('content')
<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                        <li class="active">@lang('language.product') </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="md-margin"></div>
    <div class="container">
        <ul id="portfolio-filter" class="nav nav-pills">
            <li class="active"><a href="#" data-filter="*">All</a></li>
            @foreach ($categories as $id => $name)
            <li><a href="#" data-filter=".{{ $name }}">{{ $name }}</a></li>
            @endforeach
        </ul>
        <div id="portfolio-wrapper">
            <div class="row">
                <ul id="portfolio-item-container" class="clearfix" data-layoutmode="masonry" data-animationclass="rollIn">
                    @php
                        $i = 0;
                        $col = 0;
                        $name = 'all';
                    @endphp
                    @foreach($products as $product)
                        @php
                        $col++;
                            $i +=100;
                        @endphp
                    <li class="col-xs-12 col-sm-4 portfolio-item animate-item {{ $product->category_name }}" data-animate-time="{{ $i }}">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                        @csrf
                        <div class="product product2">
                            <div class="product-top">
                                @if($product->price * $product->discount !=0)
                                <span class="discount-box top-left bg-danger">-{{ $product->discount }}%</span>
                                @endif
                                <figure class="product-image-container">
                                    <a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image2 }}" alt="Product image hover" class="product-image-hover"></a>
                                </figure>
                            </div>
                            <input type="hidden" value="1" name="qty">
                            <div class="product-price-container text-left">
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
                            <h3 class="product-name text-left"><a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress">{{ $product->name }}</a></h3>
                            <div class="product-action-container clearfix">
                                <button type="submit" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">Cart</span>
                                </button>
                                <div class="product-action-inner">
                                    <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
            <div class="pagination-container reverse-xs-margin clearfix">
                {{ $products->render('vendor.pagination.default') }}
            </div>
    </div>
    <div class="lg-margin2x"></div>
</section>

@endsection
