@extends('master.admin')
@section('title','Quản lý khách hàng')
@section('main')
<form action="{{route('admin.users.search')}}" method="get">
	<input type="search" name="key" class="form-control" value="" placeholder="Tìm kiếm..."><button class="btn btn-primary" type="submit">Tìm kiếm</button>
	</form>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Password</th>
			<th>Time created</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($lists as $model)
		<tr>
			<td>{{$model->id}}</td>
			<td>{{$model->email}}</td>
			<td>{{$model->password}}</td>
			<td>{{$model->created_at}}</td>
			<td class="text-right">
				<a href="{{ route('admin.users.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop()