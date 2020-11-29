@extends('backend.layouts.master')
@section('title')
@lang('language.home')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="#">@lang('language.home')</a></li>                    
    <li class="active">@lang('language.dashboard') </li>
</ul>
<div class="page-content-wrap">
    
    <!-- START WIDGETS -->                    
    <div class="row">
        <div class="col-md-3">
            
            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <a href="{{ route('products.index') }}" class="title">                                
                            <div class="widget-title">@lang('language.product')</div>
                            <div class="widget-int">{{ count($products) }}</div>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('brands.index') }}" class="title">                              
                            <div class="widget-title">@lang('language.brand') </div>
                            <div class="widget-int">{{ count($brands) }}</div>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('categories.index') }}" class="title">                          
                            <div class="widget-title">@lang('language.categories') </div>
                            <div class="widget-int">{{ count($categories) }}</div>
                        </a>
                    </div>
                </div>                            
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                             
            </div>         
            <!-- END WIDGET SLIDER -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>                             
                <div class="widget-data">
                    <a href="{{ route('news.index') }}" class="title">
                        <div class="widget-int num-count">{{ count($news) }}</div>
                        <div class="widget-title">@lang('language.news') </div>
                        <div class="widget-subtitle">In your mailbox</div>
                    </a>
                </div>      
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>                            
            <!-- END WIDGET MESSAGES -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" >
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <a href="{{ route('users.index') }}" class="title">
                        <div class="widget-int num-count">{{ count($users) }}</div>
                        <div class="widget-title">@lang('language.user') </div>
                    </a>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>                            
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a><span class="fa fa-calendar"></span></a>
                    </div>
                </div>                            
            </div>                        
        </div>
    </div>
</div>
@endsection
