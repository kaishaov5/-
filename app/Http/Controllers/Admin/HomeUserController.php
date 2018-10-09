<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeUserRequest;

class HomeUserController extends Controller
{
    public function index(){
        $homeUsers = User::get();
    	return view('admin.homeuser.index',compact('homeUsers'));
    }

    public function add(){
    	return view('admin.homeuser.add');
    }

    public function store(HomeUserRequest $request){
    	$homeUsers = User::create([
    		'name' => $request->name,
    		'password' => bcrypt($request->password)
    	]);

    	return redirect()->action('Admin\HomeUserController@index');
    }
}
