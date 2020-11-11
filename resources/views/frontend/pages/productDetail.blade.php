@extends('frontend.layout.master')
@section('title')
{{ $product->name }}
@endsection
@section('content')
@php
$product_id =$product->id;
@endphp
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
            <div id="product-single-container" class="dark reverse transparentbg">
            <div class="sidebg left"></div>
            <div class="sidebg middle left visible-sm"></div>
            <div class="sidebg right"></div>
            <div class="carousel-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <div class="product-single-carousel">
                                <div class="slide">
                                    <img src="storage/image/{{ $product->image1 }}" alt="product 1" class="img-responsive">
                                </div>
                                <div class="slide">
                                    <img src="storage/image/{{ $product->image2 }}" alt="product 2" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-margin2x visible-sm visible-xs"></div>
            <div class="product-single-meta-container">
                <div class="container">
                    <div class="col-md-6 product-single-meta">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div class="clearfix">
                            <div class="product-price-container pull-left">
                                @if ($product->price * $product->discount == 0)
                                <span class="product-price">{{ number_format($product->price) }} VNĐ</span>
                                @else
                                <strike class="product-price" style="color:gray;">{{ number_format($product->price) }} VNĐ </strike>
                                <span class="product-price"> {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ</span>
                                @endif
                            </div>
                            <div class="ratings-container pull-right">
                                <div class="ratings">
                                    <div class="ratings-result" data-result="80"></div>
                                </div><span class="ratings-amount">12 Review(s)</span><span class="separator">|</span> <a href="#" class="add-rating">add review</a></div>
                        </div>
                        <div class="xs-margin"></div>
                        <ul>
                            <li><span>@lang('language.accessories'):</span> {{ $product->accessories }}</li>
                            <li><span>@lang('language.brand'):</span> {{ $brand->name }}</li>
                        </ul>
                        <p class="hidden-md">{{ substr($product->desc, 0, 100) }}...</p>
                    <div class="product-action-container clearfix">
                        <div class="product-action-content clearfix"><input type="text" class="product-amount-input" value="1"> <a href="#" title="Add to Cart" class="btn btn-custom-6 min-width-md">@lang('language.add_to_cart') </a></div>
                        <div class="product-action-inner"> <a href="#" title="Wishlist" class="product-btn product-wishlist">Wishlist</a></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <div class="container">
                <ul class="nav nav-pills" role="tablist">
                    <li><a href="#description" role="tab" data-toggle="tab">@lang('language.desc') </a></li>
                    <li><a href="#details" role="tab" data-toggle="tab">Details</a></li>
                    <li class="active"><a href="#comments" role="tab" data-toggle="tab">@lang('language.comments') </a></li>
                    <li><a href="#accessories" role="tab" data-toggle="tab">@lang('language.related_products') </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="description">
                        {!! $product->desc !!}
                    </div>
                    <div class="tab-pane fade" id="details">
                        update...
                    </div>
                    <div class="tab-pane fade in active" id="comments">
                        <div class="row">
                            <div class="col-sm-7 padding-right-md review-comments">
                                <h3>{{ count($comments) }} @lang('language.comments') </h3>
                                <ul class="review-comments">
                                    @foreach($comments as $comment)
                                    <li>
                                        <div class="review-comment">
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-result" data-result="80"></div>
                                                </div>
                                            </div>
                                            <figure><img src="storage/image/{{ $comment->image_user }}" alt="Rafael"></figure>
                                            <div class="review-comment-content">
                                                <h4>{{ $comment->name }}</h4>
                                                <div class="review-comment-meta">{{ $comment->created_at }}</div>
                                                <p>{{ $comment->content }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lg-margin clearfix visible-xs"></div>
                            <div class="col-sm-5 padding-left-md review-comment-form">
                                <h3>Write your Review</h3>
                                <form action="#">
                                    <div class="form-group"><input type="text" class="form-control input-lg" placeholder="Enter your nickname *"></div>
                                    <div class="form-group"><input type="text" class="form-control input-lg" placeholder="Summary of your review *"></div>
                                    <div class="form-group"><textarea name="simple-message" class="form-control input-lg min-height" cols="30" rows="6" placeholder="Write your review *"></textarea></div>
                                    <div class="xs-margin"></div><input type="submit" class="btn btn-custom-5 btn-lg min-width" value="Submit Review"></form>
                            </div>
                        </div>
                        <div class="row">{{ $comments->render('vendor.pagination.default') }}</div>
                    </div>
                    <div class="tab-pane fade" id="accessories">
                        <div class="row">
                            @foreach($relatedProducts as $product)
                            <div class="col-sm-3 md-margin2x">
                                <div class="product product2">
                                    <div class="product-top">
                                        @if($product->price * $product->discount !=0)
                                        <span class="discount-box top-left bg-danger">-{{ $product->discount }}%</span>
                                        @endif
                                        <figure class="product-image-container">
                                            <a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image2 }}" alt="Product image hover" class="product-image-hover"></a>
                                        </figure>
                                    </div>
                                    <div class="product-price-container text-left">
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
                                    </div>
                                    <h3 class="product-name text-left"><a href="product.html" title="White linen sheer dress">{{ $product->name }}</a></h3>
                                    <div class="product-action-container clearfix"><a href="#" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">Cart</span></a>
                                        <div class="product-action-inner"><a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <div class="tab-pane fade" id="video">
                        <div class="embed-responsive embed-responsive-16by9"><iframe width="560" height="315" src="http://www.youtube.com/embed/hQfNtnKm5nA?list=UUJr72fY4cTaNZv7WPbvjaSw" allowfullscreen></iframe></div>
                    </div>
                </div>
            </div>
            <div class="lg-margin2x"></div>
            <div class="container">
                <div class="carousel-container">
                    <h2 class="carousel-title">@lang('language.maybe_you_are_interested') </h2>
                    <div class="row">
                        <div class="owl-carousel bestsellers-carousel">
                        	@foreach($producByCategories as $product)
                            <div class="product product2">
                                <div class="product-top">
                                    @if($product->price * $product->discount !=0)
                                    <span class="discount-box top-left bg-danger">-{{ $product->discount }}%</span>
                                    @endif
                                    <figure class="product-image-container">
                                        <a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress"><img src="storage/image/{{ $product->image1 }}" alt="Product image" class="product-image"> <img src="storage/image/{{ $product->image2 }}" alt="Product image hover" class="product-image-hover"></a>
                                    </figure>
                                </div>
                                <div class="product-price-container text-left">
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
                                </div>
                                <h3 class="product-name text-left"><a href="product.html" title="White linen sheer dress">{{ $product->name }}</a></h3>
                                <div class="product-action-container clearfix"><a href="#" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">Cart</span></a>
                                    <div class="product-action-inner"><a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-margin3x"></div>
        </section>
<script>
$(document).ready(function(){
    $('.pagination a').unbind('click').on('click', function(e) {
         e.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         getPosts(page);
         console.log(page);
    });
  
    function getPosts(page)
    {
        $.ajax({
             type: "GET",
             url: '{{ route("product.detail", $product_id) }}?page='+ page
        })
        .success(function(data) {
             $('body').html(data);
             // console.log(data);
        });
    }
});
    </script>
@endsection