@extends('frontend.layout.master')
@section('title')
@lang('language.product') | {{ $product->name }}
@endsection
@section('eshop', 'active')
@section('content')

<section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ route('home') }}">@lang('language.home') </a>
                            <a href="{{ route('eshop') }}">@lang('language.shopping') </a>
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
                                    <span> - 5 @lang('language.reviews') </span>
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
                                           <input type="text" min="1" name="qty" value="1">
                                        </div>
                                    </div>
                                    <button class="primary-btn">@lang('language.add_to_cart') </button>
                                </div>
                                <div class="product__details__btns__option">
                                    <a href="#"><i class="fa fa-heart"></i>@lang('language.add_to_wishlist') </a>
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
                                    role="tab">@lang('language.desc') </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">@lang('language.comments') </a>
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
                                    <div class="container">
                                        <div class="row mt-3">
                                            <div class="col">
                                                @if(Auth::check())
                                                <div class="checkout__input">
                                                    <p>@lang('language.leave_your_comment')</p>
                                                    <form action="{{ route('comment.post', $product->id) }}" method="post">
                                                        @csrf
                                                        <input type="text" name="content">
                                                        <button type="submit" class="primary-btn">@lang('language.send') </button>
                                                    </form>
                                                </div>
                                                @else
                                                <p>@lang('language.please') <a href="{{ route('signIn') }}" class="alert-link text-danger"> @lang('language.sign_in')</a> @lang('language.to_comment') </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__details__tab__content">
                                        @foreach ($comments as $comment)
                                        @if($comment->parent_id == 0)
                                        <div class="col-12">
                                            <div class="card-header">{{ $comment->name }}</div>
                                            <div class="card-body">
                                            <p class="card-text">{{ $comment->content }}</p>
                                            </div>
                                            @foreach($comments as $childen)
                                            @if($childen->parent_id == $comment->id)
                                            <div class="ml-3">
                                                <div class="card-header bg-light text-danger ">{{ $childen->name }}</div>
                                                <div class="card-body">
                                                    <p class="card-text text-info">{{ $childen->content }}</p>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            <div class="col">
                                                @if(Auth::check())
                                                <div class="checkout__input">
                                                    <form action="{{ route('childen.post', $comment->id) }}" method="post">
                                                        @csrf
                                                        <input type="text" name="content">
                                                        <button type="submit" class="primary-btn">
                                                            @lang('language.reply_to_comments')
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        {{ $comments->links() }}
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
                    <h3 class="related-title">@lang('language.related_products') </h3>
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
                            <span class="label">@lang('language.new') </span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $byBrand['id']) }}"><i class="fa fa-info"></i> @lang('language.detail') </a></li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $byBrand['name'] }}</h6>
                            <button class="add-cart">@lang('language.add_to_cart') </button>
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
                    <form action="{{ route('cart.add', $product['id']) }}" method="post">
                        @csrf
                        <input type="hidden" name="qty" value="1">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="storage/image/{{ $byBrand['image'] }}">
                                <span class="label">@lang('language.sale') </span>
                                <ul class="product__hover">
                                    <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                    <li><a class="detail" href="{{ route('product.detail', $byBrand['id']) }}"><i class="fa fa-info"></i> @lang('language.detail') </a></li>
                                    
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $byBrand['name'] }}</h6>
                                <button class="add-cart">@lang('language.add_to_cart') </button>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5 style="text-decoration: line-through; color: darkred;">{{number_format($product['price'])}} VND</h5>
                                <h5>{{number_format($product['price'] - (($product['price'] * $product['discount'])/100))}} VND</h5>
                               
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