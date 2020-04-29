<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller {

	public function index() {
		$ord = Order::sortable()->join('payment','payment.order_id','orders.id')->paginate(10);
		return view('admin.orders.index', [
			'lists' => $ord,
		]);
	}
	public function search(){
		
		$key  = request()->key;

		$searchOrd = Order::sortable()->where('email','LIKE','%'.$key.'%')->paginate(10);
			return view('admin.orders.search',compact('searchOrd'));
	}
	public function confirm() {
		$ord = DB::table('orders')->join('payment','payment.order_id','orders.id')->where('status','1')->where('payment_method','2')->paginate(10);
		return view('admin.orders.confirm', [
			'lists' => $ord,
		]);
	}
	public function view($id) {
		$getOrder = DB::table('orders')->select()->where('id',$id)->get();
		$getDetail = DB::table('order_detail')->select()->where('order_id',$id)->join('product','order_detail.product_id','product.id')->get();
		$getPayment = DB::table('payment')->select()->where('order_id',$id)->get();
	
		return view('admin.orders.view',compact('getOrder','getDetail','getPayment'));
	}
	public function edit($id) {
		$getData = DB::table('orders')->select()->where('id',$id)->get();
	
		return view('admin.orders.edit')->with('getOrderById',$getData);
	}
	public function update($id, Request $req) {

	$getData = DB::table('orders')->select()->where('id',$id)->get();
	
	$getDetail = DB::table('order_detail')->select()->where('order_id',$id)->join('product','order_detail.product_id','product.id')->get();
	$updateOrder = DB::table('orders')->where('id', $req->id)->update([
		'status' => $req->status
	]);
	foreach($getData as $orda) {
	if ($req->status == 4) {
		Mail::send('payment-success',[
			'name' => $orda->name,
			'order' =>$orda->id,
		], function($mail) use($orda) {
					$mail->to($orda->email,$orda->name);
					$mail->from('whysoserious245@gmail.com');
					$mail->subject('Xác nhận thanh toán');

	});
}}
	if ($updateOrder) {
		Session::flash('success', 'Sửa thành công!');
	} 
		return redirect()->route('admin.orders')->with('success','Cập nhật thành công');
	}

}

?>
