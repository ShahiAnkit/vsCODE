<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLoginInfo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Hash;
use Mail;
use Response;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

     /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('web')->user();
            $userdata=User::find(auth()->guard('web')->user()->id);
            $userdata->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp()
            ]);

            UserLoginInfo::create([
                'user_id'=>$userdata->id,
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp()
            ]);

            \Session::put('success','You are Login successfully!!');
            return redirect('/');

        } else {
            return back()->with('error','Your username and password are wrong.');
        }

    }


    /**
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'), ['status' => 'active']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function showForgot(){
        return view('auth.forget');
    }

    public function forgotPassword(Request $request)
    {
        $userdata = User::where('email', $request->email)->first();
        if ($userdata) {
            Mail::send('emails.forgotpassword', ['name'=>$userdata->name,'password'=>base64_decode($userdata->password_value)], function ($m) use ($userdata) {
                $m->from(config('services.mail.from'), config('services.mail.from_name'));
                $m->to($userdata->email, $userdata->name)->subject('Forgot Password!');
            });
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error','message'=>'Email not register with us']);
        }
    }

    public function showRegisterFrom(){
        return view('auth.register');
    }

    public function Register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'company_name' => 'required',
            'password' => 'required',
        ]);

        if (!($validator->fails())) {
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "password_value"=>base64_encode($request->password),
                "company_name"=>$request->company_name,
                "city"=>$request->city,
                "state"=>$request->state,
                "address"=>$request->address,
                "role_type"=>"Normal",
                "status"=>"Unlock",
            ]);
            return Response::json(['success' => '200']);
        }else{
            return Response::json(['errors' => $validator->errors()]);
        }
    }

}
