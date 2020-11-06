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
            <div class="fb-like mt-3 mx-2" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
            <div class="fb-share-button mt-3" data-href="http://127.0.0.1:8000/index" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
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
        <div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="10" data-width=""></div>
    </div>
    <div class="row">
        <div class="col text-md-center">
            {!! $getNews->links() !!}

        </div>
    </div>
</div>
</section>
@endsection
