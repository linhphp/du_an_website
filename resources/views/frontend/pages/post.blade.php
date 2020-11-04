@extends('frontend.layout.master')
@section('title')
Post |
@endsection
@section('content')

<section class="blog-hero spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 text-center">
                <div class="blog__hero__text">
                    <h2>{{ $getPost->title }}</h2>
                    <ul>
                        <li>By Deercreative</li>
                        <li>{{ $getPost->created_at }}</li>
                        <li>8 Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="storage/image/{{ $getPost->post_image }}" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__share">
                        <span>share</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="blog__details__text">
                        {!! $getPost->content !!}
                    </div>
                    
                    <div class="blog__details__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="frontend/img/blog/details/blog-author.jpg" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h5>Aiden Blair</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__details__tags">
                                    <a href="#">#Fashion</a>
                                    <a href="#">#Trending</a>
                                    <a href="#">#2020</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog__details__btns">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a href="" class="blog__details__btns__item">
                                    <p><span class="arrow_left"></span> Previous Pod</p>
                                    <h5>It S Classified How To Utilize Free Classified Ad Sites</h5>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a href="" class="blog__details__btns__item blog__details__btns__item--next">
                                    <p>Next Pod <span class="arrow_right"></span></p>
                                    <h5>Tips For Choosing The Perfect Gloss For Your Lips</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection