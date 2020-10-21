<!DOCTYPE html>
<html lang="en">
<style>
    .text-dark {
        color: darkred;
        font-weight: bold;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <h2 class="text-success">Thông Tin Khách hàng</h2>
            <div class="col">
                <p class="text-info font-weight-bold">Khách hàng: <span class="text-dark">
                    {{ $info['name'] }}
                </span></p>
                <p class="text-info font-weight-bold">Email: <span class="text-dark">
                    {{ $info['email'] }}
                </span></p>
                <p class="text-info font-weight-bold">Số điện thoại: <span class="text-dark">
                    {{ $info['phone'] }}
                </span></p>
                <p class="text-info font-weight-bold">Ghi chú: <span class="text-dark">
                    {{ $info['note'] }}
                </span></p>
                <p class="text-info font-weight-bold">Phương thức thanh toán:

                    @if ($info['payment']  == 'COD')
                    <span class="text-dark">
                        Thanh toán bằng tiền mặt
                    </span>

                    @elseif ($info['payment']  == 'ATM')
                    <span class="text-dark">
                        Chuyển khoản
                    </span>

                    @endif
                </p>
                <p class="text-info font-weight-bold">Địa chỉ: <span class="text-dark">
                    {{ $address }}
                </span></p>
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="text-success">Hoá đơn mua hàng</h2>
                <table border="1" class="table table-inverse">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td>{{ $cart->name }}</td>
                            <td>{{ number_format($cart->price) }} VNĐ</td>
                            <td>{{ $cart->qty }}</td>
                            <td>{{ number_format($cart->price * $cart->qty) }} VNĐ</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Tổng tiền</td>
                            <td colspan="3" style="text-align: right; font-weight: bold; color: darkred; ">{{ number_format($total_price) }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>