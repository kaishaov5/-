@extends('layouts.home')

@section('title')
<title>{{ $config->title }}</title>
<meta name='keywords' content="{{ $config->keywords }}">
<meta name='description' content='{{ $config->description }}'>
@endsection

@section('css')
<!-- 首页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/index.css">
@endsection

@section('content')

<!-- 横条 -->
@foreach($catehs as $cateh)
<!-- {{ $cateh->cate }} -->
<div class="box">
    <!--左侧-->
   	<div class="box-l">
       	<!--头-->
       	<div class="box-l-t">
			<h2 style="width:200px;height:61px;border-top: 3px solid red;text-align:center;line-height:60px;font-size:25px;display:inline-block;position: relative;float: left;margin-top:0px">
				<a href="{{ action('CateController@index',$cateh->id) }}" target="_blank">{{ $cateh->cate }}</a>
			</h2>
			<ul>
				@foreach($cateh->sub as $zicate)
				<li><a style="color:#989898;font-size:15px" href="{{ action('CateController@index',$zicate->id) }}" target="_blank">{{ $zicate->cate }}</a></li>
				@endforeach
			</ul>
       	</div>
       	<!--内容-->
       	<div class="box-l-b">
        	<!--图-->
	        <div class="box-l-bl">
	        	<div>
	        		<span class="ttt" style="margin-top:5px"></span>
	        		<b class="rw">最热资讯</b>
	        	</div>
	        	<!-- 最热资讯 -->
	        	@foreach($cateh->hotArticles as $k => $hotArticleh)
	        	<div style="float:left;margin-top:10px;">
	        		<div>
	        			<span class="@if($k==0) one @else fone @endif">{{ $k+1 }}</span>
	        			<a target="_blank" href="{{ action('ArticleController@index',$hotArticleh->id) }}" class="rwnr">{{mb_substr($hotArticleh->title,0,21,'utf-8').' · · ·'}}</a>
	        		</div>
	        	</div>
	        	@endforeach
	        </div>
           	<!--文字部分-->
           	<div class="box-l-br">
               	<div class="box-l-brt">
                   	<ul>
                       	<li><b>最新资讯</b></li>
                      	@foreach($cateh->newArticles as $newArticleh)
                       	<li>
                       		<div>
	                        	<a target="_blank" href="{{ action('ArticleController@index',$newArticleh->id) }}" class="cateDate">{{ mb_substr($newArticleh->title,0,25,'utf-8').' · · ·' }}</a>
                        	</div>
                       	</li>
                       	@endforeach
                   	</ul>
               	</div>
           	</div>
       	</div>
   	</div>
   	<!--右侧-->
   	<div class="box-r">
       	<div style="background-color: red; width: 100%; height: 100%;">
           	<a target="_blank" href="{{ action('CateController@index',$cateh->id) }}"><img src="{{ $cateh->catePic }}" width="300" height="490" ></a>
       	</div>
   	</div> 
</div>
@endforeach

<!-- 6个框 -->
<div style="margin: auto;width: 1200px;margin-top:20px">
	@foreach($catess as $k=>$cates)
	<div class="main1 @if($k%3 == 0) main2 @endif">
        <div class="title-cut">
			<strong class="tt">
				<a href="{{ action('CateController@index',$cates->id) }}" target="_blank">{{ $cates->cate }}</a>
			</strong>

			<span class="link">
				@foreach($cates->sub as $k=>$zicate)
				@if($k < 3)
				<a href="{{ action('CateController@index',$zicate->id) }}" target="_blank">{{ $zicate->cate }}</a>
				@endif
				@endforeach
			</span>
        </div>
        <div class="list16">
            <ul>
	            <li><b>热文展示</b></li>
	            @foreach($cates->hotArticles as $hotArticles)
	            <li><a href="">{{ $hotArticles->title }}</a></li>
	            @endforeach
	        </ul>
        </div>
		<div class="list16">
	        <ul>
	            <li><b>最新资讯</b></li>
	            @foreach($cates->newArticles as $newArticles)
	            <li><a href="{{ $newArticles->title }}"></a></li>
	            @endforeach
			</ul>
    	</div>

	</div>
	@endforeach
</div>
@endsection

@section('friendlink')
<div class="foot_link con">
	<div class="foot_link_con">
    	<span>友情链接</span><em>Friendly&nbsp;&nbsp;links</em>
    	@foreach($links as $link)
    	<a target="_blank" href="{{ $link->url }}">{{ $link->title }}</a>
    	@endforeach
	</div>
</div>
@endsection