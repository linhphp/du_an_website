@extends('backend.layouts.master')
@section('title')
@lang('language.bill_detail')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.bill_detail') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.bill_detail')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang('language.name_product') </th>
                                    <th>@lang('language.price') </th>
                                    <th>@lang('language.quantity') </th>
                                    <th>@lang('language.total') </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billDetails as $bill)
                                    <td>
                                        <p>{{ $bill->name }}</p>
                                    </td>
                                    <td>{{ number_format($bill->price) }} VNĐ</td>
                                    <td>{{ $bill->qty }}</td>
                                    <td>{{ number_format($bill->qty * $bill->price) }} VNĐ</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        @lang('language.total_price')
                                    </td>
                                    <td></td><td></td>
                                    <td>{{ number_format($bill->total_price) }} VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->

        </div>
    </div>                                
    
</div>
@endsection
