@extends('master.admin')
@section('title','Quản lý admin')
@section('main')
<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Password</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($lists as $model)
		<tr>
			<td>{{$model->id}}</td>
			<td>{{$model->email}}</td>
			<td>{{$model->password}}</td>
			<td class="text-right">
				<a href="{{ route('admin.account.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop()