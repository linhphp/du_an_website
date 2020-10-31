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
            @include('frontend.layout.aside')
                <div class="col-lg-9">   
                    <div class="row">
                        @foreach( $news as $new )
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic set-bg" data-setbg="storage/image/{{ $new->post_image }}"height="200" width="200"></div>
                                <div class="blog__item__text">
                                    <h5><a href="{{ route('post', $new->slug) }}">{{ $new->title }}</a></h5>
                                    <a href="{{ route('post', $new->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>       
                        @endforeach 
                    </div>      
                </div>
            </div>
        </div>
    </section>
@endsection

