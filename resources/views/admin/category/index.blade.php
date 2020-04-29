@extends('master.admin')
@section('title','Quản lý danh mục')
@section('main')
<a href="{{ route('admin.category.add') }}" class="btn btn-default btn-sm" title="Thêm mới">Thêm mới</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Slug</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($lists as $model)
		<tr>
			<td>{{$model->id}}</td>
			<td>{{$model->name}}</td>
			<td>{{$model->slug}}</td>
			<td>{{$model->status}}</td>
			<td class="text-right">
				<a href="{{ route('admin.category.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ route('admin.category.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop()