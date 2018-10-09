<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(Request $request){

        if(Auth::id() == $request->id){
            echo "本人";
        }else{
            echo "他人";
        }

    }
}
