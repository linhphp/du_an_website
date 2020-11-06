@extends('frontend.layout.master')
@section('title','News')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>News</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <span>News</span>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
<section class="shop spad">
<div class="container">
        <div class="row">
            @foreach ($getNews as $news)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{ $news->post_image }}"></div>
                    <div class="blog__item__text">
                        <span><img src="frontend/img/icon/calendar.png" alt=""> 16 February 2020</span>
                        <h5>{{ $news->title }}</h5>
                        <a href="{{ route('post', $news->slug) }}">Read More</a>
                    </div>
                </div>
            </div>       
            @endforeach 
        </div>
    </div>
</section>
@endsection
