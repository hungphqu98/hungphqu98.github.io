@extends('master.admin')
@section('title','Chỉnh sửa danh mục')
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
        @foreach($getCatById as $edc)
<form action="{{ route('admin.category.update', $edc->id) }}" method="POST" role="form">
    <legend>Chỉnh sửa danh mục</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" class="form-control" value="{{$edc->name}}" id="" placeholder="Input field">   
    </div>
    @if($errors->has('name'))
    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
        @endif
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$edc->slug}}" id="" placeholder="Input field">  
    </div>
    @if($errors->has('slug'))
    <div class="alert alert-danger">{{ $errors->first('slug') }}</div>
        @endif
    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" checked="checked">
                Hiện
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" checked="checked">
                Ẩn
            </label>
        </div>
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endforeach
@stop()