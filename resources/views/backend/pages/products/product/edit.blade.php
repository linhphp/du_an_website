@extends('backend.layouts.master')
@section('title')
    @lang('language.product')
@endsection
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>
        <li class="active">@lang('language.product') </li>
    </ul>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('products.update', $product->id) }}" class="form-horizontal" method="post" enctype='multipart/form-data'>
                    @method('PATCH')
                	@csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Edit @lang('language.product') </strong></h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.name')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input name="name" value="{{ $product->name }}" type="text" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.category')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    	<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <select name="category_id" id="" class="form-control control-label">
                                        	@foreach ($categories as $name => $id)
                                            @if($id == $product->category_id)
                                        	<option selected class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                            @else
                                            <option class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                            @endif
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.brand')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    	<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <select name="brand_id" id="" class="form-control control-label">
                                        	@foreach ($brands as $name => $id)
                                            @if($id == $product->brand_id)
                                        	<option selected class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                            @else
                                            <option class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                            @endif
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Image 1</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="image1" id="filename"
                                        title="Browse file" />
                                    <span class="help-block">Input type file</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Image 2</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="image2" id="filename"
                                        title="Browse file" />
                                    <span class="help-block">Input type file</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.price')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input value="{{ $product->price }}" type="number" min="0" name="price" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.discount')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input value="{{ $product->discount }}" type="number" min="0" name="discount" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.accessories')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input value="{{ $product->accessories }}" type="text" name="accessories" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.quantity')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input value="{{ $product->quantity }}" type="number" name="quantity" min="1" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.desc')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <textarea id="editor" name="desc">{!! $product->desc !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>
                                <button type="submit" class="btn btn-primary pull-right">update</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>

    </div>

@endsection
