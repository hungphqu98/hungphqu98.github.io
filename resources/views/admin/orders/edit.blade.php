@extends('master.admin')
@section('title','Chỉnh sửa order')
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
        @foreach($getOrderById as $ed)
<form action="{{ route('admin.orders.update', $ed->id) }}" method="POST" role="form" enctype='multipart/form-data' >
    @csrf
    <div class="form-group">
        <label for="">Mã đơn hàng: </label>{{$ed->id}}  
    </div>
    <div class="form-group">
        <label for="">Email:</label>{{$ed->email}}
    </div>
    <div class="form-group">
        <label for="">Tổng tiền: </label>{{number_format($ed->total)}}
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" checked="checked">
                Mới đặt
            </label>
            <label>
                <input type="radio" name="status" id="input" value="2">
                Đã giao hàng
            </label>
            <label>
                <input type="radio" name="status" id="input" value="4">
                Đã xác nhận thanh toán
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endforeach	
</div>
@stop()