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
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.news')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Title </th>
                                    <th>@lang('language.news_categories') </th>
                                    <th>@lang('language.type_of_news') </th>
                                    <th>Image</th>
                                    <th>@lang('language.desc') </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getNews as $news)
                                    <td>{{ $news->title }}</td>
                                    <td>{{ $news->kind_name }}</td>
                                    <td>{{ $news->cate_name }}</td>
                                    <td>
                                        <img width="50" src="storage/image/{{ $news->post_image }}" alt="{{ $news->post_image }}">
                                    </td>
                                    <td>{{ $news->description }}</td>
                                    <td>
                                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('news.destroy', $news->id) }}" method="post">
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
