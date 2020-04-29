@extends('master.admin')
@section('title','Thêm banner')
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
        @foreach($getBannerById as $edb)
<form action="{{ route('admin.banner.update', $edb->id) }}" method="POST" role="form" enctype='multipart/form-data'>
    <legend>Chỉnh sửa banner</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên banner</label>
        <input type="text" name="name" class="form-control" value="{{$edb->name}}" id="" placeholder="Input field">   
    </div>
    @if($errors->has('name'))
    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
        @endif
    <div class="form-group">
        <label for="">Tiêu đề</label>
        <input type="text" name="description" class="form-control" value="{{$edb->description}}" id="" placeholder="Input field">   
    </div>
    @if($errors->has('description'))
    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
        @endif
    <div class="form-group">
        <label for="">Đường dẫn</label>
        <input type="text" name="link" class="form-control" value="{{$edb->link}}" id="" placeholder="Input field">  
    </div>
    @if($errors->has('link'))
    <div class="alert alert-danger">{{ $errors->first('link') }}</div>
        @endif
    <div class="form-group">
				<label for="">Ảnh banner</label>
				<input type="file" class="form-control" value="{{$edb->image}}" name="image" placeholder="Input field">
	</div>
		@if($errors->has('image'))
    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
    @endif
    <div class="form-group">
        <label for="">Video</label>
        <input type="text" name="video" class="form-control" value="{{$edb->video}}" id="" placeholder="Input field">  
    </div>
    @if($errors->has('video'))
    <div class="alert alert-danger">{{ $errors->first('video') }}</div>
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
</div>
@stop()