<?php $__env->startSection('title'); ?>
<title><?php echo e($article->title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- 文章详情页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/detail.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="detail_con">
    <!-- 左栏 -->
    <div id="detail_left">

        <!-- 导航图 -->
        <div class="detail_dh">
            <span>您的当前位置:</span>
            <a href="/"> 传承资讯首页</a>
            <span>></span>
            <?php if($article->cate->pid == 0): ?>
            <a href="<?php echo e(action('CateController@index',$article->cate_id)); ?>"> <?php echo e($article->cate->cate); ?></a>
            <span>></span>
            <?php else: ?>
            <a href="<?php echo e(action('CateController@index',getCateName($article->cate->pid)->id)); ?>"> <?php echo e(getCateName($article->cate->pid)->cate); ?></a>
            <span>></span>
            <a href="<?php echo e(action('CateController@index',$article->cate_id)); ?>"> <?php echo e($article->cate->cate); ?></a>
            <span>></span>
            <?php endif; ?>
        </div>

        <!-- 文章标题 -->
        <h1><?php echo e($article->title); ?></h1>

        <!-- 文章信息 -->
        <div class="detail_detail">
            <div></div>
            <span><?php echo e(date('Y-m-d',$article->time)); ?></span>
            <div></div>
            <span><?php echo e($article->user->name); ?></span>
            <div></div>
            <span><?php echo e($article->access_count); ?>浏览</span>
            <?php if(Auth::check() && $article->user_id == Auth::id()): ?>
            <div id="author">
                <a href="<?php echo e(action('PublishController@editArticle',$article->id)); ?>">编辑</a>
                <span>|</span>
                <a href="<?php echo e(action('PublishController@delArticle',$article->id)); ?>">删除</a>
            </div>
            <?php endif; ?>
        </div>

        <!-- 文章内容 -->
        <div class="detail_content">
            <?php echo $article->content->content; ?>

        </div>

        <?php if(Auth::check() && Auth::user()): ?>
        <div id="plArticle">
            <div style="padding-left:20px">
                <div id="articleTitle">
                    <b>评论</b>
                </div>
                <form id="form" class="form-horizontal" action="<?php echo e(action('CommentArticleController@store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="article_id" id="article_id" value="<?php echo e($article->id); ?>">
                    <div id='detail'></div>
                    <textarea id="text1" name='detail' style="width:100%; height:200px;display:none;"></textarea>
                    <button flag="1" style="background-color:#7FB4CB;margin-top:10px;" type="submit" class="btn btn-info btn-block" id="comment-commit">确认提交</button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <div id="comment-father">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="plcontent">
                <div class="userinfo">
                    <b><?php echo e($comment->user->name); ?></b>
                </div>
                <div class="usercontent">
                    <?php echo $comment->comment; ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $xgArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$xgArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(action('ArticleController@index',$xgArticle->id)); ?>">
                    <li style="background-position:-384px <?php echo e(-182-($k*37)); ?>px"><?php echo e(mb_substr($xgArticle->title,0,15,'utf-8').' · · ·'); ?></li>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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


//判断用户点击几次,同时利用ajax进行上传，直接操作DOM让评论在页面中显示出来
$('#comment-commit').click(function(){

    console.log($(this).attr('flag'));


    if($(this).attr('flag') == '0') {
        return false;
    }

    $(this).attr('flag','0');
    
    //获取评论的内容   
    var detail = $text1.val();
    //去除HTML标签方便判断
    var dd=detail.replace(/<\/?.+?>/g,"");
    var dds=dd.replace(/ /g,"");//dds为得到后的内容
    if(detail.length > 0 && dds.length != 0){
        if(detail.match(/^\s*$/)){
            alert('不能提交空的评论或只提交图片');
            $text1.val(' ');
            return false;
        }
    }else{
        alert('不能提交空的评论或只提交图片');
        $text1.val(' ');
        return false;
    }

    //获取文章的id
    var article_id = $('#article_id').val();

    $.ajax({  
        type : "POST",  //提交方式
        url : "/commentArticle/store",//路径
        data : {  
            "detail" : detail, 
            'article_id': article_id, 
        },//数据，这里使用的是Json格式进行传输  
        success : function(result) {
            if(result == '1'){
                $('#comment-father').prepend(`<div id="comment-father">
                    <div class="plcontent">
                        <div class="userinfo">
                            <b><?php echo e(Auth::user()->name); ?></b>
                        </div>
                        <div class="usercontent">
                            `+detail+`
                        </div>
                    </div>
                </div>`);
                $text1.val(' ');
                $('.w-e-text').empty();

                $('#comment-commit').attr('flag','1');
            }
        },

    })
    return false;
})



</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>