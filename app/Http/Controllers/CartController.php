<?php
namespace App\Http\Controllers;
use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 *
 */
class CartController extends Controller {
	/**
	 *
	 */

	public function index(Cart $cart) {
		return view('cart');
	}
	public function add($id, $quantity = 1, Cart $cart) {
		$pro = Product::find($id);
		$cart->add($pro, $quantity);
		return redirect()->back()->with('success', 'Add to cart successfully');
	}
	public function update($id, Cart $cart) {
		$quantity = request()->quantity;
		$cart->update($id, $quantity);
		
		return redirect()->route('cart')->with('success', 'Update cart successfully');
	}
	public function delete($id, Cart $cart) {
		$cart->delete($id);
		return redirect()->back()->with('success', 'Delete from cart successfully');
	}
	public function clear() {

	}
}

?>