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
                <h3>@lang('language.customer') </h3>
                <p>@lang('language.name'): <span class="text-danger">{{ $bill->name }}</span></p>
                <p>Email: <span class="text-danger">{{ $bill->email }}</span></p>
                <p>@lang('language.telephone_number'): <span class="text-danger">{{ $bill->phone }}</span></p>
                <p>@lang('language.address'): <span class="text-danger">{{ $bill->address }}</span></p>
                <p>@lang('language.state'):
                     @if($bill->status_id == Config::get('status.pending'))
                        <span class="btn-warning btn">@lang('language.pending') </span>

                        @elseif($bill->status_id == Config::get('status.processing'))
                        <span class="btn-secondary btn">@lang('language.processing') </span>

                        @elseif($bill->status_id == Config::get('status.cancel'))
                        <span class="btn-danger btn">@lang('language.cancel') </span>

                        @elseif($bill->status_id == Config::get('status.delivery'))
                        <span class="btn-dark btn">@lang('language.delivery') </span>
                        @elseif($bill->status_id == Config::get('status.hasTakenTheGoods'))
                        <span class="btn-info btn">@lang('language.has_taken_the_goods') </span>
                        @elseif($bill->status_id == Config::get('status.delivered'))
                        <span class="btn-success btn">@lang('language.delivered') </span>

                        @endif
                </p>
            </div>
            <div class="col-md-12">
                <table class="table cart-table" ng-controller="CartController">
                    <thead>
                        <tr>
                            <th class="table-title">@lang('language.name_product') </th>
                            <th class="table-title">@lang('language.price') </th>
                            <th class="table-title">@lang('language.quantity') </th>
                            <th class="table-title">@lang('language.total_price') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($billDetails as $billDetail)
                        <tr>
                            <td class="product-name-col">
                                <figure>
                                    <a href="{{ route('product.detail', $billDetail->product_id) }}"><img src="storage/image/{{ $billDetail->image1 }}" alt="White linen sheer dress"></a>
                                </figure>
                                <h2 class="product-name"><a href="{{ route('product.detail', $billDetail->product_id) }}">{{ $billDetail->name }}</a></h2>
                            </td>
                            <td>{{ number_format($billDetail->price) }} VND</td>
                            <td>{{ $billDetail->qty }}</td>
                            <td>{{ number_format($billDetail->total_price) }} VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
