@extends('frontend.layout.master')
@section('title')
@lang('language.search') | {{ $key }}
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="@lang('language.home')">@lang('language.home') </a></li>
                        <li class="active">@lang('language.search') </li>
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
                    <div class="col-md-12 padding-right-lg">
                    	<h4>{{ count($products) }} @lang('language.results_found') </h4>
                    	@if(count($products) > 0)
                        <div class="category-list">
                	        @foreach($products as $product)
                	        <form action="{{ route('cart.add', $product->id) }}" method="post">
                	        	@csrf
	                            <div class="row product">
	                                <div class="col-sm-9 clearfix">
	                                    <div class="product-top">
	                                        <figure class="product-image-container">
	                                            <a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image1 }}" alt="Product image hover" class="product-image-hover"></a>
	                                        </figure>
	                                    </div>
	                                    <div class="product-list-content">
	                                        <h3 class="product-name"><a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress">{{ $product->name }}</a></h3>
	                                        <p>{{ $product->desc }}</p>
	                                    </div>
	                                </div>
	                                <input type="hidden" name="qty" value="1">
	                                <div class="col-sm-3 product-list-meta">
	                                    @if($product->price * $product->discount == 0)
	                                    <div class="product-price-container">
			                                <span class="product-price">
			                                    {{ number_format($product->price) }} VNĐ
			                                </span>
			                            </div>

			                            @else
		                                <div class="product-price-container">
			                                <span class="product-old-price">
			                                    {{ number_format($product->price) }} VNĐ
			                                </span>
		                                </div>
		                                <div class="product-price-container">
			                                <span class="product-price">
			                                    {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ
			                                </span>
			                            </div>

			                            @endif
	                                    <div class="ratings-container">
	                                        <div class="ratings">
	                                            <div class="ratings-result" data-result="80"></div>
	                                        </div>
	                                        <span class="ratings-amount">2 review(s)</span>
	                                    </div>
	                                    <div class="product-action-container">
	                                    	<button type="submit" title="Add to Cart" class="btn btn-custom btn-block">
	                                    		<span class="add-btn-text">Add to Cart</span>
	                                    	</button>
	                                        <div class="sm-margin">
	                                        	
	                                        </div>
	                                        <div class="product-list-action-wrapper">
	                                        	<a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                            </form>
                            @endforeach
                            <div class="pagination-container clear-margin clearfix">
                            	{{ $products->render('vendor.pagination.default') }}
                            </div>
                        </div>
                        @endif
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x hidden-xs"></div>
    <div class="md-margin2x visible-xs"></div>
</section>

@endsection