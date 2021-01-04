<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;

class HomeController extends Controller
{
    public function GetAllProjectByUserId($UserId){
        $project = project::where('UserId','=',$UserId)->get();
        return View('home',['project'=>$project]);
    }

}
