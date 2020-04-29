@extends('master.admin')
@section('title','Quản lý bình luận sản phẩm')
@section('main')
<table class="table table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Product ID</th>
			<th>Rating</th>
            <th>Content</th>
            <th>Status</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($searchComm as $model)
		<tr>
			<td>{{$model->id}}</td>
            <td>{{$model->user_email}}</td>
            <td>{{$model->product_id}}</td>
			<td>{{$model->rating}}</td>
			<td>{{$model->content}}</td>
			<td>{{$model->status}}</td>
			<td class="text-right">
				<a href="{{ route('admin.comment.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary">
					<i class="fa fa-edit"></i>
				</a>
				<a href="{{ route('admin.comment.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
{{$searchComm->links()}}
@stop()