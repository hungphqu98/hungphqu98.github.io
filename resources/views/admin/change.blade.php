@extends('master.admin')
@section('title','Thay đổi mật khẩu')
@section('main')

<form action="{{ route('admin.account.change') }}" method="POST" role="form">

@csrf
<div class="form-group">
    <label for="">Mật khẩu cũ</label>
    <input type="password" name="current-password" class="form-control" id="" placeholder="Input field">   
</div>
@if($errors->has('current-password'))
<div class="alert alert-danger">{{ $errors->first('current-password') }}</div>
    @endif
<div class="form-group">
    <label for="">Mật khẩu mới</label>
    <input type="password" name="new-password" class="form-control" id="" placeholder="Input field">  
</div>
@if($errors->has('new-password'))
<div class="alert alert-danger">{{ $errors->first('new-password') }}</div>
    @endif
<div class="form-group">
        <label for="">Viết lại mật khẩu mới</label>
        <input type="password" name="new-password_confirmation" class="form-control" id="" placeholder="Input field">  
</div>
@if($errors->has('new-password_confirmation'))
<div class="alert alert-danger">{{ $errors->first('new-password_confirmation') }}</div>
@endif



<button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()