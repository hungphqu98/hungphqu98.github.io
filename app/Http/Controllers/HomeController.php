<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\UserAccount;
use Mail;
use Auth;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
class HomeController extends Controller {
	/**
	 *
	 */
	public function index(){
		$ban = Banner::where('status','1')->limit(2)->get();
		$newProduct = Product::orderBy('id','DESC')->limit(8)->get();
		$randProduct = Product::inRandomOrder()->limit(8)->get();
		$saleProduct = Product::where('sale_price','>',0)->orderBy('id','DESC')->limit(8)->get();
		$soloPro = Product::orderBy('id','DESC')->where('name','LIKE','%solo_pro%')->get();
		$studio = Product::orderBy('id','DESC')->where('name','LIKE','%studio_3%')->get();
		$soloThree = Product::orderBy('id','DESC')->where('name','LIKE','%solo_3%')->get();
		$ep = Product::orderBy('id','DESC')->where('name','LIKE','%Beats_EP%')->get();
		$pro = Product::orderBy('id','DESC')->where('name','LIKE','Beats_Pro%')->get();
		$powPro = Product::orderBy('id','DESC')->where('name','LIKE','%powerbeats_pro%')->get();
		$powThree = Product::orderBy('id','DESC')->where('name','LIKE','%powerbeats_3%')->get();
		$bx = Product::orderBy('id','DESC')->where('name','LIKE','Beats_X%')->get();
		$urbeats = Product::orderBy('id','DESC')->where('name','LIKE','%urbeats%')->get();
		$pill = Product::orderBy('id','DESC')->where('name','LIKE','%Pill_2%')->get();
		$pillPlus = Product::orderBy('id','DESC')->where('name','LIKE','%Pill_Plus%')->get();
		$data = Product::get();
		return view('index',compact('data','ban','newProduct','randProduct','saleProduct','soloPro','studio','soloThree','ep','pro','powPro','powThree','bx','urbeats','pill','pillPlus'));
	}

	public function shop(){	

		$data= Product::sortable()->paginate(9);
		return view('shop',compact('data'));
	}
	public function about(){
		return view('about');
	}
	public function head(){
		$head = Product::sortable()->where('category_id','12')->paginate(6);
		return view('shop')->with('data', $head);	
	}
	public function headl(){
		$headl = Product::sortable()->where('category_id','12')->where('status','4')->paginate(9);
		return view('shop')->with('data', $headl);	
	}
	public function solopro(){
		$solopro = Product::sortable()->where('name','LIKE','%solo_pro%')->paginate(9);
		return view('shop')->with('data', $solopro);	
	}
	public function studio3(){
		$studio = Product::sortable()->where('name','LIKE','%studio_3%')->paginate(9);
		return view('shop')->with('data', $studio);	
	}
	public function solo3(){
		$soloThree = Product::sortable()->where('name','LIKE','%solo_3%')->paginate(9);
		return view('shop')->with('data', $soloThree);	
	}
	public function beatsep(){
		$ep = Product::sortable()->where('name','LIKE','%Beats_EP%')->paginate(9);
		return view('shop')->with('data', $ep);	
	}
	public function beatspro(){
		$bpro = Product::sortable()->where('name','LIKE','Beats_Pro%')->paginate(9);
		return view('shop')->with('data', $bpro);	
	}
	public function nba(){
		$nba = Product::sortable()->where('name','LIKE','%NBA_Collection%')->paginate(9);
		return view('shop')->with('data', $nba);	
	}
	public function matte(){
		$matte = Product::sortable()->where('name','LIKE','%Matte_Collection%')->paginate(9);
		return view('shop')->with('data', $matte);	
	}
	public function camo(){
		$camo = Product::sortable()->where('name','LIKE','%Camo_Collection%')->paginate(9);
		return view('shop')->with('data', $camo);	
	}
	public function club(){
		$club = Product::sortable()->where('name','LIKE','%Club%')->paginate(9);
		return view('shop')->with('data', $club);	
	}
	public function ear(){
		$ear = Product::sortable()->where('category_id','15')->paginate(9);
		return view('shop')->with('data', $ear);	
	}
	public function earl(){
		$earl = Product::sortable()->where('category_id','15')->where('status','4')->paginate(9);
		return view('shop')->with('data', $earl);	
	}
	public function powpro(){
		$powPro = Product::sortable()->where('name','LIKE','%powerbeats_pro%')->paginate(9);
		return view('shop')->with('data', $powPro);	
	}
	public function beatsx(){
		$bx = Product::sortable()->where('name','LIKE','Beats_X%')->paginate(9);
		return view('shop')->with('data', $bx);	
	}
	public function pow3(){
		$powThree = Product::sortable()->where('name','LIKE','%powerbeats_3%')->paginate(9);
		return view('shop')->with('data', $powThree);	
	}
	public function urbeats(){
		$urbeats = Product::sortable()->where('name','LIKE','%urbeats%')->paginate(9);
		return view('shop')->with('data', $urbeats);	
	}
	public function speaker(){
		$speaker = Product::sortable()->where('category_id','16')->paginate(9);
		return view('shop')->with('data', $speaker);	
	}
	public function spel(){
		$spel = Product::sortable()->where('category_id','16')->where('status','4')->paginate(9);
		return view('shop')->with('data', $spel);	
	}
	public function pill2(){
		$pill = Product::sortable()->where('name','LIKE','%Pill_2%')->paginate(9);
		return view('shop')->with('data', $pill);	
	}
	public function pplus(){
		$pillPlus = Product::sortable()->where('name','LIKE','%Pill_Plus%')->paginate(9);
		return view('shop')->with('data', $pillPlus);	
	}	
	public function view_pro($id,$slug){
		$product = Product::where(['slug'=>$slug,'id'=>$id])->get();
		$randProduct = Product::inRandomOrder()->limit(8)->get();
		$comment = Comment::orderBy('id','DESC')->where('product_id',$id)->where('status','1')->paginate(2);
		$rate = Comment::where('product_id',$id)->where('status','1')->sum('rating');
		$cat = Category::where('slug',$slug)->first();
		if ($comment->total() > 0) {
			$updateRat = Product::where('id', $id)->update([
			'product_rating' => $rate/($comment->total()),
		]);
		}
		
		if ($cat) {
			// san pham theo danh muc
			$newProduct = Product::orderBy('id','DESC')->where('category_id',$id)->paginate(2);
			return view('shop',compact('newProduct','cat'));
		}else if($product){
			// chi tiet san pham
			return view('product-details',compact('product','comment','rate','randProduct'));
		}else{
			return view('404');
		}
		
	}

	public function search(){
		$key = request()->key;
		$select = request()->select;
		if ($select == 2) {
		$searchProduct = Product::sortable()->where('category_id','=','12')->where('name','LIKE','%'.$key.'%')->paginate(6);
		} elseif ($select == 4) {
			$searchProduct = Product::sortable()->where('category_id','=','16')->where('name','LIKE','%'.$key.'%')->paginate(6);
		} elseif ($select == 3) {
			$searchProduct = Product::sortable()->where('category_id','=','15')->where('name','LIKE','%'.$key.'%')->paginate(6);
		} else {
			$searchProduct = Product::sortable()->where('name','LIKE','%'.$key.'%')->paginate(6);
		}
			return view('search',compact('searchProduct'));
	}

	public function contact() {
		return view('contact');
	}
	public function post_contact(Request $req) {
		Mail::send('mail.contact',[
			'name' =>$req->name,
			'content' =>$req->content,
		], function($mail) use($req) {
					$mail->to('whysoserious245@gmail.com',$req->name);
					$mail->from($req->email);
					$mail->subject($req->subject);
		});
	}
	public function error() {
		return view('404');
	}
	public function policy() {
		return view('policy');
	}
	public function intship() {
		return view('intship');
	}
	public function secshop() {
		return view('secshop');
	}
	public function deliinfo() {
		return view('deliinfo');
	}
	public function shipret() {
		return view('shipret');
	}
	public function faq() {
		return view('faq');
	}
	public function register() {
		return view('register');
	}
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
		UserAccount::create($req->all());
		return redirect()->route('login')->with('success','Đăng ký thành công');
	}
	public function login() {
		return view('login');
	}
	public function post_login(Request $req) {
		$this->validate($req,[
			'email' => 'required',
			'password' => 'required',
		],[
			'email.required' => 'Vui lòng nhập email',
			'password.required' => 'Vui lòng nhập mật khẩu',
		]);
		if (Auth::guard('useracc')->attempt($req->only('email','password'),$req->has('remember'))) {
			return redirect()->route('home');
		} else {
			return redirect()->back()->withErrors('Sai thông tin đăng nhập');
		}
	}
	public function logout() {
		Auth::guard('useracc')->logout();
		return redirect()->route('home');
	}

	public function checkout() {
		return view('checkout');
	}
	public function account() {
		$em = Auth::guard('useracc')->user()->email;
		$userOrder = Order::orderBy('id','DESC')->where('email','LIKE',$em)->paginate(8);
		return view('my-account',compact('userOrder'));
	
	}
	public function filterPrice(Request $request) {
		$req = $request->all();
		$range = $request->price_range;
		$price = explode(';',$range);
		
		$minPrice = $price[0];
		$maxPrice = $price[1];
		if (isset($req['head']) && !isset($req['ear']) && !isset($req['speak'])) {
		$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->where('category_id','12')->paginate(6); 
		} elseif (isset($req['head']) && isset($req['ear']) && !isset($req['speak'])) {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->whereIn('category_id',[12,15])->paginate(6);
		} elseif (isset($req['head']) && !isset($req['ear']) && isset($req['speak'])) {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->whereIn('category_id',[12,16])->paginate(6);
		} elseif (!isset($req['head']) && isset($req['ear']) && !isset($req['speak'])) {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->where('category_id','15')->paginate(6);
		} elseif (!isset($req['head']) && isset($req['ear']) && isset($req['speak'])) {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->whereIn('category_id',[15,16])->paginate(6);
		} elseif (!isset($req['head']) && !isset($req['ear']) && isset($req['speak'])) {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->where('category_id','16')->paginate(6);
		} else {
			$filter = Product::sortable()->whereBetween('price', [$minPrice, $maxPrice])->paginate(6); 
		}
		return view('shop-filter',compact('minPrice','maxPrice'))->with('data', $filter);	
	}
	public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::guard('useracc')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::guard('useracc')->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

}

?>