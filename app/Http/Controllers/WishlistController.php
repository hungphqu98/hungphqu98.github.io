<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\UserAccount;
use Auth;
use Session;
/**
 *
 */
class WishlistController extends Controller {
	/**
	 *
	 */
	public function __construct() {
        $this->middleware(['auth']);
    }
	public function index() {
		$user = Auth::guard('useracc')->user()->id;
		$items = Wishlist::where('user_id',$user)->join('product','wishlist.product_id','product.id')->get();
		return view('wishlist',compact('items','user'));
	}
	public function add($id)
    {	
		$pro = Product::find($id);
		$user = Auth::guard('useracc')->user()->id;
		$wishlists = Wishlist::updateorInsert(
			[
			'product_id'=> $pro->id,
			'user_id'=> $user,
			]
		);
		if ($wishlists) {
			return redirect()->back()->with('success','Successfully add to wishlist');
		}else {                        
			return redirect()->back()->with('error','Failed to add to wishlist');
		}
	} 
	public function delete($id) {

		Wishlist::where('product_id',$id)->delete();
		return redirect()->back()->with('success','Wishlist items successfully deleted');
	}
	
	
}

?>