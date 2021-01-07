<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function showRegister(){
        return view('auth.register');
    }

    function doRegister(Request $request){

        /* Validasi form. */
        $this->validate($request, ['Email' => 'required|email','Name' => 'required|min:4|max:255', 'Username' => 'required|min:4|max:255', 'Password' => 'required|min:4|max:255', 'ConfirmPassword' => 'required|min:4|max:255',]);

        $pass = $request->Password;
        $pass2 = $request->ConfirmPassword;

        if($pass == $pass2){

            if($request->agreement != null){

                $user = new User();
                $user->email = $request->Email;
                $user->name = $request->Name;
                $user->username = $request->Username;
                $user->password = Hash::make($request->Password);
                $user->role = "Member";
                $user->save();

                return redirect(url('/login'));
            }

        }

        return redirect(url('/register'));

    }

    function showLogin(){
        return view('auth.login');
    }

    function doLogin(Request $request){


        $credential = $request->only('email', 'password');
        $return = "";
        if($request->remember != null){
            Auth::attempt($credential, true);

            $minute = 60;
            $rememberToken = Auth::getRecallerName();

            Cookie::queue($rememberToken, Cookie::get($rememberToken), $minute);

        }
        else{
            Auth::attempt($credential);
        }
        
        if(Auth::user() == null){
            $return = "/login";
            
        }
        else{
            $return ="/home/".Auth::user()->id;
        }
        return redirect($return);
    
    }

    function doLogout(){

        Auth::logout();

        return redirect('/login');


    }

   

}
