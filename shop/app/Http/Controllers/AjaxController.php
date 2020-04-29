<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use Auth;
   
class AjaxController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function ajaxPagination(Request $request){
        $data = Product::paginate(9);
        if ($request->ajax()) {
            return view('shop',compact('data'));
        }
        return view('ajshop',compact('data'));
    }
    public function ajaxPa(Request $request){
        $data = Product::paginate(9);
        if ($request->ajax()) {
            return view('presult',compact('data'));
        }
        return view('ajaxPagination',compact('data'));
    }
    public function modal(){
       return view('modal');
    }
    public function loadModal($id)
{
    $data = Product::where('id','23')->get();
    // write your process if any
    return view('modal',['data'=>$data]);
}

}