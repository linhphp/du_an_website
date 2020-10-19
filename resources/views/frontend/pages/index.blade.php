@extends('frontend.layout.master')
@section('title','trang chu')
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
                    <li class="active" data-filter="*">Tất cả sản phẩm</li>
                    <li data-filter=".new-arrivals">Sản phẩm mới</li>
                    <li data-filter=".hot-sales">giảm giá</li>
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
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"></i> chi tiết</a></li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->name}}</h6>
                            <button class="add-cart">thêm vào giỏ hàng</button>
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
                            <span class="label">Sale</span>
                             <input type="hidden" name="qty" value="1">
                            <ul class="product__hover">
                                <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                                <li><a class="detail" href="{{ route('product.detail', $product->id) }}"><i class="fa fa-info"></i> chi tiết</a></li>
                                
                            </ul>
                        </div>
                        <div class="product__item__text">
                        <h6>{{$product->name}}</h6>
                        <button class="add-cart">thêm vào giỏ hàng</button>
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
    </div>
</section>
<!-- blog -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Tin mới nhất</span>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="upload/"></div>
                    <div class="blog__item__text">
                        <span><img src="frontend/img/icon/calendar.png" alt=""></span>
                        <h5></h5>
                        <a href="">Xem Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end blog -->
@endsection
