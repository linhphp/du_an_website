@extends('backend/layout.master')
@section('title', 'News')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List news
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Post Image</th> 
                            <th>Kind Of News</th>
                            <th>News Categories</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <td><a href="">{{ $new->title }}</a></td>
                                <td><a href="">{{ $new->slug }}</a></td>
                                <td><a href="">{{ $new->description }}</a></td>
                                <td><a href="">{!! $new->content !!}</a></td>
                                <td><img width="80" src="storage/image/{{ $new->post_image }}" alt=""></td>
                                <td><a href="">{{ $new->kind_name }}</a></td>
                                <td><a href="">{{ $new->cate_name }}</a></td>
                                <td><a href="{{ route('news.edit', $new->id) }}" class="btn">
                                    <i class="fa fa-check text-success text-active"></i>
                                </a></td>
                                <form action="{{ route('news.destroy', $new->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <td>
                                        <button class="btn" type="submit">
                                            <i class="fa fa-times text-danger text"></i>
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        {{ $news->links() }}
                      </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection