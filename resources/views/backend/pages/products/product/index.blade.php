@extends('backend.layouts.master')
@section('title')
@lang('language.product')
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.product') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.brand')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang('language.name') </th>
                                    <th>@lang('language.brand') </th>
                                    <th>@lang('language.category') </th>
                                    <th>@lang('language.image') 1 </th>
                                    <th>@lang('language.image') 2 </th>
                                    <th>@lang('language.price') </th>
                                    <th>@lang('language.quantity')</th>
                                    <th></th>
                                    {{-- <th></th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $qty =0;
                                @endphp
                                @foreach ($products as $product)
                                @php
                                $qty += $product->quantity;
                                @endphp
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand_name }}</td>
                                    <td>{{ $product->cate_name }}</td>
                                    <td>
                                        <img width="50" src="storage/image/{{ $product->image1 }}" alt="">
                                    </td>
                                    <td>
                                        <img width="50" src="storage/image/{{ $product->image2 }}" alt="">
                                    </td>
                                    <td>{{ number_format($product->price) }} VNĐ</td>
                                    <td>{{ $product->quantity }}</td>
                                    {{-- <td>
                                        <a href="" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-eye"></span></a>
                                    </td> --}}
                                    <td><a title="edit" href="{{ route('products.edit', $product->id) }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a></td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button title="delete" class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->

        </div>
    </div>                                
    
</div>
@endsection
