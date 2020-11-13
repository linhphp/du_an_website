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
                                    <th>@lang('language.name') @lang('language.product') </th>
                                    <th>Price </th>
                                    <th>Quantity</th>
                                    <th>Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartDetails as $cart)
                                    <td>
                                        <p>{{ $cart->name }}</p>
                                    </td>
                                    <td>{{ number_format($cart->price - ($cart->price * $cart->discount)/100) }} VNĐ</td>
                                    <td>{{ $cart->qty }}</td>
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
