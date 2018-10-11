<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Post;


class SearchController extends Controller
{
    //搜索下拉框
    public function search(Request $request) {
    	// echo $request['content'];
    	$content = $request['content'];
    	$article = Article::where('title','like','%'.$content.'%')->with('user')->limit(3)->get()->toArray();
    	$post = Post::where('title','like','%'.$content.'%')->with('user')->limit(3)->get()->toArray();
    	$user = User::where('name','like','%'.$content.'%')->limit(3)->get()->toArray();

    	$res['article'] = $article;
    	$res['post'] = $post;
    	$res['user'] = $user;

    	return $res;

    }

    //搜索主页面
    public function index(Request $request) {

    	// dump($request->all());
    	return view('home.Search.Index');
    }
}
