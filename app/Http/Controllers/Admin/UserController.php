<?php 
/*
	File name UserController.php
	File path app/Http/Controllers/UserController.php
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Session;


class UserController extends Controller 
{

	protected $username = 'email';
	/**
	* Action create
	* Tạo user demo, sau này có các action thêm, sửa xóa có thể xó đi
	*/
	public function post_register(Request $req) {
	$this->validate($req,[
		'email'=>'required|unique:users',
		'password'=>'required|min:6'
	],[
		'email.required'=>'Email không được bỏ trống',
		'email.unique'=>'Email đã tồn tại',
		'password.required'=>'Password không được bỏ trống',
		'password.min'=>'Password phải lớn hơn 6 ký tự'
	]);
	$password = bcrypt($req->password);
	$req->merge(['password'=>$password]);
	if (UserAccount::create($req->all())) {
		Session::flash('success','Đăng ký thành công');
		return redirect()->route('login');
	}
	else{
		Session::flash('error','Đăng ký không thành công');
		return redirect()->back();
	}
}
	public function create(){
		// dd(bcrypt(123456));
		UserAccount::create([
			'email' => 'demo@gmail.com', 
			'password' => bcrypt(123456),
		]);
	}
	public function search() {
		
		$key  = request()->key;

		$searchAcc = UserAccount::sortable()->where('email','LIKE','%'.$key.'%')->paginate(11);
			return view('admin.users.search',compact('searchAcc'));
	}
	public function delete($id) {

		UserAccount::destroy($id);
		return redirect()->route('admin.users');
	}
	public function index(){
		$useraccount = UserAccount::paginate(10);
		return view('admin.users.index', [
			'lists' => $useraccount,
		]);
	}

}



?>