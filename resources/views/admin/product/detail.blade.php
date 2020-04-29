@extends('master.admin')
@section('title','Quản lý sản phẩm')
@section('main')

		<h2>Chi tiết sản phẩm</h2> 
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên</th>
					<th>Ảnh chính</th>
					<th>Ảnh phụ</th>
					<th>Slug</th>
					<th>Giá</th>
					<th>Giá giảm</th>
					<th>Điểm</th>
					<th>Mô tả ngắn</th>
					<th>Chi tiết</th>
					<th>Status</th>
					<th>Thời điểm cập nhật</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($getProductById as $model)
				<tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
					<td>
						<img src="{{url('public/assets/img/product')}}/{{$model->image}}" alt="" width="60">
					</td>
					<td>
						<img src="{{url('public/assets/img/product')}}/{{$model->image_2}}" alt="" width="60">
						<img src="{{url('public/assets/img/product')}}/{{$model->image_3}}" alt="" width="60">
						<img src="{{url('public/assets/img/product')}}/{{$model->image_4}}" alt="" width="60">
					</td>	
					<td>{{$model->slug}}</td>
					<td>{{$model->price}}</td>
					<td>{{$model->sale_price}}</td>
					<td>{{$model->product_rating}}</td>
					<td>{{$model->shortdes}}</td>
					<td>{{$model->description}}</td>
					<td>{{$model->status}}</td>
					<td>{{$model->updated_at}}</td>
					<td>
						<a href="{{ route('admin.product.edit',['id'=> $model->id]) }}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
						<a href="{{ route('admin.product.delete',['id'=> $model->id]) }}" class="btn btn-sm btn-danger" title="Edit">Delete</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	
@stop()