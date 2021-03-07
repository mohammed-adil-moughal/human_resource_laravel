<?php

namespace App\Http\Controllers\Auth;

use App\MemberBioData;
use App\User;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|unique:member_bio_datas,E_mail',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function admin(Request $request) {
        if($request->isMethod('get'))
        {
            return view('events/admin/login');
        }
        $credentials=Input::only('email','password');
        if(!Auth::attempt($credentials))
        {
           return view('events/admin/login');
        }
        if(Auth::user()->Admin)
        {
            return redirect('/events/admin');
        }
    else{
       
         return redirect('/');
        }
    }
    
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            
        ]);
        
        try{
            if($user){
            $data['token']  = $user->token;

            Mail::send('auth.emails.welcome', $data, function($message) use ($data)
            {
                $message->from('no-reply@kism.or.ke', "Kenya Institute of Supplies and Management");
                $message->subject("Welcome to the KISM Portal");
                $message->to($data['email']);
            });

        }
        } catch (Exception $ex) {

        }
        
        
        return $user;
            
    }

    protected function authenticated(Request $request, $user)
    {
        $messages = array();
        $message = \Flash::create(\Flash::$SUCCESS, 'Successfully logged in!');
        array_push($messages,$message);
        Session::flash('messages', $messages);
        return redirect()->intended($this->redirectPath());
    }

    public function logout()
    {
        $messages = array();
        $message = \Flash::create(\Flash::$SUCCESS, 'Successfully logged out.');


        array_push($messages,$message);
        Session::flash('messages', $messages);

        Auth::logout();

        return redirect('/');
    }

    public function existing(Request $request){
        if ($request->isMethod('post'))
        {
            $member = MemberBioData::where(['Member_No'=> $request->Member_No, 'E_mail' => $request->E_mail])->first();
            if(!$member)
            {
               $member = MemberBioData::where(['No'=> $request->Member_No, 'E_mail' => $request->E_mail])->first();
            }
            if($member)
            {
                $user = null;
                $user = User::find($member->user);
                if(!$user)
                {
                    $credentials = ['email' => $member->E_mail, 'name' => $member->Other_Names.$member->Surname];
                    $credentials['password'] = Hash::make(uniqid());
                    $user = User::create($credentials);
                    $user->save();
                    $member->user = $user->id;
                    $member->save();
                }
                $repo = Password::getRepository();
                $token = $repo->create($user);
                Mail::send('auth.emails.existing',['token' => $token, 'user'=> $user ], function($message) use ($user)
                {
                    $message->to($user->email, $user->name)->subject('Welcome!');
                });


                $messages = array();
                $message = \Flash::create(\Flash::$INFO, 'You will be sent an email with instructions on how to create your KISM Portal account');
                array_push($messages,$message);
                Session::flash('messages', $messages);
            }
            else
            {
                $messages = array();
                $message = \Flash::create(\Flash::$INFO, 'No member with that Member No. was not found.');
                array_push($messages,$message);
                Session::flash('messages', $messages);
            }

        }
        return view('auth/existing');
    }

}
