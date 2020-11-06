@extends('frontend.layout.master')
@section('title','eshop')
@section('eshop', 'active')
@section('content')

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>@lang('language.shopping') </h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">@lang('language.home') </a>
                        <span>@lang('language.shopping') </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mx-auto">
            <div class="fb-like mx-2" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
            <div class="fb-share-button" data-href="http://127.0.0.1:8000/index" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
        </div>
    </div>
</section>
<section class="shop spad">
    <div class="container">
        <div class="row">
            @include('frontend.layout.aside')
            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $product)
                    @if($product->discount == 0)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="qty" value="1">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="storage/image/{{$product->image}}">
                                    <span class="label">@lang('language.new') </span>
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                        <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"> </i> @lang('language.detail') </a></li>

                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$product->name}}</h6>
                                    <button class="add-cart">@lang('language.add_to_cart') </button>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>{{number_format($product->price)}} VND</h5>

                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <form action="{{ route('cart.add', $product->id) }}" method="post">
                            @csrf
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="storage/image/{{$product->image}}">
                                    <span class="label">@lang('language.sale')</span>
                                     <input type="hidden" name="qty" value="1">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                        <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"> </i> @lang('language.detail') </a></li>

                                    </ul>
                                </div>
                                <div class="product__item__text">
                                <h6>{{$product->name}}</h6>
                                <button class="add-cart">@lang('language.add_to_cart')</button>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5 style="text-decoration: line-through; color: darkred;">{{number_format($product->price)}} VND</h5>
                                <h5>{{number_format($product->price-(($product->price * $product->discount)/100))}} VND</h5>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @endforeach
                    <div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="10" data-width=""></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
