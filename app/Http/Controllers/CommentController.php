<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use Auth;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
    	$request->validate([
            'content'=>'required',
            'rating'=>'required',
        ]);
        $input = $request->all();
        $input['rating'] = $request->rating;
        $input['user_id'] = Auth::guard('useracc')->user()->id;
        $input['user_email'] = Auth::guard('useracc')->user()->email;
        Comment::create($input);
   
        return back();
    }
    

}