@extends('frontend.layout.master')
@section('title')
@lang('language.home')
@endsection
@section('home', 'active')
@section('content')
    @if(Session::has('note'))

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-md-center"> {{Session::get('note')}} </h3>
                    </div>
                </div>
            </div>
        </section>

    @endif
    @include('frontend/layout/slide')

<section class="product spad mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li>
                        <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                        <div class="fb-share-button" data-href="http://127.0.0.1:8000/index" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </li>
                    <li class="active" data-filter="*">@lang('language.all_product') </li>
                    <li data-filter=".new-arrivals">@lang('language.new_product') </li>
                    <li data-filter=".hot-sales">@lang('language.discount') </li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($products as $product)
            @if($product->discount == 0)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <form action="{{ route('cart.add', $product->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="qty" value="1">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="storage/image/{{$product->image}}">
                            <span class="label">@lang('language.new') </span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"></i>@lang('language.detail') </a></li>

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
                            <h5>{{number_format($product->price)}} VND</h5>

                        </div>
                    </div>
                </form>
            </div>
            <!-- end col -->
            @else
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <form action="{{ route('cart.add', $product->id) }}" method="post">
                    @csrf
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="storage/image/{{$product->image}}">
                            <span class="label">@lang('language.sale')</span>
                             <input type="hidden" name="qty" value="1">
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"> </i> @lang('language.detail')</a></li>

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
            <!-- end col -->
            @endif
            @endforeach
        </div>
        <div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="10" data-width=""></div>
    </div>
</section>
<!-- blog -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>@lang('language.latest_news') </span>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            @foreach($getNews as $news)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{ $news->post_image }}"></div>
                    <div class="blog__item__text">
                        <span><img src="frontend/img/icon/calendar.png" alt="">{{ $news->created_at }}</span>
                        <h5>{{ $news->title }}</h5>
                        <a href="{{ route('post', $news->slug) }}">@lang('language.load_more') </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end blog -->
@endsection
