@extends('frontend.layout.master')
@section('title')
Post |
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
         @foreach( $posts as $post )
            <div class="div">
                <h2>{{ $post->title}}</h2> 
            </div>
            <div class="mt-3">
                <h4>{{ $post->description}}</h4>
            </div>
            <section class="panel mt-3 text-center">         
                <div class="col-md-6 mx-auto">                 
                    <div class=" mt-3 ">
                        <img src="/storage/image/{{ $post->post_image}}"height="400" width="450">
                    </div>   
                </div>  
                <div class="col-md-6 mx-auto">
                    <div class="div mt-3">
                        <h1>{!! $post->content !!}</h1>
                    </div>  
                </div>
             </section>
             @endforeach
        </div>                 
    </div>    
</div>   
@endsection