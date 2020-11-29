@extends('backend.layouts.master')
@section('title')
@lang('language.bills')
@endsection
@section('content')
<script type="text/javascript">
    function updateBill (status, id)
    {
        $.get(
            '{{ asset("bills-admin/update") }}',
            {status:status, id:id},
            function(){
                location.reload();
            }
        );
    }
</script>
<ul class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">@lang('language.home') </a></li>                    
    <li class="active">@lang('language.bills') </li>
</ul>
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>@lang('language.bill')</h3>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>@lang("language.customer") </th>
                                    <th>@lang('language.note') </th>
                                    <th>@lang('language.payment_methods') </th>
                                    <th>@lang('language.state') </th>
                                    <th>@lang('language.price') </th>
                                    <th>@lang('language.date') </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <td>
                                        <p>{{ $bill->name }}</p>
                                        <p>{{ $bill->email }}</p>
                                        <p>{{ $bill->phone }}</p>
                                        <p>{{ $bill->address }}</p>
                                    </td>
                                    <td>{{ $bill->note }}</td>
                                    <td>{{ $bill->payment }}</td>
                                    <td>
                                        <select name="status" class="form-control" id="" onchange="updateBill(this.value, '{{ $bill->id }}')">
                                            @foreach ($status as $name => $id)
                                            @if ($id == $bill->status_id)
                                            <option value="{{ $id }}" selected class="form-control">@lang("language.$name") </option>
                                            @else
                                            <option value="{{ $id }}" class="form-control" >@lang("language.$name") </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{{ number_format($bill->total_price) }} VNĐ</td>
                                    <td>{{ $bill->created_at }}</td>
                                    <td><a href="{{ route('billAdmin.detail', $bill->id) }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-eye"></span></a></td>
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
