@extends('master.admin')
@section('title','Thêm mới sản phẩm')
@section('main')
<div class="box-body">
        @if(Session::has('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
          </div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('error')}}
          </div>
          @endif
        </div>

<form action="{{ route('admin.product.add') }}" method="POST" role="form" enctype='multipart/form-data' >
    <legend>Form thêm mới sản phẩm</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Input field">   
    </div>
    @if($errors->has('name'))
    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
        @endif
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control" id="slug" placeholder="Input field">  
    </div>
    @if($errors->has('slug'))
    <div class="alert alert-danger">{{ $errors->first('slug') }}</div>
    @endif
    <div class="form-group">
        <label for="">Danh mục</label>
        <div class="radio">
            <label>
                <input type="radio" name="category_id" id="input" value="12" checked="checked">
                Headphones
            </label>
            <label>
                <input type="radio" name="category_id" id="input" value="15" checked="checked">
                Earphones
            </label>
            <label>
                <input type="radio" name="category_id" id="input" value="16" checked="checked">
                Speakers
            </label>
            
        </div>
    </div>
	<div class="form-group">
        <label for="">Giá</label>
        <input type="text" name="price" class="form-control" id="" placeholder="Input field">  
	</div>
    @if($errors->has('price'))
    <div class="alert alert-danger">{{ $errors->first('price') }}</div>
		@endif
	<div class="form-group">
        <label for="">Giá giảm</label>
        <input type="text" name="sale_price" class="form-control" id="" placeholder="Input field">  
    </div>
    @if($errors->has('sale_price'))
    <div class="alert alert-danger">{{ $errors->first('sale_price') }}</div>
        @endif
    <div class="form-group">
            <label for="">Mô tả ngắn</label>
            <input type="text" name="shortdes" class="form-control" id="" placeholder="Input field">  
        </div>
        @if($errors->has('shortdes'))
    <div class="alert alert-danger">{{ $errors->first('shortdes') }}</div>
        @endif
	<div class="form-group">
		<label for="">Mô tả</label>
		<br>
        <textarea rows = "5" cols = "60" id="content" name = "description"></textarea>
		</br>  
    </div>
    @if($errors->has('description'))
    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
		@endif
	<div class="form-group">
				<label for="">Ảnh chính</label>
				<input type="file" class="form-control" name="image" placeholder="Input field">
	</div>
		@if($errors->has('image'))
    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
		@endif
	<div class="form-group">
				<label for="">Ảnh phụ</label>
				<input type="file" class="form-control" name="image_2" placeholder="Input field">
				<input type="file" class="form-control" name="image_3" placeholder="Input field">
				<input type="file" class="form-control" name="image_4" placeholder="Input field">
	</div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" checked="checked">
                Hiện
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" >
                Ẩn
            </label>
            <label>
                <input type="radio" name="status" id="input" value="2">
                New
            </label>
            <label>
                <input type="radio" name="status" id="input" value="3">
                Sale
            </label>
            <label>
                <input type="radio" name="status" id="input" value="4">
                Limited
            </label>
        </div>
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
	
</div>
@stop()