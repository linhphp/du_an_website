@extends('backend.layouts.master')
@section('title')
    @lang('language.news')
@endsection
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>
        <li class="active">@lang('language.news') </li>
    </ul>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('news.store') }}" class="form-horizontal" method="post" enctype='multipart/form-data'>
                	@csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Create @lang('language.news') </strong></h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Title</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input name="title" type="text" class="form-control" />
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.news_categories')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    	<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <select name="news_category_id" id="" class="form-control control-label">
                                        	@foreach ($newsCategories as $name => $id)
                                        	<option class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.type_of_news')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                    	<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <select name="kind_of_news_id" id="" class="form-control control-label">
                                        	@foreach ($kindOfNews as $name => $id)
                                        	<option class="form-control" value="{{ $id }}"> {{ $name }}</option>
                                        	@endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Image</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" class="fileinput btn-primary" name="post_image" id="filename"
                                        title="Browse file" />
                                    <span class="help-block">Input type file</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.desc')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <textarea type="text" name="description" class="form-control" /></textarea>
                                    </div>
                                    <span class="help-block">Can not be empty</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.content')</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <textarea id="editor" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>
                                <button type="submit" class="btn btn-primary pull-right">create</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>

    </div>

@endsection
