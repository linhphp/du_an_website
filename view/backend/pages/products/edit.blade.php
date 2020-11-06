@extends('backend/layout.master')
@section('title', 'Products | edit')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name='name' class="form-control" placeholder="Enter name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name='price' class="form-control" placeholder="Enter name" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">phụ kiện</label>
                            <input type="text" name='accessories' class="form-control" placeholder="Enter name" value="{{$product->accessories}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <select name="discount" class="form-control input-sm m-bot15">
                                <option value="0">0%</option>
                                <option value="10">10%</option>
                                <option value="25">25%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name='image' class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">mô tả sản phẩm</label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm">{{ $product->desc }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">danh mục sản phẩm</label>

                            <select name="category_id" class="form-control input-sm m-bot15">
                                @foreach($categories as $key)
                                @if($key->id == $product->category_id)
                                <option selected value="{{ $key->id }}">{{ $key->name }}</option>
                                @endif
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">thương hiệu sản phẩm</label>

                            <select name="brand_id" class="form-control input-sm m-bot15">

                                @foreach($brands as $key)
                                @if($key->id == $product->brand_id)
                                <option selected value="{{ $key->id }}">{{ $key->name }}</option>
                                @endif
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">nội dung sản phẩm</label>
                            <textarea rows='5' name="content" id="editor" rows="5" style="resize: none;" class="form-control"  placeholder="nội dung sản phẩm">{!! $product->content !!}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">lưu lại</button>
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
