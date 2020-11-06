@extends('backend/layout.master')
@section('title', 'Bill detail')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bills Detail
                </div>
                <div class="table-responsive">
                    <div class="col-12">
                        <p>Tên khách hàng: <span class="alert-danger">{{ $customer['name'] }}</span></p>
                        <p>email: <span class="alert-danger">{{ $customer['email'] }}</span></p>
                        <p>số điện thoại: <span class="alert-danger">{{ $customer['phone'] }}</span></p>
                        <p>Địa chỉ: <span class="alert-danger">{{ $customer['address'] }}</span></p>
                    </div>
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>Tên sản phẩm</th>
                            <th>đơn giá</th>
                            <th>số lượng</th>
                            <th>thành tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($billDetails as $billDetail)
                            <tr>
                                <td>{{ $billDetail->name }}</td>
                                <td>{{ number_format($billDetail->price) }} VNĐ</td>
                                <td>{{ $billDetail->qty }}</td>
                                <td>{{ number_format($billDetail->qty * $billDetail->price) }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="alert-success">
                            <tr>
                                <th>Tổng</th>
                                <td></td>
                                <td></td>
                                <th >{{number_format($billDetail->total_price)}} VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                        </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection