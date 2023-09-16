<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
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

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            // 'password' => [
            //     'required',
            //     'min:6',
            //     'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     'confirmed'
            // ]

            // regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'

            'password' => 'required|confirmed|min:4|max:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[@$!%*#?&]/', 





            //  'password' => 'required|confirmed|min:2|max:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
            
            
            
         ];
        
    }
    protected function validationErrorMessages()
    {
        return  [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long.',


          


            //   'password.regex' => 'Password must contain 1 number',
            //   'password.min' => 'at least',


            // 'password.regex:/[A-Z]/'=> 'Mustadcascasdcasdc',

            
            //  'password.regex' => 'Password must contain 1 large alphabet',
        ];
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
