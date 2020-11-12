@extends('frontend.layout.master')
@section('title')
@lang('language.news') | {{ $getPost->title }}
@endsection
@section('content')

<section id="content" role="main">
            <div class="breadcrumb-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('home') }}" title="Home">@lang('language.home') </a></li>
                                <li><a href="{{ route('news','post') }}" title="Blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 padding-right-larger">
                        <article class="article">
                            <div id="post-id-20" class="article-media-container carousel slide" data-ride="carousel" data-interval="6000">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="storage/image/{{ $getPost->post_image }}" class="img-responsive" alt="Slider 1">
                                    </div>
                                </div>
                                <!-- <a class="left carousel-control" href="#post-id-20" role="button" data-slide="prev">Prev</a>
                                <a class="right carousel-control" href="#post-id-20" role="button" data-slide="next">Next</a> -->
                            </div>
                            <div class="article-meta-box">
                                <span class="article-icon article-date-icon"></span>
                                <span class="meta-box-text">{{ $getPost->date }}</span>
                            </div>
                            <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span> <a href="#" class="meta-box-text">15 Com</a></div>
                            <h2>{{ $getPost->title }}</h2>
                            {!! $getPost->content !!}
                            <div class="sm-margin"></div>
                            <div class="article-meta-container clearfix">
                                <ul class="article-meta-list pull-left">
                                    <li>{{ $getPost->kind_name }}</li>
                                    <!-- <li>
                                        <span>Tags:</span>
                                        <a href="#" title="Fashion">Fashion</a>,
                                        <a href="#" title="Photography">Photography</a>,
                                        <a href="#" title="Clothing">Clothing</a>,
                                        <a href="#" title="Color">Color</a>
                                    </li> -->
                                </ul>
                                <ul class="social-links clearfix pull-right">
                                    <li>
                                        <a href="#" class="social-icon icon-facebook" title="Facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-twitter" title="Twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-linkedin" title="Linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-email" title="Email"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-googleplus" title="Google +"></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <div class="sm-margin"></div>
                        @if(count($getNews) > 0)
                        <div class="carousel-container">
                            <h3 class="carousel-title">@lang('language.related_posts') </h3>
                            <div class="row">
                                <div class="owl-carousel related-posts-carousel">
                                    @foreach ($getNews as $news)
                                    <article class="article">
                                        <div class="article-media-container">
                                            <a href="{{ route('post', $news->slug) }}"><img src="storage/{$news->post_image}" alt="post1"></a>
                                        </div>
                                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span> <span class="meta-box-text">{{ $news->date }}</span></div>
                                        <h4><a href="single.html">{{ $news->title }}</a></h4>
                                        <p>{{ $news->description }}</p><a href="single.html" class="readmore" role="button">@lang('language.load_more') </a>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="comments-area">
                            <h3>@lang('language.comments') ({{ count($comments) }})</h3>
                            <ul class="comments">
                                @foreach ($comments as $comment)
                                <li>
                                    <div class="comment">
                                        <div class="comment-content">
                                            <h5><a href="#">{{ $comment->user_name }}</a></h5>
                                            <p>{{ $comment->content }}</p><span class="comment-meta"><span>{{ $comment->created_at }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <h3>Write your review</h3>
                            <form ng-controller="CommentController" name="commentPost" method="post" id="comment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="user_name" ng-model="comment.user_name" type="text" class="form-control input-lg" ng-required="true" placeholder="Enter your nickname *">
                                            <span ng-show="commentPost.user_name.$error.required">Vui lòn nhập tên của bạn</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="message" ng-model="comment.message" ng-required="true" class="form-control min-height input-lg" cols="30" rows="6" placeholder="Write your review *"></textarea>
                                        <span ng-show="commentPost.message.$error.required">vui lòng nhập nội dung bình luận</span>
                                    </div>
                                </div>
                                <div class="xss-margin"></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-custom-5" ng-disabled="commentPost.$invalid" ng-click="save()" value="Post Comment">
                                </div>
                            </form>
                            <script>
                                var post_id = "{{ $getPost->id }}";
                                app.controller('CommentController', function($scope, $http) {
                                    $scope.save = function() {
                                        var data = $.param($scope.comment);
                                        console.log(data);
                                        $http({
                                                method: 'POST',
                                                url: 'index/comment/post/'+post_id,
                                                data: data,
                                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                                            }).success(function(reponsse) {
                                                console.log(reponsse);
                                                location.reload();
                                            })
                                            .error(function(reponsse) {
                                                console.log(reponsse);
                                                alert('loi xay ra'+reponsse);
                                            })
                                        }
                                });
                            </script>    
                        </div>
                    </div>
                    <div class="lg-margin visible-sm visible-xs clearfix"></div>
                    @include('frontend/pages.blog.aside')
                </div>
            </div>
            <div class="md-margin2x"></div>
        </section>

@endsection