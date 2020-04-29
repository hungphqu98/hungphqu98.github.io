@extends('master.admin')
@section('title','Chỉnh sửa bình luận')
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
        @foreach($getComById as $edc)
<form action="{{ route('admin.comment.update', $edc->id) }}" method="POST" role="form">
    <legend>Chỉnh sửa danh mục</legend>
    @csrf
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="user_email" class="form-control" value="{{$edc->user_email}}" id="" placeholder="Input field">   
    </div>
    @if($errors->has('user_email'))
    <div class="alert alert-danger">{{ $errors->first('user_email') }}</div>
        @endif
        <div class="form-group">
            <label for="">Product ID</label>
            <input type="text" name="product_id" class="form-control" value="{{$edc->product_id}}" id="" placeholder="Input field">   
        </div>
        @if($errors->has('product_id'))
        <div class="alert alert-danger">{{ $errors->first('product_id') }}</div>
            @endif
    <div class="form-group">
        <label for="">Rating</label>
        <input type="text" name="rating" class="form-control" value="{{$edc->rating}}" id="" placeholder="Input field">  
    </div>
    @if($errors->has('rating'))
    <div class="alert alert-danger">{{ $errors->first('rating') }}</div>
        @endif
        <div class="form-group">
        <label for="">Content</label>
        <input type="text" name="content" class="form-control" value="{{$edc->content}}" id="" placeholder="Input field">  
    </div>
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