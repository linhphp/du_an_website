@extends('backend/layout.master')
@section('title', 'kind-of-news| create')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm loại tin
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('kind-of-news.store') }}" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên loại tin</label>
                            <input type="text" name='name' class="form-control" placeholder="Enter name">
                        </div>  
                        <div class="form-group">
                            <label for="">Danh mục thể loại</label>

                            <select name="new_categories_id" class="form-control input-sm m-bot15">
                                {{-- <option>Chọn danh mục</option> --}}
                                @foreach($newsCategories as $newsCategory)
                                <option value="{{ $newsCategory->id }}">{{ $newsCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm loại tin</button>
                    </form>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th colspan="2">Name</th>
                                <th>News-categories</th>
                                <th>Status</th>
                                <th>Query</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kindOfNews as $kindOfNew)
                            <tr>
                            	<form action="{{ route('kind-of-news.update', $kindOfNew->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
	                                <td><input name="name" class="form-control" type="text" value="{{ $kindOfNew->name }}"></td>
	                                <td>
	                                    <button class="btn btn-warning"><i class="fa fa-check text-success text-active"></i></button>
	                                </td>
                                </form>    
                                    <td>{{$kindOfNew->cate_name}}</td>  
                                <td>
                                    @if($kindOfNew->status == 1)
                                    <a href="" style="color: darkred; font-size: 30px;" class="fa fa-thumbs-up"></a>
                                    @else
                                    <a href="" style="color: darkblue; font-size: 30px;" class="fa fa-thumbs-down"></a>
                                    @endif
                                </td>
                                <td>
                                	<form action="{{ route('kind-of-news.destroy', $kindOfNew->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                		<button class="btn btn-light"><i class="fa fa-times text-danger text"></i></button>
                                	</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                {{ $kindOfNews->links() }}
                            </ul>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>
</div>
</section>
</section>
@endsection

