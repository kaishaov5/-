<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(Request $request){

        //判断点击进入个人中心的是本人还是他人
        if(Auth::id() == $request->id){
            return view('home.personal.benren');
        }else{

        }
    }
}
