@extends('backend/layout.master')
@section('title', 'Categories')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Responsive Table
                </div>
				<form class="cmxform form-horizontal " id="commentForm" method="post" action="{{ route('categories.store') }}" novalidate="novalidate">
                    @csrf
	                <table class="table table-striped b-t b-light">
	                	<tr>
	                		<td>
	                			<div class="form-group ">
									<label for="curl" class="control-label col-lg-3">Name Category</label>
									<div class="col-lg-6">
									    <input class="form-control " id="curl" type="url" name="name">
									</div>
									<button class="btn btn-primary" type="submit">Save</button>
								</div>
	                		</td>
	                	</tr>
					</table>
				</form>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th colspan="2">name</th>
                                <th>status</th>
                                <th>query</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            	<form action="{{ route('categories.update', $category->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
	                                <td><input name="name" class="form-control" type="text" value="{{ $category->name }}"></td>
	                                <td>
	                                    <button class="btn btn-warning"><i class="fa fa-check text-success text-active"></i></button>
	                                </td>
                                </form>
                                <td>
                                    @if($category->status == 1)
                                    <a href="" style="color: darkred; font-size: 30px;" class="fa fa-thumbs-up"></a>
                                    @else
                                    <a href="" style="color: darkblue; font-size: 30px;" class="fa fa-thumbs-down"></a>
                                    @endif
                                </td>
                                <td>
                                	<form action="{{ route('categories.destroy', $category->id ) }}" method="post">
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
                                {{ $categories->links() }}
                            </ul>
                        </div>
                    </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection