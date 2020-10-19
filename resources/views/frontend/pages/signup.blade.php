
@extends('frontend.layout.master')
@section('title','eshop')
@section('content')

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <div class="row">
                <div class="col-12 col-md-8 m-auto">
                    <form action="" method="post">
                        @method('POST')
                        @csrf
                        <h6 class="checkout__title text-md-center">Đăng ký</h6>
                            <p>bạn đã  có tài khoản? hãy <a href="{{ route('signIn') }}" class="btn-link text-danger">đăng nhập</a> ngay</p>                        
                        <div class="checkout__input">
                            <p>tên<span>*</span></p>
                            <input type="text" name="name" placeholder="nhap ten cua ban">
                        </div>
                        <div class="checkout__input">
                            <p>email<span>*</span></p>
                            <input type="text" name="email" placeholder="nhap email cua ban">
                        </div>
                        <div class="checkout__input">
                            <p>mật khẩu<span>*</span></p>
                            <input type="password" name="pass" placeholder="nhap mat khau cua ban">
                        </div>
                        <div class="checkout__input">
                            <p>nhâp lại mật khẩu<span>*</span></p>
                            <input type="password" name="repass" placeholder="nhap lai mat khau cua ban">
                        </div>
                        <button type="submit" class="site-btn">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
