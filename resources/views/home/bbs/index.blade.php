@extends('layouts.home')

@section('title')
<title>传承论坛_传承资讯网</title>
@endsection

@section('css')
<!-- 论坛首页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/index.css">
@endsection

@section('content')
<!-- 6个框 -->
<div style="margin: auto;width: 1200px;margin-top:20px">
	@foreach($bbsCates as $k=>$bbsCate)
	<div class="main1 @if($k%3 == 0) main2 @endif">
        <div class="title-cut">
			<strong class="tt">
				<a href="" target="_blank">{{ $bbsCate->cate }}</a>
			</strong>

			<span class="link">
				<a target="_blank" href="{{ action('BbsController@zicate',$bbsCate->id) }}" style="color:#E00000">更多...</a>
			</span>
        </div>
        <div class="list16">
            <ul>
	            <li><b>热帖展示</b></li>
	            @foreach($bbsCate->hotPosts as $hotPosts)
	            <li><a href="">{{ $hotPosts->title }}</a></li>
	            @endforeach
	        </ul>
        </div>
		<div class="list16">
	        <ul>
	            <li><b>最新帖子</b></li>
	            @foreach($bbsCate->newPosts as $newPosts)
	            <li><a href="">{{ $newPosts->title }}</a></li>
	            @endforeach
			</ul>
    	</div>
	</div>
	@endforeach
</div>
@endsection