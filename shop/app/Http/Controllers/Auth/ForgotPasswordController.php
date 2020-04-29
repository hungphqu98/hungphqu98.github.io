<?php

namespace App\Http\Controllers\Auth;
use App\Models\UserAccount;
use App\Models\PasswordReset;
use Mail;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestResetPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function forgot() {
        return view('passwords.email');
    }
    public function postforgot(Request $request) {
        $email = $request->email;
        $checkUser = UserAccount::where('email',$email)->first();
        if (!$checkUser) {
            return redirect()->back()->with('error','Email not exists');
        }
        $code = bcrypt(md5(time().$email));
        $checkUser->reset_code = $code;
        $checkUser->time_reset = Carbon::now();
        $checkUser->save();
        $url = route('get.form.reset',['code'=>$code,'email'=>$email]);
        $data = [
            'route' =>$url
        ];
        Mail::send('mail.forgot',$data, function ($message) use ($email){
            $message->to($email, 'Reset')->subject('Reset password');
        });
        return redirect()->back()->with('success','Reset email sent!');
    }
    public function reset(Request $request) {
        $code = $request->code;
        $email = $request->email;
        $checkUser = UserAccount::where([
            'reset_code'=> $code,
            'email'=>$email,
        ])->first();
        if (!$checkUser) {
            return redirect('/')->with('error','Wrong link');
        }
        return view('passwords.reset',compact('email','code'));
    }
    public function postreset(Request $request) {
        $this->validate($request, [
			'password' => 'required',
            'password_confirmation' => 'required|same:password'
		], [
			'password.required' => 'New password must not empty',
            'password_confirmation.required' => 'New password must be retyped',
            'password_confirmation.same' => 'Retyped password wrong'
        ]);
        
        if ($request->password) {
            $code = $request->code;
            $email = $request->email;
            $checkUser = UserAccount::where([
                'reset_code'=> $code,
                'email'=>$email,
            ])->first();
        }
        if (!$checkUser) {
            return redirect('/')->with('error','Wrong link');
        }
        $checkUser->password = bcrypt($request->password);
        $checkUser->save();
        return redirect()->route('login')->with('success','Reset password succesfully');
    }
    use SendsPasswordResetEmails;
}
