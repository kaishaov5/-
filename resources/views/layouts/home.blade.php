<!DOCTYPE html>
<html>
<head>
@section('title')

@show
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="/home/bootstrap/css/bootstrap.min.css">

<!-- 公共样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/css.css">

<!-- 搜索下拉显示样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/searchview.css">

</head>

@section('css')

@show

<body>
<!--头部-->
  <div class="toolbar">
    <div class="toolbar_center">
      <div class="toolbar_site fl">
        <span class="toolbar_down">
          <a href="https://www.1980cang.com/">传承网</a>
        </span>
     </div>
     <!-- <div class="toolbar_mobile fr">
       <span class="toolbar_down"><i></i><a>手机传承</a></span>
       <div class="toolbar_down_box" style="display: none;">
          扫一扫，传承微信订阅号
          <i></i>
          <span>每天发送收藏资讯随时随地上传鉴定</span>
          <em></em>
       </div>
     </div> -->
     <!-- <div class="toolbar_mobile_a fr">
        <span class="toolbar_down_a"><i></i><a>上传鉴定</a></span>
        <div class="toolbar_down_box_a" style="display: none;">
          扫一扫，传承微信订阅号
          <i></i>
          <span>扫一扫一键上传藏品拍卖、开店、鉴定。</span>
          <em></em>
        </div>
     </div> -->
     <div style="margin-right:5px;" class="fr login">
        <a href="/login">
          <span class="toolbar_no">
            <i></i>
            登录
          </span>
        </a>
     </div>

     <div style="margin-right:5px" class="fr login">
       <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
     </div>
  </div>
</div>

<!--搜索条-->
  <div class="head">
    <div class="head_center">
      <a style="background-image:url('{{ $config->logo }}')" href="https://www.1980cang.com/" target="_blank" class="head_logo fl"></a>
      <div style="width:610px;height:90px;margin-left:60px;" class="head_search_c fl">
        <div class="head_search fl">
           <div id="bdcs" style="position:relative">
             <div class="bdcs-container"> 
                 <div class="bdcs-main bdcs-clearfix" id="default-searchbox">      
                   <div class="bdcs-search bdcs-clearfix" id="bdcs-search-inline">          
                     <form action="/search" method="get" class="bdcs-search-form" id="bdcs-search-form">                                                                       
                       <input type="text" name="q" class="bdcs-search-form-input" id="bdcs-search-form-input" placeholder="请输入关键词搜索" autocomplete="off" style="height: 38px; line-height: 38px;border-right:1px solid red">              
                       <input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" style="width:0px;" value="搜索"> 
                    </form>
                   </div>
                </div>                           
             </div>
            <!-- 搜索下拉显示部分 -->
            <div id="searchview">
                <!-- 文章 -->
                <div> 
                    <div class="search-son">
                      <span class="searchTitle">文章</span>
                    </div>

                    <div class="search">
                      <div>很抱歉没有找到相关文章，点击搜索试一试</div>
                    </div>
                </div>
                <!-- 帖子 -->
                <div>
                  <div class="search-son">
                    <span class="searchTitle">帖子</span>
                  </div>

                  <div class="search">
                    <div>很抱歉没有找到相关帖子，点击搜索试一试</div>
                  </div>

                </div>
                <!-- 用户 -->
                <div>

                  <div class="search-son">
                    <span class="searchTitle">用户</span>
                  </div>

                  <div class="search">
                    <div>很抱歉没有找到相关用户，点击搜索试一试</div>
                  </div>

                </div>
            </div>

          </div>
        </div>
 <div class="head_hot fl">
  <span>热门搜索：</span>
    <a href="https://www.1980cang.com/list-4928.html" target="_blank">硬币</a>
    <a href="https://www.1980cang.com/list-6.html" target="_blank">纪念钞</a>
    <a href="https://www.1980cang.com/list-40.html" target="_blank">人民币</a>
    <a href="https://www.1980cang.com/list-156.html" target="_blank">纪念币</a>
    <a href="https://www.1980cang.com/list-165.html" target="_blank">金银币</a>
    <a href="https://www.1980cang.com/list-4.html" target="_blank">第二版人民币</a>
 </div> 
</div>
 <div id="A1" class="fr" style="width:250px;height:80px;border:1px solid #ccc;margin-top:6px;">
   <a target="_blank" href="https://www.1980cang.com/list-593.html">
     <img src="/home/images/ping.gif" alt="">
   </a>
 </div>

 </div>
</div>

<!--项目栏-->
<div class="nav">
  <div class="nav_center">
    <a href="/" class="on">首页</a>
    <a href="{{ action('BbsController@index') }}" target="_blank">论坛</a>
    @if(Auth::check() && Auth::id())
    <a href="{{ action('PersonalController@index',Auth::id()) }}">个人中心</a>
    @endif
  </div>
</div>

<!--广告位-->
<div style="height: 100px;width: 1200px;margin:0 auto 10px;">
    <a href=""><img src="/home/images/gtb.jpg"></a>
</div>

@yield('content')


@section('friendlink')

@show

   <!--底部-->
<div class="foot con">
  <div class="foot_instr">
    <dl>
      <dt class="luan">购物指南</dt>
      <dd><a href="http://www.1980cang.com/index.php?controller=site&action=help&id=57" title="购物流程" target="_blank">购物流程</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=56" title="会员介绍" target="_blank"> 会员介绍</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=55" title="常见问题" target="_blank"> 常见问题</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=54" title="诚征精英" target="_blank"> 诚征精英 </a></dd>
    </dl>
    <dl>
      <dt class="luan">配送方式</dt>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=60" title="上门自取" target="_blank"> 上门自取 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=68" title="传承直送" target="_blank">传承直送</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=59" title="物流配送" target="_blank"> 物流配送 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=58" title="特快专递" target="_blank"> 特快专递 </a></dd>
    </dl>
    <dl>
      <dt class="luan">支付方式</dt>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=69" title="货到付款" target="_blank"> 货到付款 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=62" title="在线支付" target="_blank">在线支付 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=61" title="公司转账" target="_blank"> 公司转账 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=70" title="发票制度" target="_blank"> 发票制度</a></dd>
    </dl>
    <dl>
      <dt class="luan">售后服务</dt>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=66" title="退货换货" target="_blank"> 退货换货</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=65" title="藏品回收" target="_blank"> 藏品回收 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=64" title="价格说明" target="_blank"> 价格说明 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=63" title="退款说明" target="_blank"> 退款说明</a></dd>
    </dl>
    <dl>
      <dt class="luan">传承合作</dt>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=67" title="藏品代销" target="_blank"> 藏品代销 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=71" title="实体展厅" target="_blank"> 实体展厅 </a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=73" title="经营资质" target="_blank"> 经营资质</a></dd>
      <dd><a rel="nofollow" href="http://www.1980cang.com/index.php?controller=site&action=help&id=72" title="关于我们" target="_blank"> 关于我们</a></dd>
    </dl>
    <dl>
      <img src="/home/images/kf.jpg" width="200" height="120" style="margin-top: 50px;">
    </dl>
  </div>
  <div class="foot_about">
    北京传承辉煌文化发展有限公司  京ICP备14002988号
    <div class="foot_about_b">
      <img src="/home/images/footer1.jpg" alt="" height="40">
      <img src="/home/images/foot_zfb.jpg" alt="" height="40">
      <img src="/home/images/footer3.jpg" alt="" height="40">
      <img src="/home/images/ggt38.jpg" alt="" height="40">
      <img src="/home/images/ggt39.jpg" alt="" height="40">
      <img src="/home/images/364176588753289160.jpg" alt="" height="40">
    </div>
  </div>
</div>

<script type="text/javascript" src="/home/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/home/js/js.js"></script>

<script type="text/javascript" src="/home/js/search.js"></script>
@section('js')

@show
</body>
</html>
