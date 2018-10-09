<?php

namespace App\Http\Controllers;

use Auth;
use App\Cate;
use App\Link;
use App\Config;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
	//首页
    public function index(){
    	// 利用redis做一个缓存遍历分类及文章
		if(Redis::exists('catehs')){
            $catehs = unserialize(Redis::get('catehs'));
        }else{
        	//横条分类遍历
    		$catehs = getCateByPid(Cate::where('check',0)->get());

    		//横条下文章遍历
	    	foreach($catehs as $k=>$cate){
	    		$arr = [];
	    		array_push($arr,$cate->id);
	    		foreach(Cate::where('pid',$cate->id)->get() as $s_cate){
	    			array_push($arr,$s_cate->id);
	    		}

	    		//最新资讯
	    		$cate['newArticles'] = Article::whereIn('cate_id',$arr)->orderBy('time','desc')->limit(11)->get(); 

	    		//最热资讯
	    		$cate['hotArticles'] = Article::whereIn('cate_id',$arr)->orderBy('access_count','desc')->limit(12)->get();
	    	}

        	Redis::setex('catehs', 86400, serialize($catehs));
        }

        if(Redis::exists('catess')){
        	$catess = unserialize(Redis::get('catess'));
        }else{
        	//竖条分类遍历
    		$catess = getCateByPid(Cate::where('check',1)->get());

    		//竖条下文章遍历
	    	foreach($catess as $k=>$cate){
	    		$arr = [];
	    		array_push($arr,$cate->id);
	    		foreach(Cate::where('pid',$cate->id)->get() as $s_cate){
	    			array_push($arr,$s_cate->id);
	    		}

	    		//最新资讯
	    		$cate['newArticles'] = Article::whereIn('cate_id',$arr)->orderBy('time','desc')->limit(6)->get();

	    		//最热资讯
	    		$cate['hotArticles'] = Article::whereIn('cate_id',$arr)->orderBy('access_count','desc')->limit(3)->get();
	    	}

	    	Redis::setex('catess', 86400, serialize($catess));
        }

        //查询首页的友情链接
        $links = Link::where('status',1)->get();

        //查询网站配置
        $config = Config::first();

    	return view('home.index',compact('catehs','catess','links','config'));
    }
}