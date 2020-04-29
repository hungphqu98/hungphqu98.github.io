<?php

namespace App\Http\Controllers;
use App\Helper\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Mail;
use Session;

/**
 *
 */
class CheckoutController extends Controller {
	/**
	 *
	 */
	public function __construct() {
		// $this->middleware('useracc');
	}
	public function success() {

		return view('checkout_success');
	}
	public function index(Cart $cart) {
		return view('checkout');
	}
	public function submit(Request $req, Cart $cart) {

		if (!empty($cart)) {
			if ($order = Order::create([
				'name' => $req->name,
				'address' => $req->address,
				'city' => $req->city,
				'phone' => $req->phone,
				'email' => $req->email,
				'note' => $req->note,
				'total' => $cart->total_price,
			])
			) {
				$order_id = $order->id;
				foreach ($cart->items as $product_id => $item) {
					$quantity = $item['quantity'];
					$unit_price = $item['price'];
					OrderDetail::create([
						'order_id' => $order_id,
						'product_id' => $product_id,
						'unit_price' => $unit_price,
						'quantity' => $quantity,
					]);
				}

				Payment::create([
					'order_id' => $order_id,
					'payment_method' => $req->payment_method,
					'code' => $req->code,
				]);

				if ($req->payment_method == 1) {
					Mail::send('order', [
						'name' => $req->name,
						'order' => $order,
						'items' => $cart->items,
					], function ($mail) use ($req) {
						$mail->to($req->email, $req->name);
						$mail->from('whysoserious245@gmail.com');
						$mail->subject('Email đặt hàng');
					});

					session(['cart' => '']);
					return redirect()->route('checkout.success')->with('success', 'Checkout successfully');} else {

					Mail::send('order', [
						'name' => $req->name,
						'order' => $order,
						'items' => $cart->items,
					], function ($mail) use ($req) {
						$mail->to($req->email, $req->name);
						$mail->from('whysoserious245@gmail.com');
						$mail->subject('Email đặt hàng');
					});
					return redirect()->route('checkout.success')->with('success', 'Please wait for payment confirmation email');
				}
			} else {
				return redirect()->back()->with('error', 'ngu');
			}
		} else {
			return redirect()->back()->withErrors('Your cart is empty');
		}
	}
}

?>