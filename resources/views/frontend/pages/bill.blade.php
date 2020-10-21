@extends('frontend.layout.master')
@section('title','eshop')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thông tin đơn hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Bills</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-hover table-inverse">
                <thead>
                    <tr>
                        <th>Tên KH</th>
                        <th>Phone</th>
                        <th>payment</th>
                        <th>total price</th>
                        <th>Trạng thái</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                    <tr>
                        <td>
                            <p>{{ $bill->name }}</p>
                            <p>{{ $bill->email }}</p>
                            <p>{{ $bill->address }}</p>
                        </td>
                        <td>{{ $bill->phone }}</td>
                        <td>{{ $bill->payment }}</td>
                        <td>{{ number_format($bill->total_price) }} VNĐ</td>
                        <td>{{ $bill->status }}</td>
                        <td><a href="{{ route('bills.show', $bill->id) }}" class="btn-info btn"><i class="fas fa-info-circle"></i></a></td>
                        <td>
                            <button class="btn-danger btn"><i class="fa fa-close"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection