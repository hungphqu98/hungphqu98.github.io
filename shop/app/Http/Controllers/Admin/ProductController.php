<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Session;

class ProductController extends Controller {

	public function index() {
		$pros = Product::sortable()->paginate(11);
		
		return view('admin.product.index', [
			'lists' => $pros,
		]);
	}
	public function add() {
		return view('admin.product.add');
	}
	public function hot() {
		$pros= Product::join('order_detail','order_detail.product_id','product.id')->select('id','status','name','image','product_id', DB::raw('COUNT(product_id) as count'))
		->groupBy('product_id','name','image','status','id')
		->orderBy('count', 'desc')
		->take(5)->get();
		return view('admin.product.hot',compact('pros'));
	}
	public function search(){
		
		$key  = request()->key;

		$searchProduct = Product::orderBy('id','DESC')->where('name','LIKE','%'.$key.'%')->paginate(8);
			return view('admin.product.search',compact('searchProduct'));
	}
	public function post_add(Request $req){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		// validate dữ liệu
		// dd($req->image_upload);
		$this->validate($req,[
			'name' => 'required',
			'price' => 'required',
			'shortdes' => 'required',
			'description' => 'required',
			'slug' => 'required|unique:product',
			'image' => 'required|unique:product'
		],[
			'name.required' => 'Tên sản phẩm không để trống',
			'slug.required' => 'Tieu đề seo sản phẩm không để trống',
			'price.required' => 'Giá không để trống',
			'shortdes.required' => 'Mô tả ngắn không để trống',
			'description.required' => 'Chi tiết không để trống',
			'image.required' => 'Ảnh không để trống',
			'slug.unique' => 'Tiêu đề seo đã sử dụng',
			'image.unique' => 'Ảnh đã sử dụng'
		]);
		$allRequest  = $req->all();
		$name  = $allRequest['name'];
		$slug = $allRequest['slug'];
		$category_id = $allRequest['category_id'];
		$price = $allRequest['price'];
		$sale_price = $allRequest['sale_price'];
		$shortdes = $allRequest['shortdes'];
		$description = $allRequest['description'];
		$status = $allRequest['status'];
		// upload ảnh
		$getimage = '';
		if($req->hasFile('image')){
		//Hàm kiểm tra dữ liệu
		$this->validate($req, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'image' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
			]
		);
		
		//Lưu hình ảnh vào thư mục
		$image = $req->file('image');
		$getimage = $image->getClientOriginalName();
		$destinationPath = public_path('assets/img/product');
		$image->move($destinationPath, $getimage);
	}
		// upload ảnh
		$getimage2 = '';
		if($req->hasFile('image_2')){
		//Hàm kiểm tra dữ liệu
		$this->validate($req, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'image_2' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'image_2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
			]
		);
		
		//Lưu hình ảnh vào thư mục
		$image2 = $req->file('image_2');
		$getimage2 = $image2->getClientOriginalName();
		$destinationPath = public_path('assets/img/product');
		$image2->move($destinationPath, $getimage2);
	}
	// upload ảnh
	$getimage3 = '';
	if($req->hasFile('image_3')){
	//Hàm kiểm tra dữ liệu
	$this->validate($req, 
		[
			//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
			'image_3' => 'mimes:jpg,jpeg,png,gif',
		],			
		[
			//Tùy chỉnh hiển thị thông báo không thõa điều kiện
			'image_3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
		]
	);
	
	//Lưu hình ảnh vào thư mục
	$image3 = $req->file('image_3');
	$getimage3 = $image3->getClientOriginalName();
	$destinationPath = public_path('assets/img/product');
	$image3->move($destinationPath, $getimage3);
	}	
	// upload ảnh
	$getimage4 = '';
	if($req->hasFile('image_4')){
	//Hàm kiểm tra dữ liệu
	$this->validate($req, 
	[
		//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
		'image_4' => 'mimes:jpg,jpeg,png,gif',
	],			
	[
		//Tùy chỉnh hiển thị thông báo không thõa điều kiện
		'image_4.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
	]
	);

	//Lưu hình ảnh vào thư mục
	$image4 = $req->file('image_4');
	$getimage4 = $image4->getClientOriginalName();
	$destinationPath = public_path('assets/img/product');
	$image4->move($destinationPath, $getimage4);
	}
	$dataInsertToDatabase = array(
		'name'  => $name,
		'slug' => $slug,
		'category_id' => $category_id,
		'price' => $price,
		'sale_price' => $sale_price,
		'shortdes' => $shortdes,
		'description' => $description,
		'image' => $getimage,
		'image_2' => $getimage2,
		'image_3' => $getimage3,
		'image_4' => $getimage4,
		'status' => $status,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
	);
	$insertData = DB::table('product')->insert($dataInsertToDatabase);
	if ($insertData) {
		Session::flash('success', 'Thêm mới sản phẩm thành công!');
	}else {                        
		Session::flash('error', 'Thêm thất bại!');
	}
	return redirect()->route('admin.product');
	}
	public function view($id) {
		$getData = DB::table('product')->select()->where('id',$id)->get();
		return view('admin.product.detail')->with('getProductById',$getData);
	}

	public function edit($id) {
		$getData = DB::table('product')->select()->where('id',$id)->get();
	
		//Gọi đến file edit.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên getHocSinhById = $getData
		return view('admin.product.edit')->with('getProductById',$getData);
	}
	public function update($id, Request $req) {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$this->validate($req,[
			'name' => 'required',
			'price' => 'required',
			'shortdes' => 'required',
			'description' => 'required',
			'slug' => 'required',
			'image' => 'required'
		],[
			'name.required' => 'Tên sản phẩm không để trống',
			'slug.required' => 'Tieu đề seo sản phẩm không để trống',
			'shortdes.required' => 'Mô tả ngắn không để trống',
			'description.required' => 'Chi tiết không để trống',
			'price.required' => 'Giá không để trống',
			'image.required' => 'Ảnh không để trống',
			
		]);
		$allRequest  = $req->all();
		$name  = $allRequest['name'];
		$slug = $allRequest['slug'];
		$category_id = $allRequest['category_id'];
		$price = $allRequest['price'];
		$sale_price = $allRequest['sale_price'];
		$shortdes = $allRequest['shortdes'];
		$description = $allRequest['description'];
		$status = $allRequest['status'];
	//Thực hiện câu lệnh update với các giá trị $request trả về
	$getimage = '';
		if($req->hasFile('image')){
		//Hàm kiểm tra dữ liệu
		$this->validate($req, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'image' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
			]
		);
		
		//Lưu hình ảnh vào thư mục
		$image = $req->file('image');
		$getimage = $image->getClientOriginalName();
		$destinationPath = public_path('assets/img/product');
		$image->move($destinationPath, $getimage);
	}
		// upload ảnh
		$getimage2 = '';
		if($req->hasFile('image_2')){
		//Hàm kiểm tra dữ liệu
		$this->validate($req, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'image_2' => 'mimes:jpg,jpeg,png,gif',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'image_2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
			]
		);
		
		//Lưu hình ảnh vào thư mục
		$image2 = $req->file('image_2');
		$getimage2 = $image2->getClientOriginalName();
		$destinationPath = public_path('assets/img/product');
		$image2->move($destinationPath, $getimage2);
	}
	// upload ảnh
	$getimage3 = '';
	if($req->hasFile('image_3')){
	//Hàm kiểm tra dữ liệu
	$this->validate($req, 
		[
			//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
			'image_3' => 'mimes:jpg,jpeg,png,gif',
		],			
		[
			//Tùy chỉnh hiển thị thông báo không thõa điều kiện
			'image_3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
		]
	);
	
	//Lưu hình ảnh vào thư mục
	$image3 = $req->file('image_3');
	$getimage3 = $image3->getClientOriginalName();
	$destinationPath = public_path('assets/img/product');
	$image3->move($destinationPath, $getimage3);
	}	
	// upload ảnh
	$getimage4 = '';
	if($req->hasFile('image_4')){
	//Hàm kiểm tra dữ liệu
	$this->validate($req, 
	[
		//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
		'image_4' => 'mimes:jpg,jpeg,png,gif',
	],			
	[
		//Tùy chỉnh hiển thị thông báo không thõa điều kiện
		'image_4.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
	]
	);

	//Lưu hình ảnh vào thư mục
	$image4 = $req->file('image_4');
	$getimage4 = $image4->getClientOriginalName();
	$destinationPath = public_path('assets/img/product');
	$image4->move($destinationPath, $getimage4);
	}
	$dataUpdateToDatabase = array(
		'name'  => $name,
		'slug' => $slug,
		'category_id' => $category_id,
		'price' => $price,
		'sale_price' => $sale_price,
		'shortdes' => $shortdes,
		'description' => $description,
		'image' => $getimage,
		'image_2' => $getimage2,
		'image_3' => $getimage3,
		'image_4' => $getimage4,
		'status' => $status,
		'updated_at' => date('Y-m-d H:i:s'),
	);
	$updateData = DB::table('product')->where('id', $req->id)->update($dataUpdateToDatabase);
	if ($updateData) {
		Session::flash('success', 'Sửa thành công!');
	} else {                        
		Session::flash('error', 'Sửa thất bại!');
	}

		return redirect()->route('admin.product')->with('success','Cập nhật thành công');
		}
	public function delete($id) {

		Product::destroy($id);
		return redirect()->route('admin.product')->with('success','Xóa thành công');
	}
}

?>
