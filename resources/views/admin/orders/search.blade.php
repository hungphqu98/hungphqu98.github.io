@extends('master.admin')
@section('title','Quản lý đơn hàng')
@section('main')

<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Address</th>
			<th>Method</th>
            <th>Status</th>
            <th>Created At</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($searchOrd as $model)
		<tr>
			<td>{{$model->id}}</td>
			<td>{{$model->email}}</td>
			<td>{{$model->address}}</td>
						@if($model->payment_method == 1)
							<td>COD</td>
							@elseif($model->payment_method == 2)
							<td>Momo</td>
						@endif
						@if($model->status == 1)
					<td>Mới đặt</td>
					@elseif($model->status == 2)
					<td>Đã giao</td>
					@elseif($model->status == 4)
					<td>Đã thanh toán</td>
					@endif
            <td>{{$model->created_at}}</td>
			<td class="text-right">
				<a href="{{ route('admin.orders.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ route('admin.orders.view',['id'=> $model->id]) }}" class="btn btn-sm btn-danger"">
					<i class="fa fa-eye"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{$searchOrd->links()}}
@stop()