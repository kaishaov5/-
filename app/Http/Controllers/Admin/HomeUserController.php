<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Post;
use App\Article;
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

    //前台用户发表的文章
    public function article(Request $request){

        //查询这个用户发布的文章
        $articles = Article::where('user_id',$request->id)->get();

        return view('admin.homeuser.article',compact('articles'));
    }

    //前台用户发表的帖子
    public function post(Request $request){

        //查询这个用户发布的帖子
        $posts = Post::where('user_id',$request->id)->get();

        return view('admin.homeuser.post',compact('posts'));
    }

}
