@extends('backend.layouts.master')
@section('title')
Bill detail
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">Bill detail </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Bill detail</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
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
                                        Total Price
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
