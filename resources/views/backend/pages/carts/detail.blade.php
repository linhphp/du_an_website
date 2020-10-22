@extends('backend/layout.master')
@section('title', 'cart details')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cart detail
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>Tên sản phẩm</th>
                            <th>đơn giá</th>
                            <th>Số lượng</th>
                            <th>thành tiền</th>
                            <th>trạng thái</th>
                            <th>cập nhật</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totalPrice = 0;
                            ?>
                            @foreach ($cartDetails as $cartDetail)
                            <tr>
                                <?php $price = $cartDetail->price - (($cartDetail->price * $cartDetail->discount)/100); ?>
                                <td>{{ $cartDetail->name }}</td>
                                <td>{{ number_format($price) }} VNĐ</td>
                                <td>{{ $cartDetail->qty }}</td>
                                <td>{{ number_format($price * $cartDetail->qty) }} VNĐ</td>
                                <td>
                                    @if($cartDetail->destroy == null)
                                    <p class="alert alert-success">success</p>

                                    @else

                                    <p class="alert alert-warning">cancel</p>
                                    @endif
                                </td>
                                <td>{{ $cartDetail->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
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