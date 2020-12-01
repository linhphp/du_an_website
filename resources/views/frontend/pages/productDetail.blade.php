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
                <div class="col-sm-6 col-sm-push-6" >
                    <div class="product-single-carousel" style="height: 100%">
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
        <form action="{{ route('cart.add', $product->id) }}" name="cartAdd" method="post">
            @csrf
            <div class="container">
                <div class="col-md-6 product-single-meta" style="height: 400px">
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
                            </div><span class="ratings-amount">12 @lang('language.review')(s)</span><span class="separator">|</span> <a href="#" class="add-rating">@lang('language.add_reviews') </a></div>
                    </div>
                    <div class="xs-margin"></div>
                    <ul>
                        <li><span>@lang('language.accessories'):</span> {{ $product->accessories }}</li>
                        <li><span>@lang('language.brand'):</span> {{ $brand->name }}</li>
                    </ul>
                    <p class="hidden-md">{!! substr($product->desc, 0, 100) !!}...</p>
                    @if($product->quantity > 0)
                    <span>Quantity: {{ $product->quantity }}</span>
                    <div class="product-action-container clearfix">
                        <div class="product-action-content clearfix">
                            <input type="number" name="qty" class="product-amount-input" min="1" max="{{ $product->quantity }}" value="1">
                            <button title="Add to Cart" class="btn btn-custom-6 min-width-md" type="submit">@lang('language.add_to_cart') </button>
                        </div>
                        <div class="product-action-inner"> <a href="#" title="Wishlist" class="product-btn product-wishlist">Wishlist</a></div>
                    </div>
                    @else
                    <p class="product-price">@lang('language.the_product_is_temporarily_out_of_stock') </p>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
    <div class="container">
        <ul class="nav nav-pills" role="tablist">
            <li><a href="#description" role="tab" data-toggle="tab">@lang('language.desc') </a></li>
            <li><a href="#details" role="tab" data-toggle="tab">@lang('language.detail') </a></li>
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
                            <div id="comment-add">
                            </div>
                            @foreach($comments as $comment)
                            <li>
                                <div class="review-comment">
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-result" data-result="80"></div>
                                        </div>
                                    </div>
                                    <div class="review-comment-content">
                                        <h4>{{ $comment->user_name }}</h4>
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
                    <div class="col-sm-5 padding-left-md review-comment-form" ng-controller="CommentController">
                        <h3>@lang('language.write_your_review') </h3>
                        <form name="addComment" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Enter your nickname *" ng-model="comment.name" ng-required="true" name="name">
                                <span ng-show="addComment.user_name.$error.required">@lang('language.name') </span>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control input-lg min-height" cols="30" rows="6" placeholder="Write your review *" ng-model="comment.message" ng-required="true"></textarea>
                                <span ng-show="addComment.message.$error.required">@lang('language.please_enter_your_comment') </span>
                            </div>
                            <div class="xs-margin"></div>
                            <button type="button" class="btn btn-custom-5 btn-lg min-width" ng-disabled="addComment.$invalid" ng-click="save()" >@lang('language.comment') </button>
                        </form>
                    </div>
                </div>
                <div class="row">{{ $comments->render('vendor.pagination.default') }}</div>
            </div>
            <div class="tab-pane fade" id="accessories">
                <div class="row">
                    @if (count($relatedProducts) == 0)
                    <h2>@lang('language.no_related_products') </h2>
                    @endif
                    @foreach($relatedProducts as $product)
                    <div class="col-sm-3 md-margin2x">
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
                                    <strike class="product-price" style="color:gray;">
                                        {{ number_format($product->price) }} VNĐ
                                    </strike>
                                    <span class="product-price">
                                        {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ
                                    </span>
                                    @endif
                                </div>
                                <h3 class="product-name text-left"><a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress">{{ $product->name }}</a></h3>
                                <div class="product-action-container clearfix">
                                    <button type="submit" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">@lang('language.cart') </span>
                                    </button>
                                    <div class="product-action-inner">
                                        <a href="#" title="Favorite" class="product-btn product-favorite">@lang('language.favorite') </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
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
                                    <strike class="product-price" style="color:gray;">
                                        {{ number_format($product->price) }} VNĐ
                                    </strike>
                                    <span class="product-price">
                                        {{ number_format($product->price - (($product->price * $product->discount)/100)) }} VNĐ
                                    </span>
                                    @endif
                                </div>
                                <h3 class="product-name text-left"><a href="{{ route('product.detail', $product->id) }}" title="White linen sheer dress">{{ $product->name }}</a></h3>
                                <div class="product-action-container clearfix">
                                    <button type="submit" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">@lang('language.cart') </span>
                                    </button>
                                    <div class="product-action-inner">
                                        <a href="#" title="Favorite" class="product-btn product-favorite">@lang('language.favorite') </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="md-margin3x"></div>
</section>
<script>

var product_id = "{{ $product_id }}";
app.controller('CommentController', function($scope, $http) {
    $scope.save = function() {
        var data = $.param($scope.comment);
        $http({
                method: 'POST',
                url: 'index/comment/'+product_id,
                data: data,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(reponsse) {
                console.log(reponsse.user_name);
                $('div [id="comment-add"]').append(
                    '<li style="margin-bottom: 47px">' + '<div class="review-comment">' + '<div class="ratings-container">' + '<div class="ratings">' + '<div class="ratings-result" data-result="80"></div>' + '</div>' + '</div>' + '<div class="review-comment-content">' + '<h4>'+ reponsse.user_name + '</h4>' + '<div class="review-comment-meta"' + reponsse.created_at + '</div>' +  '<p>' + reponsse.content + '</p>' + '</div> </div> </li>'
                    );
            })
            .error(function(reponsse) {
                console.log(reponsse);
                alert('error'+reponsse);
            })
        }
});
    </script>
@endsection