@extends('backend.layouts.master')
@section('title')
@lang('language.cart')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.cart') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.cart')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang('language.name') </th>
                                    <th>Email </th>
                                    <th>Status </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <td>
                                        <p>{{ $cart->name }}</p>
                                    </td>
                                    <td>{{ $cart->email }}</td>
                                    <td>
                                        @if($cart->status == 1)
                                        {{ 'pending' }}
                                        @elseif($cart->status == 2)
                                        {{ 'processing' }}
                                        @elseif($cart->status == 3)
                                        {{ 'cancel' }}
                                        @elseif($cart->status == 4)
                                        {{ 'deluvery' }}
                                        @endif
                                    </td>
                                    <td><a href="{{ route('adminCart.detail', $cart->id) }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-eye"></span></a></td>
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
