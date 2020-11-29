@extends('frontend.layout.master')
@section('title')
@lang('language.news')
@endsection
@section('content')

<section id="content" role="main">
            <div class="breadcrumb-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                                <li class="active">@lang('language.blog')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 padding-right-lg">
                    	@if(count($getNews) == 0)
                    	<article class="article">
                    		<h2>
                                @lang('no_category') {{ $getCategories->name }}
                            </h2>
                    	</article>
                    	@endif
                        @foreach($getNews as $news)
                        <article class="article">
                            <div class="article-media-container">
                                <a href="{{ route('post', $news->slug) }}"><img src="storage/image/{{ $news->post_image }}" class="img-responsive" alt="Post 2"></a>
                            </div>
                            <div class="article-meta-box">
                                <span class="article-icon article-date-icon"></span>
                                <span class="meta-box-text">{{ $news->date }}</span>
                            </div>
                            <div class="article-meta-box article-meta-comments">
                                <span class="article-icon article-comment-icon"></span>
                                <a href="#" class="meta-box-text">31 Com</a>
                            </div>
                            <h2>
                                <a href="{{ route('post', $news->slug) }}">{{ $news->title }}</a>
                            </h2>
                            <p>{{ $news->description }}</p>
                            <div class="article-meta-container clearfix">
                                <a href="{{ route('post', $news->slug) }}" class="readmore" role="button">@lang('language.load_more') </a>
                                <div class="article-meta-wrapper">
                                    <span class="article-meta">{{ $news->kind_name }}</span>
                                    <span class="article-meta">{{ $news->cate_name }}</span>
                                    <span class="article-meta">{{ $news->views }} @lang('language.views') </span>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <div class="pagination-container clearfix">
                            {{ $getNews->render('vendor.pagination.default') }}
                        </div>
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                    @include('frontend/pages/blog/aside')
                </div>
            </div>
            <div class="lg-margin2x"></div>
        </section>

@endsection
