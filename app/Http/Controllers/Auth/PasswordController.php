<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectTo = '/profile';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('change');
    }

    public function change(Request $request)
    {
        if(!Auth::check()) return;
        $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->password
        ];
        //
        if(Auth::validate($credentials) && $request->new_password == $request->new_password_confirmation) {
            Auth::user()->password = Hash::make($request->new_password);
            Auth::user()->save();
            return json_encode(true);
        }

        return \Illuminate\Http\Response::create('Could not validate credentials', 401);
      //  echo var_dump($request->password);

    }
}
