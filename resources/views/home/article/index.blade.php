@extends('layouts.home')

@section('title')
<title>{{ $article->title }}</title>
@endsection

@section('css')
<!-- 文章详情页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/detail.css">
@endsection

@section('content')

<div id="detail_con">
    <!-- 左栏 -->
    <div id="detail_left">

        <!-- 导航图 -->
        <div class="detail_dh">
            <span>您的当前位置:</span>
            <a href="/"> 传承资讯首页</a>
            <span>></span>
            @if($article->cate->pid == 0)
            <a href="{{ action('CateController@index',$article->cate_id)}}"> {{ $article->cate->cate }}</a>
            <span>></span>
            @else
            <a href="{{ action('CateController@index',getCateName($article->cate->pid)->id)}}"> {{ getCateName($article->cate->pid)->cate }}</a>
            <span>></span>
            <a href="{{ action('CateController@index',$article->cate_id) }}"> {{ $article->cate->cate }}</a>
            <span>></span>
            @endif
        </div>

        <!-- 文章标题 -->
        <h1>{{ $article->title }}</h1>

        <!-- 文章信息 -->
        <div class="detail_detail">
            <div></div>
            <span>{{ date('Y-m-d',$article->time) }}</span>
            <div></div>
            <span>{{ $article->user->name }}</span>
            <div></div>
            <span>{{ $article->access_count }}浏览</span>
            @if(Auth::check() && $article->user_id == Auth::id())
            <div id="author">
                <a href="{{ action('PublishController@editArticle',$article->id) }}">编辑</a>
                <span>|</span>
                <a href="{{ action('PublishController@delArticle',$article->id) }}">删除</a>
            </div>
            @endif
        </div>

        <!-- 文章内容 -->
        <div class="detail_content">
            {!! $article->content->content !!}
        </div>

        @if(Auth::check() && Auth::user())
        <div id="plArticle">
            <div style="padding-left:20px">
                <div id="articleTitle">
                    <b>评论</b>
                </div>
                <form id="form" class="form-horizontal" action="{{ action('CommentArticleController@store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <div id='detail'></div>
                    <textarea id="text1" name='detail' style="width:100%; height:200px;display:none;"></textarea>
                    <button style="background-color:#7FB4CB;margin-top:10px;" type="submit" class="btn btn-info btn-block">确认提交</button>
                </form>
            </div>
        </div>
        @endif

        <div>
            @foreach($comments as $comment)
            <div class="plcontent">
                <div class="userinfo">
                    <b>{{ $comment->user->name }}</b>
                </div>
                <div class="usercontent">
                    {!! $comment->comment !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- 右栏 -->
    <div id="detail_right">
        <div class="xgwz">
            <div>
                <span></span>
                <h3>相关文章</h3>
                <span></span>
            </div>

            <ul>
                @foreach($xgArticles as $k=>$xgArticle)
                <a href="{{ action('ArticleController@index',$xgArticle->id) }}">
                    <li style="background-position:-384px {{ -182-($k*37) }}px">{{mb_substr($xgArticle->title,0,15,'utf-8').' · · ·'}}</li>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src='/wangeditor/plarticlewangEditor.min.js'></script>

<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
var E = window.wangEditor
var editor = new E('#detail')
var $text1 = $('#text1')
editor.customConfig.onchange = function (html) {

   $text1.val(html)
}
// 配置服务器端地址
editor.customConfig.uploadImgHeaders = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
}

editor.customConfig.uploadFileName = 'file[]'

editor.customConfig.uploadImgServer = '/commentArticle/uploadpic'

editor.customConfig.uploadImgHooks = {
    before: function (xhr, editor, files) {
        // 图片上传之前触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，files 是选择的图片文件

        // 如果返回的结果是 {prevent: true, msg: 'xxxx'} 则表示用户放弃上传
        // return {
        //     prevent: true,
        //     msg: '放弃上传'
        // }
    },
    success: function (xhr, editor, result) {
        // 图片上传并返回结果，图片插入成功之后触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
    },
    fail: function (xhr, editor, result) {
        console.log(result);
        // 图片上传并返回结果，但图片插入错误时触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
    },
    error: function (xhr, editor) {
        // 图片上传出错时触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
    },
    timeout: function (xhr, editor) {
        // 图片上传超时时触发
        // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
    },

    // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
    // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
    customInsert: function (insertImg, result, editor) {
        // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
        // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果

        // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
        var url = result.data
        $(url).each(function( key, val){
            insertImg(val)
        })

        // result 必须是一个 JSON 格式字符串！！！否则报错
    }
}


editor.create()
// 初始化 textarea 的值
$text1.val(' ')
</script>
@endsection