<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Contracts\Auth\PasswordBroker;

class PasswordController extends Controller
{
    public function index(Request $request, PasswordBroker $passwords)
    {

            $this->validate($request, ['email' => 'required|email']);

            $response = $passwords->sendResetLink($request->only('email'));
            //return $response;
            switch ($response)
            {
                case PasswordBroker::RESET_LINK_SENT:
                   return[
                       'error'=>'false',
                       'msg'=>'A password link has been sent to your email address'
                   ];

                case PasswordBroker::INVALID_USER:
                   return[
                       'error'=>'true',
                       'msg'=>"We can't find a user with that email address"
                   ];
            }

        return false;
    }
    public function show(){

        return view('auth.forget');
    }
}
