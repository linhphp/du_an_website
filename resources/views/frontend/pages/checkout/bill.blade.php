@extends('frontend.layout.master')
@section('title')
@lang('language.bill')
@endsection
@section('content')

<section id="content" role="main">
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}" title="@lang('language.home') ">@lang('language.home') </a></li>
                        <li class="active">@lang('language.bill') </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table cart-table" ng-controller="CartController">
                    <thead>
                        <tr>
                            <th class="table-title">@lang('language.customer') </th>
                            <th class="table-title">@lang('language.note') </th>
                            <th class="table-title">@lang('language.payment_methods') </th>
                            <th class="table-title">@lang('language.state') </th>
                            <th class="table-title">@lang('language.total_price') </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $bill)
                        <tr>
                            <td >
                                <p class="text-dark" style="float: left!important; text-align: left; line-height: 30px">
                                    {{ $bill->name }}<br>
                                    {{ $bill->email }}<br>
                                    {{ $bill->phone }}<br>
                                    {{ $bill->address }}<br>
                                </p>
                            </td>
                            <td>{{ $bill->note }}</td>
                            <td>{{ $bill->payment }}</td>
                            
                            <td>
                                @if($bill->status_id == Config::get('status.pending'))
                                <p class="btn-warning">@lang('language.pending') </p>

                                @elseif($bill->status_id == Config::get('status.processing'))
                                <p class="btn-secondary">@lang('language.processing') </p>

                                @elseif($bill->status_id == Config::get('status.cancel'))
                                <p class="btn-danger">@lang('language.cancel') </p>

                                @elseif($bill->status_id == Config::get('status.delivery'))
                                <p class="btn-dark">@lang('language.delivery') </p>
                                @elseif($bill->status_id == Config::get('status.hasTakenTheGoods'))
                                <p class="btn-info">@lang('language.has_taken_the_goods') </p>
                                @elseif($bill->status_id == Config::get('status.delivered'))
                                <p class="btn-success">@lang('language.delivered') </p>

                                @endif
                            </td>
                            <td>{{ number_format($bill->total_price) }} VND</td>
                            <td><a href="{{ route('bills.show', $bill->id) }}" class="btn btn-danger">@lang('language.detail') </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="md-margin"></div>

            </div>
        </div>
    </div>
    <div class="lg-margin2x"></div>
</section>

@endsection