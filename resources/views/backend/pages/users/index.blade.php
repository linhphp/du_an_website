@extends('backend.layouts.master')
@section('title')
@lang('language.user')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.user') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.user')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang('language.name') </th>
                                    <th>Email</th>
                                    <th>Jurisdiction</th>
                                    <th>Avatar</th>
                                    <th>Birth date</th>
                                    <th>Gender</th>
                                    <th>Link Facebook</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->jurisdiction == null)
                                        {{ 'User' }}
                                        @else
                                        {{ 'Admin' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->avatar == null)
                                        {{ 'Update...' }}
                                        @else
                                        <img width="50" src="storage/image/{{ $user->avatar }}" alt="avatar">
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->birth_date == null)
                                        {{ 'Update...' }}
                                        @else
                                        {{ $user->birth_date }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->gender == null)
                                        {{ 'Update...' }}
                                        @else
                                        {{ $user->gender }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->link_facebook == null)
                                        {{ 'Update...' }}
                                        @else
                                        {{ $user->link_facebook }}
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('products.edit', $user->id) }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
