@extends('frontend.layout.master')
@section('title','eshop')
@section('content')

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
                <div class="row">
                    <div class="col-8 m-auto">
                        <form action="{{ route('sigin.post') }}" method="post">
                        	@csrf
                            <h6 class="checkout__title text-md-center">Đăng nhập</h6>
                            <p>vui lòng đăng nhập để có thể mua hàng và nhiều tiện ích khác</p>
                            <p>bạn chưa có tài khoản? hãy <a href="{{ route('signUp') }}" class="btn-link text-danger">đăng ký</a> ngay</p>
                            <div class="checkout__input">
                                <p>email<span>*</span></p>
                                <input type="text" name="email" placeholder="nhap email cua ban">
                            </div>
                            <div class="checkout__input">
                                <p>mật khẩu<span>*</span></p>
                                <input type="password" name="password" placeholder="nhap mat khau cua ban">
                            </div>
                              <button type="submit" class="site-btn">Đăng nhập</button>
                          </form>
                    </div>
                    
                </div>
        </div>
    </div>
</section>

@endsection
