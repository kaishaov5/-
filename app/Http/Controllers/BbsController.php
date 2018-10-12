<?php

namespace App\Http\Controllers;

use App\BbsCate;
use App\Post;
use App\Reply;
use Illuminate\Http\Request;

class BbsController extends Controller
{
	//论坛首页
    public function index(){

    	//查询所有的二级分类
    	$bbsCates = BbsCate::where('pid','!=',0)->get();

    	foreach($bbsCates as $k=>$bbsCate){

    		//最新帖子
    		$bbsCate['newPosts'] = Post::where('bbs_cate_id',$bbsCate->id)->orderBy('time','desc')->limit(6)->get();

    		//最热帖子
    		$bbsCate['hotPosts'] = Post::where('bbs_cate_id',$bbsCate->id)->orderBy('access_count','desc')->limit(3)->get();
    	}

    	return view('home.bbs.index',compact('bbsCates'));
    }

    //二级分类板块
    public function zicate(Request $request){
    	//查询出这个版块
    	$cate = BbsCate::findOrFail($request->id);

    	//遍历这个版块下面的帖子
    	$posts = Post::where('bbs_cate_id',$request->id)->orderBy('time','desc')->paginate(12);

    	//查询总帖数
    		$countPost = Post::where('bbs_cate_id',$request->id)->count();

    	//查询出今日发帖多少个
    		//1.先获取今日凌晨时间戳
    		$time = strtotime(date('Y-m-d'));

    		//2.查询这个版块下大于等于$time的帖子数量
    		$todyPost = Post::where('bbs_cate_id',$request->id)->where('time','>',$time)->count();

    	return view('home.bbs.zicate',compact('cate','posts','todyPost','countPost'));
    }

    //单独的帖子页面
    public function post(Request $request){
    	$post = Post::findOrFail($request->id);

    	$post->increment('access_count');

    	//查询这个帖子的所有回帖
    	$replies = Reply::where('pid',$request->id)->orderBy('time','asc')->paginate(10);

    	return view('home.bbs.post',compact('post','replies'));
    }

    //顶级分类版块
    public function fucate(Request $request){
    	//查询出当前这个顶级版块
    	$cate = BbsCate::findOrFail($request->id);

    	//如果不是顶级父类
    	if($cate->pid != 0){
    		return back();
    	}
    	//1.先获取今日凌晨时间戳(根据 这个查询今日帖)
    		$time = strtotime(date('Y-m-d'));

    	//查询这个顶级版块下面的版块
    	$zicates = BbsCate::where('pid',$request->id)->get();

    	foreach($zicates as $k=>$v){
    		$v['todyPost'] = Post::where('bbs_cate_id',$v->id)->where('time','>',$time)->count();

    		$v['countPost'] = Post::where('bbs_cate_id',$v->id)->count();

    		$posts = Post::where('bbs_cate_id',$v->id)->get();

    		$countReply = 0;
    		foreach($posts as $post){

    			$count = $post->replies->count();

    			$countReply += $count;

    		}

    		$v['countReply'] = $countReply+$v['countPost'];
    	}

    	//遍历这个版块下面的帖子
    	$posts = Post::where('bbs_cate_id',$request->id)->orderBy('time','desc')->paginate(12);

    	//查询总帖数
    		$countPost = Post::where('bbs_cate_id',$request->id)->count();

    	//查询出今日发帖多少个

    		//2.查询这个版块下大于等于$time的帖子数量
    		$todyPost = Post::where('bbs_cate_id',$request->id)->where('time','>',$time)->count();

    	return view('home.bbs.fucate',compact('cate','posts','countPost','todyPost','zicates'));
    }
}
