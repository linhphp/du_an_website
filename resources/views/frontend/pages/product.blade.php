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
                        @if($product->price * $product->discount !=0)
                        <span class="discount-box top-left bg-danger">-{{ $product->discount }}%</span>
                        @endif
                        <figure><img src="storage/image/{{ $product->image1 }}" alt="item 1">
                            <figcaption class="portfolio-overlay">
                                <a href="#" title="Like" class="like-btn btn btn-danger" role="button"></a>
                            </figcaption>
                        </figure>
                        <div class="portfolio-meta">
                            <h2><a href="{{ route('product.detail', $product->id) }}" title="@lang('language.detail') ">{{ $product->name }}</a></h2>
                            <p class="portfolio-tags">
                                @if($product->price * $product->discount == 0)
                                <span class="product-price">
                                    {{ number_format($product->price) }} VNĐ
                                </span>
                                @else
                                <strike class="product-price" style="color:gray;">
                                    {{ number_format($product->price) }} VNĐ
                                </strike>
                                <span class="product-price">
                                    {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ
                                </span>
                                @endif
                            </p>
                        </div>
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
