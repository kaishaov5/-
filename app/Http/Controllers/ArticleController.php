<?php

namespace App\Http\Controllers;

use App\Article;
use App\CommentArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	//详情页
    public function index(Request $request){

    	//查询点击进来的这篇文章
    	$article = Article::findOrFail($request->id);

    	//每浏览一次让这篇文章浏览量+1
    	$article->increment('access_count');

    	//查询和这篇文章分类相关的7篇文章
    	$xgArticles = Article::where('cate_id',$article->cate_id)->where('id','!=',$article->id)->limit(7)->get();

        //查询这篇文章的评论
        $comments = CommentArticle::where('article_id',$request->id)->orderBy('time','desc')->get();

    	return view('home.article.index',compact('article','xgArticles','comments'));
    }
}
