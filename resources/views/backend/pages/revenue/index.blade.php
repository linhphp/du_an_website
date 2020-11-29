@extends('backend.layouts.master')
@section('title')
@lang('language.revenue')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('language.revenue')</h3>
                {{-- <div class="btn-group pull-right">
                    <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    	<i class="fa fa-bars"></i> Export Data
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                        	<a href="{{ route('revenue') }}" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='backend/img/icons/word.png' width="24"/> Word</a>
                        </li>
                        <li>
                        	<a href="{{ route('revenue') }}" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='backend/img/icons/ppt.png' width="24"/> PowerPoint</a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </div>  --}}                            
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                            	<th>STT</th>
                            	<th>@lang('language.product') </th>
                            	<th>@lang('language.import_price') </th>
                            	<th>@lang('language.export_price') </th>
                            	<th>@lang('language.total_quantity')</th>
                            	<th>@lang('language.sold_quantity')</th>
                            	<th>@lang('language.the_remaining_quantity') </th>
                            	<th>@lang('language.state') </th>
                            	<th>@lang('language.actual_revenue') </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php
                        	    $i = 0;
                        	    $sctual = 0;
                        	@endphp
                        	@foreach($revenues as $revenue)
                        	@php
                        	    $i++;
                        	    $sctual+= $revenue->actual_revenue;
                        	@endphp
                        	<tr>
                                <td>{{ $i }}</td>
                                <td>{{ $revenue->name }}</td>
                                <td>{{ number_format($revenue->import_price) }} VND</td>
                                <td>{{ number_format($revenue->export_price) }} VND</td>
                                <td>{{ $revenue->total_quantity }}</td>
                                <td>{{ $revenue->sold_quantity }}</td>
                                <td>{{ $revenue->the_remaining_quantity }}</td>
                                <td style="width: 80px;">
                                	@if($revenue->the_remaining_quantity == 0)
                                	<p class="btn btn-danger">@lang('language.out_of_stock') </p>
                                	@else
                                	<p class="btn btn-success">@lang('language.stocking') </p>
                                	@endif
                                </td>
                                <td>{{ number_format($revenue->actual_revenue) }} VND</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                        		<td colspan="8" style="text-align: center; color: darkred; font-weight: bold;">@lang('language.total_price') </td>
                        		<td>{{ number_format($sctual) }} VND</td>
                        	</tr>
                        </tfoot>
                    </table>                                    
                </div>
            </div>
        </div>

    </div>
</div>

@endsection