@extends('master.admin')
@section('title','Quản lý sản phẩm')
@section('main')

		<h2>Danh sách sản phẩm</h2> 
		<a href="{{route('admin.product')}}" class="btn btn-default btn-sm" title="Quay lại">Quay lại</a>
		<a href="{{route('admin.product.add')}}" class="btn btn-default btn-sm" title="Thêm mới">Thêm mới</a>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Image</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Price</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($searchProduct as $model)
				<tr>
					<td>{{$model->id}}</td>
					<td>
						<img src="{{url('public/assets/img/product')}}/{{$model->image}}" alt="" width="60">
					</td>
					<td>{{$model->name}}</td>
					<td>{{$model->slug}}</td>
					<td>{{$model->price}}</td>
					<td>{{$model->status}}</td>
					<td>
						<a href="{{ route('admin.product.detail',['id'=> $model->id]) }}" class="btn btn-sm btn-success" title="Detail">Detail</a>
						<a href="{{ route('admin.product.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
						<a href="{{ route('admin.product.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')" title="Delete">Delete</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
		{{$searchProduct->appends(['key'=>request()->key])->links()}}
	
@stop()