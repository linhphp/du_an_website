@extends('backend/layout.master')
@section('title', 'carts list')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Carts List
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>name</th>
                            <th>email</th>
                            <th>trạng thái</th>
                            <th>ngày tạo</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->name }}</td>
                                <td>{{ $cart->email }}</td>
                                <td>
                                @if($cart->status == Config::get('status.pending'))
                                <p class="alert alert-primary">pending</p>

                                @elseif($cart->status == Config::get('status.processing'))
                                <p class="alert alert-danger">processing</p>

                                @elseif($cart->status == Config::get('status.cancel'))
                                <p class="alert alert-warning">cancel</p>

                                @elseif($cart->status == Config::get('status.delvery'))
                                <p class="alert alert-success">delvery</p>

                                @endif
                                </td>
                                <td>{{ $cart->created_at }}</td>
                                <td><a href="{{ route('adminCart.detail', $cart->id) }}" class="btn btn-info"><i class="fa fa-info"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $carts->links() }}  
                        </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection