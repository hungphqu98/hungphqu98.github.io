@extends('master.admin')
@section('title','Quản lý đơn hàng')
@section('main')

		<h2>Chi tiết đơn hàng</h2> 
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên</th>
					<th>Địa chỉ</th>
					<th>Thành phố</th>
					<th>SĐT</th>
                    <th>Email</th>
                    <th>Sản phẩm và số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
					<th>Ghi chú</th>
					<th>Status</th>
                    <th>Thời điểm cập nhật</th>
                    <th>Thời điểm tạo</th>
                    
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($getOrder as $item)
				
				
				<tr>
					
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
					<td>{{$item->address}}</td>
					<td>{{$item->city}}</td>	
					<td>{{$item->phone}}</td>
					<td>{{$item->email}}</td>
					
					<td>
						@foreach($getDetail as $det)
						<p>{{$det->name}}({{$det->unit_price}})*{{$det->quantity}}</p>
						@endforeach
					</td>				
					<td>{{number_format($item->total)}} đ</td>
					@foreach($getPayment as $pay)
						@if($pay->payment_method == 1)
							<td>COD</td>
							@elseif($pay->payment_method == 2)
							<td>Momo: {{$pay->code}}</td>
						@endif
					@endforeach
					<td>{{$item->note}}</td>
					@if($item->status == 1)
					<td>Mới đặt</td>
					@elseif($item->status == 2)
					<td>Đã giao</td>
					@elseif($item->status == 4)
					<td>Đã thanh toán</td>
					@endif
					<td>{{$item->updated_at}}</td>
					<td>{{$item->created_at}}</td>
					<td>
						<a href="{{ route('admin.orders.edit',['id'=> $item->id]) }}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
					</td>	
				</tr>
					@endforeach
					
					
			</tbody>
		</table>
	
@stop()