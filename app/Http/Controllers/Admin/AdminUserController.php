<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;

class AdminUserController extends Controller
{
    public function index(){
    	$admins = Admin::get();
    	return view('admin.adminuser.index',compact('admins'));
    }

    public function add(){
    	return view('admin.adminuser.add');
    }

    public function store(AdminUserRequest $request){
    	$admins = Admin::create([
    		'name' => $request->name,
    		'password' => bcrypt($request->password)
    	]);

    	return redirect()->action('Admin\AdminUserController@index');
    }
}
