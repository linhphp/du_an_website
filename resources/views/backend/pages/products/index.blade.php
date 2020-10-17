@extends('backend/layout.master')
@section('title', 'Products')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Products
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>name</th>
                            <th>brand</th>
                            <th>caterogy</th>
                            <th>price</th>
                            <th>image</th>
                            <th>Quantity</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->cate_name }}</td>
                                <td>{{ number_format($product->price) }} VNĐ</td>
                                <td><img width="50" src="storage/image/{{ $product->image }}" alt=""></td>
                                <td>{{ $product->quantity }}</td>
                                <td><a href="{{ route('products.edit', $product->id) }}" class="btn">
                                    <i class="fa fa-check text-success text-active"></i>
                                </a></td>
                                <td><button class="btn">
                                    <i class="fa fa-times text-danger text"></i>
                                </button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                          {{ $products->links() }}
                      </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection