@extends('frontend.layout.master')
@section('title')
Post |
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel mt-3">
                @foreach( $posts as $post )
                    <div class="col-md-8 mx-auto">
                        <div class="mt-3">
                            <h2>{{ $post->title}}</h2> 
                        </div>               
                        <div class=" mt-3 ">
                            <img src="/storage/image/{{ $post->post_image}}"height="400" width="750">
                        </div>
                        <div class="div mt-5">
                            <h4>{{ $post->description}}</h4>
                            <p>{!! $post->content !!}</p>
                        </div>    
                    </div>
                @endforeach
             </section>
        </div>                 
    </div>    
</div>   
@endsection