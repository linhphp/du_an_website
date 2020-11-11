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
            <h2 class="text-success">@lang('language.customer_information') </h2>
            <div class="col">
                <p class="text-info font-weight-bold">@lang('language.customer'): <span class="text-dark">
                    {{ $name }}
                </span></p>
                <p class="text-info font-weight-bold">Email: <span class="text-dark">
                    {{ $email }}
                </span></p>
                <p class="text-info font-weight-bold">@lang('language.telephone_number'): <span class="text-dark">
                    {{ $phone }}
                </span></p>
                <p class="text-info font-weight-bold">@lang('language.note'): <span class="text-dark">
                    {{ $note }}
                </span></p>
                <p class="text-info font-weight-bold">@lang('language.payment_methods'):

                    @if ($payment  == 'COD')
                    <span class="text-dark">
                        @lang('language.payment_in_cash')
                    </span>
                    @elseif ($payment  == 'ATM')
                    <span class="text-dark">
                        @lang('language.Transfer')
                    </span>

                    @endif
                </p>
                <p class="text-info font-weight-bold">@lang('language.address'): <span class="text-dark">
                    {{ $address }}
                </span></p>
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="text-success">@lang('language.purchase_invoice') </h2>
                <table border="1" class="table table-inverse">
                    <thead>
                        <tr>
                            <th>@lang('language.name_product') </th>
                            <th>@lang('language.price') </th>
                            <th>@lang('language.quantity') </th>
                            <th>@lang('language.into_money') </th>
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
                            <td>@lang('language.total_price') </td>
                            <td colspan="3" style="text-align: right; font-weight: bold; color: darkred; ">{{ number_format($total_price) }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>