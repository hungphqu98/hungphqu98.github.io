<?php
namespace App\Http\Controllers;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Reminder;
use Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 *
 */
class AccountController extends Controller {
	/**
	 *
	 */
	public function forgot(){
		
	return view('passwords.email');
    }
    public function password(Request $request) {
        $user = UserAccount::where('email',$request->email)->first();
         if ($user == null) {
             return redirect()->back()->with('errors','Email not exists');
         }
         
         $user = Sentinel::findById($user->id);
         $reminder = Reminder::exists($user) ? : Reminder::create($user);
        dd($reminder);
         $this->sendEmail($user,$reminder->code);
         return redirect()->back()->with(['success' => 'Reset code sent.']);

    }
    public function sendEmail($user,$code){
		Mail::send(
            'mail.forgot',[
                'user'=>$user,
                'code'=>$code,
            ],
            function($message) use ($user) {
                $message->to($user->email);
                $message->subject("Hello $user->email reset your password here");
            }
        );
        
    }
    public function reset($email,$code) {
        $user = UserAccount::whereEmail($email)->first();
         if ($user == null) {
             echo 'Email not exists';
         }
         $user = Sentinel::findById($user->id);
         $reminder = Reminder::exists($user);
         if ($reminder) {
             if($code == $reminder->code){
                 return view('passwords.reset')->with(['user'=>$user,'code'=>$code]);
             } else {
                 return redirect('/');

             }
         } else {
             echo 'Time expired';
         }
    }
}

?>