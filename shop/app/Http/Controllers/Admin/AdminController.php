<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
	protected $username = 'email';
	public function index() {
		$date = \Carbon\Carbon::today()->subDays(15);
		$ord_count = Order::where('created_at', '>=', $date)->get();
		$pro_count = Product::where('created_at', '>=', $date)->get();
		$cus_count = UserAccount::where('created_at', '>=', $date)->get();
		$com_count = Comment::where('created_at', '>=', $date)->get();
		return view('admin.index', compact('pro_count', 'cus_count', 'ord_count', 'com_count'));
	}
	public function delete($id) {

		Admin::destroy($id);
		return redirect()->route('admin.account');
	}
	public function account() {
		$adminacc = Admin::paginate(10);
		return view('admin.account.index', [
			'lists' => $adminacc,
		]);
	}
	public function form_login() {
		return view('admin.login');
	}
	public function post_login(Request $req) {
		$this->validate($req, [
			'email' => 'required|email',
			'password' => 'required|min:6',
		], [
			'email.required' => 'Email không để trống',
			'email.email' => 'Email không đúng định dạng',
			'password.required' => 'Password không để trống',
			'password.min' => 'Password phải dài hơn 6 kí tự',
		]);

		if (Auth::attempt($req->only('email', 'password'))) {
			return redirect()->route('admin.index');
		} else {
			return redirect()->route('admin.login')->with('error', 'Lỗi đăng nhập');
		}

	}
	public function logout() {
		Auth::logout();
		return redirect()->route('admin.login');
	}

	public function form_register() {
		return view('admin.register');
	}
	public function post_register(Request $req) {
		$this->validate($req, [
			'email' => 'required|unique:admin',
			'password' => 'required|min:6',
		], [
			'email.required' => 'Email không để trống',
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Password không để trống',
			'password.min' => 'Password phải dài hơn 6 kí tự',
		]);
		$password = bcrypt($req->password);
		$req->merge(['password' => $password]);
		Admin::create($req->all());
		return redirect()->route('admin.login')->with('success', 'Đăng ký thành công');

	}
	public function getchangePassword() {
		return view('admin.change');

	}
	public function changePassword(Request $request) {

		if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
			// The passwords matches
			return redirect()->back()->with("error", "Mật khẩu không khớp. Vui lòng thử lại");
		}

		if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
			//Current password and new password are same
			return redirect()->back()->with("error", "Mật khẩu mới không được giống mật khẩu cũ");
		}

		$validatedData = $request->validate([
			'current-password' => 'required',
			'new-password' => 'required|string|min:6|confirmed',
		]);

		//Change Password
		$user = Auth::user();
		$user->password = bcrypt($request->get('new-password'));
		$user->save();

		return redirect()->back()->with("success", "Thay đổi mật khẩu thành công !");

	}

}

?>
