<?php 
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use Session;

use App\Http\Controllers\Controller;

class CommentController extends Controller
{

	public function index(){
        $com = Comment::sortable()->paginate(11);
        return view('admin.comment.index',[
			'lists' => $com,
		]);
    }
	public function delete($id) {

		Comment::destroy($id);
		return redirect()->route('admin.comment')->with('success','Xóa thành công');
	}
	public function search(){
		
		$key  = request()->key;

		$searchComm = Comment::sortable()->where('user_email','LIKE','%'.$key.'%')->orWhere('product_id','=',$key)->paginate(11);
			return view('admin.comment.search',compact('searchComm'));
	}

	public function edit($id) {
		$getData = Comment::select()->where('id',$id)->get();
	
		return view('admin.comment.edit')->with('getComById',$getData);
	}
	public function update($id, Request $req) {

	$updateCom =Comment::where('id', $req->id)->update([
		'rating' => $req->rating,
		'content' => $req->content,
		'status' => $req->status
	]);
	if ($updateCom) {
		Session::flash('success', 'Sửa thành công!');
	} else {                        
		Session::flash('error', 'Sửa thất bại!');
	}

		return redirect()->route('admin.comment')->with('success','Cập nhật thành công');
	}

 }

 ?>
