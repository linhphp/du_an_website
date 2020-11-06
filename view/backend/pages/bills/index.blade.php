@extends('backend/layout.master')
@section('title', 'Bills list')
@section('content')
<script type="text/javascript">
    function updateCart (status, id)
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
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bills List
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>Tên KH</th>
                            <th>phone</th>
                            <th>payment</th>
                            <th>Total price</th>
                            <th >Trạng thái</th>
                            <th style="width: 120px;">Ngày tạo</th>
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
                                <td style="width: 150px;">
                                    <select class="form-control" name="status" id="" onchange="updateCart(this.value, '{{ $bill->id }}')">
                                        @foreach($status as $key => $value)
                                        @if($bill->status_id == $value)
                                        <option selected value="{{ $value }}">{{ $key }}</option>

                                        @else
                                        <option value="{{ $value }}">{{ $key }}</option>

                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>{{ $bill->created_at }}</td>
                                <td><a href="{{ route('billAdmin.detail', $bill->id) }}" class="btn btn-info"><i class="fa fa-info"></i></a></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $bills->links() }}  
                        </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection