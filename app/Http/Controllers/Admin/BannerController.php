<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class BannerController extends Controller {

	public function index() {
		$bans = Banner::paginate(5);
		return view('admin.banner.index', [
			'lists' => $bans,
		]);
	}
	public function add() {
		return view('admin.banner.add');
	}
	public function post_add(Request $req){
		// validate dữ liệu
		$this->validate($req,[
			'name' => 'required',
			'description' => 'required',
			'link' => 'required',
			'image' => 'required|unique:banner',
			'video' => 'required|unique:banner'
		],[
			'name.required' => 'Tên banner không để trống',
			'description.required' => 'Tiêu đề banner không để trống',
			'link.required' => 'Đường dẫn không để trống',
			'image.required' => 'Ảnh không để trống',
			'video.required' => 'Video không để trống',
			'image.unique' => 'Ảnh đã sử dụng',
			'video.unique' => 'Video đã sử dụng'
		]);
		$allRequest  = $req->all();
		$name  = $allRequest['name'];
		$description  = $allRequest['description'];
		$link = $allRequest['link'];
		$image = $allRequest['image'];
		$video = $allRequest['video'];
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
		$destinationPath = public_path('assets/img/banner');
		$image->move($destinationPath, $getimage);
		}

		$dataInsertToDatabase = array(
		'name'  => $name,
		'description' => $description,
		'link' => $link,
		'image' => $image,
		'video' => $video,
		'status' => $status,
		'image' => $getimage,
	);
	$insertData = DB::table('banner')->insert($dataInsertToDatabase);
	if ($insertData) {
		Session::flash('success', 'Thêm mới banner thành công!');
	}else {                        
		Session::flash('error', 'Thêm thất bại!');
	}
	return redirect()->route('admin.banner');
	}


	public function delete($id) {

		Banner::destroy($id);
		return redirect()->route('admin.banner');
	}

	public function edit($id) {
		$getData = DB::table('banner')->select()->where('id',$id)->get();
	
		return view('admin.banner.edit')->with('getBannerById',$getData);
	}
	public function update($id, Request $req) {
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
		$destinationPath = public_path('assets/img/banner');
		$image->move($destinationPath, $getimage);
		}
	//Thực hiện câu lệnh update với các giá trị $request trả về
	$updateBan = DB::table('banner')->where('id', $req->id)->update([
		'name' => $req->name,
		'link' => $req->link,
		'description' => $req->description,
		'image' => $getimage,
		'video' => $req->video,
		'status' => $req->status
	]);
	if ($updateBan) {
		Session::flash('success', 'Sửa thành công!');
	} else {                        
		Session::flash('error', 'Sửa thất bại!');
	}

		return redirect()->route('admin.banner')->with('success','Cập nhật thành công');
	}

}

?>
