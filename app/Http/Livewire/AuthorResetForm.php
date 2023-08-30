<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class AuthorResetForm extends Component
{

    public $email, $token, $new_password, $confirm_new_password;
    public function mount()
    {
        $this->email=request()->email;
        $this->token = request()->token;
    }
    public function ResetHandler()
    {
        $this->validate(
            [
                'email'=>'required|email|exists:users,email',
                'new_password'=>'required|min:5',
                'confirm_new_password'=>'same:new_password',
            ],[
                'email.required'=>'The email address is required',
                'email.email'=>'Invalid email address',
                'email.exists'=>'This email is not registered',
                'new_password.required'=>'Enter new password',
                'new_password.min'=>'Minimum characters must be 5',
                'confirm_new_password'=>"The confirm password and new password do not match"
            ]);

            $check_token = DB::table('password_resets')->where(
                [
                    'email'=>$this->email,
                    'token'=>$this->token,
                ])->first();

                if($check_token){
                    Session()->flash('fail','Invalid Token');
                }else{
                    User::where('email',$this->email)->update(
                        [
                            'password'=>Hash::make($this->new_password)
                        ]);
                        DB::table('password_resets')->where(
                            [
                                'email'=>$this->email,
                            ]
                            )->delete();

                            $success_token = Str::random(64);
                            Session()->flash('Success','Password updated successfully. Login with your new password');
                        $this->redirectRoute('author.login',['tkn'=>$success_token,'UEmail'=>$this->email]);


                }
    }
    public function render()
    {
        return view('livewire.author-reset-form');
    }


}
