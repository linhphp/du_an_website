@extends('backend.layouts.master')
@section('title')
@lang('language.type_of_news')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.type_of_news') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>create @lang('language.type_of_news')</h3>
                    <form action="{{ route('kind-of-news.store') }}" method="post" class="form-inline" role="form">
                        @csrf
                            <div class="input-group" style="width: 100%">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.name')</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input class="form-control" name="name" type="text" placeholder="name @lang('language.type_of_news')" class="form-control">
                                </div>                     
                            </div>
                            <div style="margin-top: 10px;"></div>
                            <div class="input-group" style="width: 100%">
                                <label class="col-md-3 col-xs-12 control-label">@lang('language.news_categories')</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <select name="news_category_id" id="" class="form-control"> 
                                    @foreach ($newsCategories as $name => $id)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                </div>                     
                            </div>
                        <button type="submit" class="btn btn-danger">Create</button>
                    </form>                   
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.type_of_news')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th>@lang('language.news_categories') </th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kindOfNews as $typeNews)
                                <tr>
                                    <form action="{{ route('kind-of-news.update', $typeNews->id) }}" method="post" class="form-inline" role="form">
                                        @method('PATCH')
                                        @csrf
                                        <td>
                                            <input class="form-control" name="name" type="text" value="{{ $typeNews->name }}">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button>
                                        </td>
                                    </form>
                                        <td>
                                            {{ $typeNews->cate_name }}
                                        </td>
                                    
                                    <td>
                                        <form action="{{ route('kind-of-news.destroy', $typeNews->id) }}" method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->

        </div>
    </div>                                
    
</div>
@endsection
