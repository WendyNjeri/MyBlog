<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Contracts\Session\Session;

class AuthorLoginForm extends Component
{
    public $login_id, $password;

    public function LogInHandler()
    {
        //when you want to log in with user name or email
        $fieldtype = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ?'email' :'username';

        if($fieldtype == 'email')
        {
            $this->validate(
                [
                    'login_id'=>'required|email|exists:users,email',
                    'password'=> 'required|min:5'
                ],
                //validation for email fieldtype
                [
                    'login_id' => 'email or username is required',
                    'login_id.email' => 'Invalid email address or username',
                    'login_id.exists' => 'This email or username is not registered',
                    'password.required' => 'Password is required'

                ]);
        }else {
            $this->validate(
                [
                    'login_id' => 'required|exists:users,username',
                    'password' => 'required|min:5'
                ],
                //validation for username fieldtype
                [
                    'login_id.required' => 'Enter your email or username',
                    'login_id.email' => 'Invalid username or email address',
                    //'email.exists' => 'This email is not registered in the database',
                    'password.required' => 'Password is required'
                ]
            );
        }

        $creds = array($fieldtype => $this->login_id, 'password' => $this->password);

        if (Auth::guard('web')->attempt($creds)) {
            $checkUser = User::where($fieldtype, $this->login_id)->first();
            if ($checkUser->blocked == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Your account has been blocked');
            } else {
                return redirect()->route('author.home');
            }
        } else {
            Session()->flash('fail', 'Incorrect email or password');
        }




        //when you want to log in with email only
        /*$this->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ],
            [
                'email.required' => 'Enter your email',
                'email.email' => 'Invalid email address',
                'email.exists' => 'This email is not registered in the database',
                'password.required' => 'Password is required'

            ]
        );
        $creds = array('email' => $this->email, 'password' => $this->password);

        if (Auth::guard('web')->attempt($creds)) {
            $checkUser = User::where('email', $this->email)->first();
            if ($checkUser->blocked == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Your account had been blocked');
            } else {
                return redirect()->route('author.home');
            }
        } else {
            Session()->flash('fail', 'Incorrect email or password');
        }
        */
    }
    public function render()
    {
        return view('livewire.author-login-form');
    }

}
