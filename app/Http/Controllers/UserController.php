<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    function showMyProfile(){
        return view('myprofile');
    }

    function showChangePassword(){
        $message = false;
        return view('changepassword', [ 'Message' => $message]);
    }

    function showUpgrade(){
        return view('upgrade');
    }

    function doChangePassword(Request $request){

        $oldpass = $request->oldpassword;
        $pass1 = $request->newpassword;
        $pass2 = $request->confirmnewpassword;

        // echo  $oldpass."<br>";
        // echo $pass1."<br>";
        // echo $pass2."<br>";
        // echo Auth::user()->password."<br>";
        // die();


        if(Hash::check($oldpass, Auth::user()->password) != false &&  $pass1 == $pass2){
            $userid = Auth::user()->id;
            User::where('id','=',$userid)->update([
                'password' => Hash::make($pass1) 
            ]);
            
            return redirect()->back()->with('alert', 'Change Password Success!');
            
        }
        
        return redirect()->back()->with('alert', 'Change Password Failed!');
    }


}
