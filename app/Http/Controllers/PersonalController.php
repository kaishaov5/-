<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    //个人中心首页
    public function index(Request $request){
        $user = User::findOrFail($request->id);

        return view('home.personal.benren',compact('user'));
    }

    //渲染个人中心修改密码页面
    public function password(Request $request){
        //如果不是本人防止进入
        if($request->id != Auth::id()){
            return back();
        }

        $user = User::findOrFail($request->id);

        return view('home.personal.password',compact('user'));
    }

    //验证旧密码
    public function changePassword(Request $request){
        if(Hash::check($request->oldpassword,Auth::user()->password)){
            return 'ok';
        }else{
            return 'no';
        }
    }

    //执行修改个人密码
    public function updatePassword(Request $request){
        if(User::findOrFail(Auth::id())->update(['password'=>bcrypt($request->newPassword)])){
            Auth::logout();
            return redirect('/login');
        }else{
            echo "<script>alert('请修改密码失败');location.href='/personal/password/".Auth::id()."'</script>";
        }
    }

}
