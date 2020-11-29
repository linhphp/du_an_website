@extends('backend.layouts.master')
@section('title')
@lang('language.categories')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>
    <li class="active">@lang('language.categories') </li>
</ul>
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.create') @lang('language.category')</h3>
                    <form action="{{ route('categories.store') }}" method="post" class="form-inline" role="form" enctype='multipart/form-data'>
                        @csrf
                            <div class="input-group" style="width: 100%">
                                <input class="form-control" name="name" type="text" placeholder="name @lang('language.category')">
                            </div>

                            <div class="input-group" style="margin-top: 10px; margin-bottom: 10px; width: 100%">
                                <input type="file" class="form-control" name="image" id="filename" title="Browse file" />
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-danger">@lang('language.create')</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.categories')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang('language.name')</th>
                                    <th></th>
                                    <th>@lang('language.image')</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <form action="{{ route('categories.update', $category->id) }}" method="post" class="form-inline" role="form">
                                        @method('PATCH')
                                        @csrf
                                        <td>
                                            <input class="form-control" name="name" type="text" value="{{ $category->name }}">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button>
                                        </td>
                                    </form>
                                    <td>
                                        <img src="storage/image/{{ $category->image }}" width="50" alt="">
                                    </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
        </div>
    </div>
</div>
@endsection

