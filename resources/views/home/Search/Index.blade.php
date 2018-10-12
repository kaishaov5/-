@extends('layouts.home')

@section('css')

<link rel="stylesheet" type="text/css" href="/home/css/search.css">

@endsection

@section('content')

<div id="s-contoiner">

	<!-- 帖子部分 -->
	<div class="s-head">
		<span class="s-head-a">资讯帖子</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>

	<div id="s-detail">
		<!-- 一侧可以容纳条帖子 -->
		@if($post->count() > 0)
			<div class="s-detail">
				@foreach($post as $k=>$v)
				<div class="s-detail-line">
					<div class="s-post-img">
						<a href="">
							<img src="/home/images/folder.gif">
						</a>
					</div>
					<div class="s-post-title">
						<a href="/bbs/post/{{$v->id}}.html">{{$v->title}}</a>
					</div>
					<div class="s-detail-d">
						<span>
							回复 : {{$v->replies->count()}}
						</span>
						<span>
							热度 : {{$v->access_count}}
						</span>
					</div>
					<div class="s-time">
						{{$v->created_at}}
					</div>
					<div class="s-post-auth">
						<a href="/personal/{{$v->user->id}}">作者 ： {{$v->user->name}}</a>
					</div>
				</div>	
				@endforeach
			</div>
		@else
			<div class="s-nopost">
				暂无相关帖子~
			</div>
		@endif
	</div>

	<!-- 文章部分 -->
	<div class="s-head">
		<span class="s-head-a">资讯文章</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>

	<div id="s-detail">
		<!-- 一侧可以容纳条帖子 -->
		@if($article->count() > 0)
			<div class="s-detail">
				@foreach($article as $k=>$v)
				<div class="s-detail-line">
					<div class="s-post-img" >
						<a href="/cate/{{$v->cate->id}}.html" style="color:red"> 
							{{$v->cate->cate}}
						</a>
					</div>
					<div class="s-post-title">
						<a href="/article/{{$v->id}}.html">{{$v->title}}</a>
					</div>
					<div class="s-detail-d">
						<span>
							评论数量 : {{$v->comments->count()}}
						</span>
						<span>
							阅读量 : {{$v->access_count}}
						</span>
					</div>
					<div class="s-time">
						{{$v->created_at}}
					</div>
					<div class="s-post-auth">
						<a href="/personal/{{$v->user->id}}">作者 ： {{$v->user->name}}</a>
					</div>
				</div>	
				@endforeach
			</div>
		@else
			<div class="s-nopost">
				暂无相关文章~
			</div>
		@endif
	</div>


	<!-- 用户部分 -->
	<div class="s-head">
		<span class="s-head-a">用户</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>


	<div class="s-detail">
		@if($user -> count() > 0)
			@foreach($user as $k => $v)
			<div class="s-user">
				<div class="s-user-img">
					<a href="/personal/{{$v->id}}">
						<img src="/home/images/login.jpg">
					</a>
				</div>
				<div class="s-user-detail">
					<div class="s-user-name">
						<a href="/personal/{{$v->id}}">{{$v->name}}</a>
					</div>
					<div>
						个人主页
					</div>
				</div>
			</div>
			@endforeach
		@else
		<div class="s-nopost">
			暂无相关用户~
		</div>
		@endif
	</div>

</div>

@endsection