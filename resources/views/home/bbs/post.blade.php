@extends('layouts.home')

@section('title')
<title>传承论坛_传承资讯网</title>
@endsection

@section('css')
<!-- 论坛帖子页面样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/ht.css">
@endsection

@section('content')

<div class="htbox">
	<!--内容部分-->
	<div class="navigation">
	    <div style="margin:8px 0 0 3px;float: left;width:1%;text-align: center; ">
	    	<img src="/home/images/Forum_nav.gif">
	    </div>
	    <div style="float: left;font-size: 14px;line-height: 25px ;height: 25px;">
	    	<a href="https://www.1980cang.com/list-16.html">传承资讯网交易在线 </a>→
	    	@if($post->cate->pid == 0)
	    		<a href="{{ action('BbsController@fucate',$post->cate->id) }}">{{ $post->cate->cate }}</a> →
	    	@else
	    		<a href="{{ action('BbsController@fucate',getBbsCate($post->cate->pid)->id) }}">{{ getBbsCate($post->cate->pid)->cate }} </a> →
				<a href="">{{ $post->cate->cate }}</a> →
	    	@endif
			<span>{{ $post->title }}</span>
	    </div>
	</div>

	<!--项目栏-->  
	<div class="xml">
		<div class="xmll">
			<a href="{{ action('PublishController@post',['id'=>$post->cate->id]) }}"><button class="btn btn-primary">发表帖子</button></a>
			<a href="{{ action('PublishController@reply',$post->id) }}"><button class="btn btn-danger">回复帖子</button></a>
		</div>
		<div class="xmlr">
		   	<p>
		    	您是本帖的第 <span>{{ $post->access_count }}</span> 个阅读者
		   	</p>
		</div>
	</div>

	<!--回复框-->
	<div class="hfkt">
		<div class="hfktl">
			标题：<span>{{ $post->title }}</span>
		</div>
		<div class="hfktr">
		</div>
	</div>

	<!--楼主-->
	@if($replies->currentPage() <= 1)
   	<div class="hfk">
		<div class="hfkl">
			<div class="hfklt">
				<div class="hfklt-l">
					{{ $post->user->name }}
				</div>
				<div class="hfklt-r">
					<img src="/home/images/ofMale.gif" />
				</div>
			</div>
			<div>
				<img src="/home/images/20162131652355469.gif"  width="90" height="90"/>
			</div>
			<div>交易等级：网信通第2年</div>
			<div>信用积分：2834</div>
			<div>评分次数：219</div>
			<div>发贴次数：52203</div>
			<div>发帖积分：115152</div>
			<div>注册日期：2011年6月21日</div>
		</div>
		<div class="hfkr">
			<div style="height:21px;">
				<ul>
					<li>
						<a href="">
							<img src="/home/images/vote.jpg" />
							<span style="text-align: left;">评分</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/alipay_s.jpg" />
							<span style="text-align: left;">交易</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/email.jpg" />
							<span style="text-align: left;">邮箱</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/view.gif" />
							<span style="text-align: left;">查看</span>
						</a>
					</li>
				</ul>
				<div style="float:right;"><font color="red">楼主</font></div>
			</div>
			<hr style="border-top: #6595d6 1px solid;width: 100%;height:0px;margin:0px" />
			<div style="min-height:200px;font-size:9pt;line-height:normal;text-indent:24px;margin-top:10px;word-wrap : break-word ;word-break : break-all ;" onload="this.style.overflowX='auto';">
				{!! $post->content->content !!}
			</div>
			<div style="width:100%;overflow: hidden;">
			   <img src="/home/images/sigline.gif"><br>
			   认证员注：交易级别有效期至2018年11月13日。<br>
			   姓名:***（已通过身份核查，号码一致，照片一致）<br>
			   地址:&nbsp;&nbsp;四川省南充市顺庆区花市街48号 南充日报社&nbsp;&nbsp;邮编: 637000<br>
			   电话: (0817)2693770&nbsp;&nbsp; 手机: 15309074933<br>
			   四川南充市顺庆区工行茧市街***&nbsp;&nbsp; *** <br>
			   四川南充市顺庆区建设银行：6214 9936 7013 0504&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
			   邮政储蓄银行涪江路支行：6217 9867 3000 0622 864&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
			   四川南充市商业银行（天府银行）：6230720110220007200&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
			   四川省农村信用社（农商银行）：623201 1184000147464&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***<br>
			   QQ：******21013
			</div>
		</div>
   	</div>
   	@endif

   	<!-- 底部时间 -->
	<div class="hfkbott">
		<div class="hfkbottl">
			<div style="float: left;">
				<img src="/home/images/ip.gif" style="margin: 4px;" alt="ip地址已设置保密">
			</div>
			{{ $post->created_at }}
		</div>
		<div class="hfkbottr">
			<div style="float:right;margin-right:5px;">
				<a href="#top"><img src="/home/images/p_up.gif" alt="" style="margin:4px;border:0px;"></a>
			</div>
			<div style="font-size: 12px;line-height: 28px;text-indent: 10px;">
			<a href="" target="_blank">
				<font color="#FF0000">交易频道不能正常使用解决方法</font>
			</a>
			</div>
		</div>
	</div>


	<!--回帖内容-->
	@foreach($replies as $k=>$reply)
   	<div @if($k%2==0) class="hfktow" @else class="hfk" @endif>
		<div class="hfkl">
			<div class="hfklt">
				<div class="hfklt-l">
				   {{ $reply->user->name }}
				</div>
				<div class="hfklt-r">
				   <img src="/home/images/ofMale.gif" />
				</div>
			</div>
			<div>
				<img src="/home/images/20162131652355469.gif"  width="90" height="90"/>
			</div>
			<div>交易等级：网信通第2年</div>
			<div>信用积分：2834</div>
			<div>评分次数：219</div>
			<div>发贴次数：52203</div>
			<div>发帖积分：115152</div>
			<div>注册日期：2011年6月21日</div>
		</div>
      <!--回复信息-->
		<div class="hfkr">
			<div style="height:21px;">
				<ul>
					<li>
						<a href="">
							<img src="/home/images/vote.jpg" />
							<span style="text-align: left;">评分</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/alipay_s.jpg" />
							<span style="text-align: left;">交易</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/email.jpg" />
							<span style="text-align: left;">邮箱</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="/home/images/view.gif" />
							<span style="text-align: left;">查看</span>
						</a>
					</li>
				</ul>
				<div style="float:right;"><font color="red">@if($replies->currentPage() <= 1){{ getLou($k+1) }}@else {{ getLou(($replies->currentPage()-1)*10+$k+1) }} @endif</font></div>
			</div>
        	<hr style="border-top: #6595d6 1px solid;width: 100%;height: 0px;margin:0px" />
	        <div style="min-height:200px;font-size:9pt;line-height:normal;text-indent:24px;margin-top:10px;word-wrap : break-word ;word-break : break-all ;" onload="this.style.overflowX='auto';">
	          {!! $reply->content->reply !!}
	        </div>
	        <div style="width:100%;overflow: hidden;">
	           <img src="/home/images/sigline.gif"><br>
	           认证员注：交易级别有效期至2018年11月13日。<br>
	           姓名:***（已通过身份核查，号码一致，照片一致）<br>
	           地址:&nbsp;&nbsp;四川省南充市顺庆区花市街48号 南充日报社&nbsp;&nbsp;邮编: 637000<br>
	           电话: (0817)2693770&nbsp;&nbsp; 手机: 15309074933<br>
	           四川南充市顺庆区工行茧市街***&nbsp;&nbsp; *** <br>
	           四川南充市顺庆区建设银行：6214 9936 7013 0504&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
	           邮政储蓄银行涪江路支行：6217 9867 3000 0622 864&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
	           四川南充市商业银行（天府银行）：6230720110220007200&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ***<br>
	           四川省农村信用社（农商银行）：623201 1184000147464&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***<br>
	           QQ：******21013
	        </div>
		</div>
   	</div>

	<div class="hfkbott">
		<div class="hfkbottl">
			<div style="float: left;">
				<img src="/home/images/ip.gif" style="margin: 4px;" alt="ip地址已设置保密">
			</div>
			{{ $reply->created_at }}
		</div>
		<div class="hfkbottr">
			<div style="float:right;margin-right:5px;">
				<a href="#top"><img src="/home/images/p_up.gif" alt="" style="margin:4px;border:0px;"></a>
			</div>
			<div style="font-size: 12px;line-height: 28px;text-indent: 10px;">
				<a href="" target="_blank">
					<font color="#FF0000">交易频道不能正常使用解决方法</font>
				</a>
			</div>
		</div>
	</div>
	@endforeach

	<!--按钮-->
	<div style="float:right;">
		{!! $replies->links(('layouts.pagination')) !!}
	</div>
</div>

@endsection