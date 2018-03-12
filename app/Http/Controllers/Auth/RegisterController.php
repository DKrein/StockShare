<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserEmailAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function register(RegisterRequest $request) {

        
        DB::transaction(function () use ($request) {
            
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => bcrypt($request->password),
            ]);
            
            foreach($request->email_address as $key => $email_address) {
                UserEmailAddress::create([
                    'user_id' => $user->id,
                    'email_address' => $email_address,                
                    'is_default' => ($key==$request->is_default ? 1 : 0),
                ]);     
            }         
        });
        
        return redirect()->route('/')->withFlashSuccess('User registered with success.');        
    }
}
