<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;


class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'reset password',
        ];
        return view('back.pages.auth.reset',$data)->with(['token'=>$token,'email'=>$request->email]);
    }

    public function changeProfilePicture(Request $request)
    {
        $user = User::find(auth('web')->id());
        dd($user);
        $path = 'back/dist/img/authors/';
        $file = $request->file('file');
        //$old_picture = \Illuminate\Support\Str::of($user->getAttribute('picture'))->basename();
        $old_picture = $user->getAttribute()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'IAMG'.$user->id.time().rand(1,100000).'jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
           File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path),$new_picture_name);
        if ($upload) {
            $user->update(
                [
                    'picture'=>$new_picture_name
                ]);
                return response()->json(['status'=>1, 'msg'=>'Your profile picture has been updated']);
        }else{
            return response()->json(['status'=>0, 'msg'=>'Error while updating profile picture.']);

        }
    }

}
