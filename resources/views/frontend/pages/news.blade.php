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
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr class="danger">
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Post Image</th> 
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>        
                        @foreach($news as $new)
                        <tr>
                            <td><a href="{{ route('post', $new->slug) }}">{{ $new->title }}</a></td>
                            <td><a href="{{ route('post', $new->slug) }}">{{ $new->slug }}</a></td>
                            <td><a href="{{ route('post', $new->slug) }}">{{ $new->description }}</a></td>
                            <td><a href="{{ route('post', $new->slug) }}">{!! $new->content !!}</a></td>
                            <td><img width="80" src="storage/image/{{ $new->post_image }}" alt=""></td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
        </div>
    </div>
</section>
@endsection