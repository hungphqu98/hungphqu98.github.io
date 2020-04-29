@extends('master.admin')
@section('title','Quản lý banner')
@section('main')
<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Link</th>
            <th>Image</th>
            <th>Video</th>
            <th>Status</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($lists as $model)
		<tr>
			<td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->description}}</td>
            <td>{{$model->link}}</td>
            <td><img src="{{url('')}}/public/assets/img/banner/{{$model->image}}" alt="" width="200" height="150"></td>
            <td>{{$model->video}}</td>
            <td>{{$model->status}}</td>
            <td></td>
			<td class="text-right">
				<a href="{{ route('admin.banner.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ route('admin.banner.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop()