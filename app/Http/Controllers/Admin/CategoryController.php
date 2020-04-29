<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CategoryController extends Controller {

	public function index() {
		$cats = Category::paginate(5);
		return view('admin.category.index', [
			'lists' => $cats,
		]);
	}
	public function add(){
		return view('admin.category.add');
	}
	public function post_add(Request $req){
		// validate dữ liệu
		$this->validate($req,[
			'name' => 'required|unique:category',
			'slug' => 'required|unique:category',
		],[
			'name.required' => 'Tên danh mục không để trống',
			'slug.required' => 'Tieu đề seo không để trống',
			'name.unique' => 'Tên danh mục đã sử dụng',
			'slug.unique' => 'Tieu đề seo đã sử dụng'
		]);
		
		if (Category::create($req->all())) {
			Session::flash('success','Thêm mới thành công');
		}else{
			Session::flash('error','Thêm mới không thành công');
		}
		return redirect()->route('admin.category');
	}
	public function delete($id) {

		Category::destroy($id);
		return redirect()->route('admin.category')->with('success','Xóa thành công');
	}


	public function edit($id) {
		$getData = DB::table('category')->select()->where('id',$id)->get();
	
		return view('admin.category.edit')->with('getCatById',$getData);
	}
	public function update($id, Request $req) {

	//Thực hiện câu lệnh update với các giá trị $request trả về
	$updateCat = DB::table('category')->where('id', $req->id)->update([
		'name' => $req->name,
		'slug' => $req->slug,
		'status' => $req->status
	]);
	if ($updateCat) {
		Session::flash('success', 'Sửa thành công!');
	} else {                        
		Session::flash('error', 'Sửa thất bại!');
	}

		return redirect()->route('admin.category')->with('success','Cập nhật thành công');
	}

}

?>
