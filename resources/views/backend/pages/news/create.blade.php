@extends('backend/layout.master')
@section('title', 'News | create')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm tin tức
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
                        <form role="form" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên bài viết</label>
                            <input type="text" name='title' class="form-control" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <input type="text" name='description' class="form-control" placeholder="Enter description">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung bài viết</label>
                            <textarea  class="form-control ckeditor" name="content" placeholder="Nội dung bài viết"></textarea>
                        </div>  
                        <div class="form-group">
                            <label for="">Hình ảnh bài viết</label>
                            <input type="file" name='post_image' class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Thể loại</label>
                            <select name="new_categories_id" id="new_categories_id" class="form-control input-sm m-bot15">
                                {{-- <option>Chọn thể loại</option> --}}
                                @foreach($newCategorys as $key => $newCategory)       
                                    <option value="{{$newCategory}}">{{ $key }}</option>        
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Loại tin</label>
                            <select name="kind_of_news_id" id="kind_of_news_id" class="form-control input-sm m-bot15">
                                {{-- <option>Chọn loại tin</option> --}}
                                @foreach($kindOfNews as $key => $kindOfNew)       
                                    <option value="{{$kindOfNew}}">{{ $key }}</option>        
                                @endforeach      
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-info">Thêm bài viết</button>
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
    BalloonEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $(document).ready(function(){
        
        $('.choose').change(function(){
            var action = $(this).attr('id');
            var new_categories_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action =='new_categories'){
                result = 'kind_of_news';
            }
            $.ajax({
                url:'{{url('/ajax-add')}}',
                method: 'post',
                data:{action:action,new_categories_id:new_categories_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);    
                }
            });
        });  
    });
  </script>                  
