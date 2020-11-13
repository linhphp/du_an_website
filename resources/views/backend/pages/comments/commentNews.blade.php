@extends('backend.layouts.master')
@section('title')
@lang('language.comment')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.comment') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.comment')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>User name </th>
                                    <th>Content</th>
                                    <th>Post</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <td>{{ $comment->user_name }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->title }}</td>
                                    <td>
                                        <a href="" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
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
