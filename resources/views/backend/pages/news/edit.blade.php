@extends('backend/layout.master')
@section('title', 'News | Edit')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa tin tức
                </header>
                <?php
                    $message = Session::get('thongbao');
                    if ($message) {
                        echo '<span class="text-alert bg-primary">' . $message . '</span>';
                        session::put('thongbao', null);
                    }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên bài viết</label>
                            <input type="text" name='title' class="form-control" placeholder="Enter title" value="{{$news->title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <input type="text" name='description' class="form-control" placeholder="Enter description"value="{{$news->description}}">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung bài viết</label>
                            <textarea  class="form-control ckeditor" name="content" placeholder="Nội dung bài viết">{{$news->content}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label for="">Hình ảnh bài viết</label>
                            <input type="file" name='post_image' class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Thể loại</label>
                            <select name="new_categories_id" class="form-control input-sm m-bot15">
                                @foreach($newCategorys as $key)
                                @if($key->id == $news->new_categories_id)
                                <option selected value="{{ $key->id }}">{{ $key->name }}</option>
                                @endif
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Loại tin</label>
                            <select name="kind_of_news_id" class="form-control input-sm m-bot15">
                                @foreach($kindOfNews as $key)
                                @if($key->id == $news->kind_of_news_id)
                                <option selected value="{{ $key->id }}">{{ $key->name }}</option>
                                @endif
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-info">Lưu bài viết</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
</section>
</section>
@endsection

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
