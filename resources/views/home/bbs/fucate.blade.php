@extends('layouts.home')

@section('title')
<title>{{$cate->cate}}[传承资讯网]</title>
@endsection

@section('css')
<!-- 论坛顶级分类页面样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/tz.css">
@endsection

@section('content')

<div id="bbs_con">
	<!--内容部分-->
	<div class="navigation">
		<div style="margin:0px 0 0 3px;float: left;width:1%;text-align: center; ">
			<img src="/home/images/Forum_nav.gif">
		</div>
		<div style="float: left;font-size: 14px;line-height: 25px ;height: 25px;">
			<a href="">传承资讯网交易在线</a> →
			<a href="{{ action('BbsController@fucate',$cate->id) }}">{{ $cate->cate }}</a> →
			<span>帖子列表</span>
		</div>
	</div>
	<br>

	<!-- 顶级分类下的子类模块 -->
	<div class="zxr">
		<b style="margin-left:10px;">{{ $cate->cate }}-论坛列表</b>
	</div>
	<div id="zicate">
		@foreach($zicates as $zicate)
		<div>
			<a href="{{ action('BbsController@zicate',$zicate->id) }}">{{ $zicate->cate }}</a>
			<div>
				今日帖：
				<font color="red">{{ $zicate->todyPost }}</font>
				主题帖：{{ $zicate->countPost }}
			</div>
			<div>
				发帖总数：{{ $zicate->countReply }}
			</div>
		</div>
		@endforeach
	</div>

	<!--在线人数-->
	<div class="zxr" style="margin-top:10px;">
		&nbsp;&nbsp;总帖数：{{ $countPost }}，今日贴子
		<b>
			<font color="red">{{ $todyPost }}</font>
		</b> 
		<span>
			<a href="">[详情列表]</a>
		</span>
	</div>

	<!--选项块-->
	<div class="plate">
		<a href="{{ action('PublishController@post',['id'=>$cate->id]) }}"><button class="btn btn-primary">发表帖子</button></a> 
	</div>

	<div class="mainbar4" id="boardmaster">
	  <div id="boardmanage">
	    <!-- <a href="" title="查看本版精华">
	      <font color="#FF0000">精华</font>
	    </a> | 
	    <a href="" title="查看本版在线详细情况">在线</a> | 
	    <a href="" title="查看本版事件">事件</a> |  
	    <a href="" title="查看本版用户组权限">权限</a>  | 
	    <a href="">管理</a> | 
	    <a href="" title="进入审核管理页面">审核</a> -->
	  </div>
	  <div>
	  	<b style="padding-left:3px;">>> {{ $cate->cate }}</b>
	  </div>
	</div>

	<!--表格-->
	<div name="batch" style="float:left;width:100%;">

		<!--表格标题-->
		<div class="th">
			<div class="list_r">
				<div class="list1" style="width:80px;">作 者</div>
				<div class="list1" style="width:50px;">回复</div>
				<div class="list1" style="width:50px;">人气</div>最后更新
			</div>
			<div class="list1">状态</div>
			<div>主 题</div>
		</div>

		<!--表格一行，一行的头是list-->
		@foreach($posts as $post)
		<div class="list">
			<div class="list_r1">
				<div class="list_a">
			    	<a href="" target="_blank">{{ $post->user->name }}</a>
				</div>
				<div class="list_c">{{ $post->replies->count('id') }}</div>
				<div class="list_c">{{ $post->access_count }}</div>
				<div class="list_t">
			    	<a href="">{{ date('Y-m-d H:i:s',$post->time) }}</a>
				</div>
				<font color="#FF0000">|</font>
				<a href="" target="_blank">{{ $post->user->name }}</a>
			</div>
			<div style="float:right;"> </div>
			<div class="list_s">
				<a href="" target="_blank">
			    	<img style="margin-top:5px" border="0" src="/home/images/ztop.gif">
				</a>
			</div>
			<div class="listtitle">
			  <a href="{{ action('BbsController@post',$post->id) }}" title="{{ $post->title }}">{{ $post->title }}</a> 
			</div>
		</div>
		@endforeach

		<!--按钮-->
		<div class="mainbar0" style="float:right;margin-top:-10px;">
			{!! $posts->links(('layouts.pagination')) !!}
		</div>
	</div>

</div>

@endsection