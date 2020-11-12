@extends('frontend.layout.master')
@section('title')
@lang('language.home')
@endsection
@section('content')
<section id="content" role="main">
    @include('frontend/layout/slide')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner banner-sm text-right"><img src="frontend/images/banners/images-removebg-preview.png" style="width: 200px; height: 210px" alt="Banner 1">
                    <div class="banner-container">
                        <div class="vcenter-container">
                            <div class="vcenter">
                                <div class="banner-content text-uppercase">
                                    <h4>News</h4><a href="#" class="btn btn-custom-7 min-width-md">NEXT NEWS</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner banner-sm last text-right"><img src="frontend/images/banners/depositphotos_141339624-stock-illustration-genuine-product-rubber-stamp-removebg-preview.png" style="width: 200px; height: 210px"  alt="Banner 2">
                    <div class="banner-container">
                        <div class="vcenter-container">
                            <div class="vcenter">
                                <div class="banner-content text-uppercase">
                                    <h4>hot product</h4>
                                    <h3></h3><a href="#" class="btn btn-custom-7 min-width-md">Shop now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="xlg-margin"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">@lang('language.new_product') </h2>
            <div class="row">
                <div class="owl-carousel new-arrivals-carousel">
                    @foreach($products as $product)
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
                                <button type="submit" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">Cart</span>
                                </button>
                                <div class="product-action-inner">
                                    <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x xs-margin2x"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">{{ $brand->name }}</h2>
            <div class="row">
                <div class="owl-carousel top-bestsellers-carousel">
                    @foreach($productsByBrand as $product)
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
                                <button type="submit" title="Add to Cart" class="product-add-btn"><span class="add-btn-text">@lang('language.add_to_cart') </span> <span class="product-btn product-cart">Cart</span>
                                </button>
                                <div class="product-action-inner">
                                    <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x xs-margin2x"></div>
    <div class="sm-margin visible-xs"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-delivery"></span>
                    <div class="feature-content">
                        <h3>@lang('language.free_delivery') </h3>
                        <p>Cras pellentesque, nisi ac tempus pellentesque, orci sem commodo urna, amet egestas ipsum orci sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-service"></span>
                    <div class="feature-content">
                        <h3>@lang('language.customer_service') </h3>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas praesent tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-secured"></span>
                    <div class="feature-content">
                        <h3>@lang('language.payment_secured') </h3>
                        <p>Aenean porta adipiscing tortor, nec consequat nisi mollis sed. Aliquam orn are magna sed leo varius, quis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="xlg-margin hidden-xs"></div>
    <div class="sm-margin visible-xs"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">@lang('language.latest_news') </h2>
            <div class="row">
                <div class="owl-carousel blog-posts-carousel">
                    @foreach($getNews as $news)
                    <article class="article">
                        <div class="article-media-container">
                            <a href="{{ route('post', $news->slug) }}"><img src="storage/image/{{$news->post_image}}" class="img-responsive" alt="Post 1"></a>
                        </div>
                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span> <span class="meta-box-text">{{ $news->date }}</span></div>
                        <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span> <a href="#" class="meta-box-text">15 Com</a></div>
                        <h3><a href="{{ route('post', $news->slug) }}">{{ $news->title }}</a></h3>
                        <p>{{ $news->description }}</p>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin2x hidden-xs"></div>
    <div class="xlg-margin visible-xs"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">@lang('language.our_brands') </h2>
            <div class="row">
                <div class="owl-carousel brands-carousel">
                    @foreach($brands as $brand)
                    <div class="brand">
                        <a href="{{ route('eshop.brand', $brand->id) }}"><img width="200" height="200" src="storage/image/{{$brand->image}}" alt="Brand name"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="md-margin2x half hidden-xs"></div>
    <div class="lg-margin visible-xs"></div>
</section>
@endsection
