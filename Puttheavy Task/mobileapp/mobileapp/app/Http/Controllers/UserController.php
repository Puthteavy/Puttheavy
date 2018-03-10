<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
//        if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')]))
//        {
//            return redirect('dashboard');
//        }
//        return redirect()->back();
        
        $user = User::where('email',$request->input('email'))->first();
        if($user !=null)
        {

            if(Hash::check($request->input('password'), $user->password))
            {
                $request->session()->put('user', $user);
                return redirect('/dashboard');
            }
        }
        return redirect()->back();
    }

    public function postLogout(Request $request)
    {
        //Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
