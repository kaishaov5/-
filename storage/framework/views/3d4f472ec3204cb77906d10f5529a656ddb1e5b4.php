<?php $__env->startSection('title'); ?>
<title><?php echo e($cate->cate); ?>[传承资讯网]</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- 论坛子类页面样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/tz.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="bbs_con">
	<!--内容部分-->
	<div class="navigation">
		<div style="margin:0px 0 0 3px;float: left;width:1%;text-align: center; ">
			<img src="/home/images/Forum_nav.gif">
		</div>
		<div style="float: left;font-size: 14px;line-height: 25px ;height: 25px;">
			<a href="">传承资讯网交易在线</a> →
			<a href="<?php echo e(action('BbsController@fucate',getBbsCate($cate->pid)->id)); ?>"><?php echo e(getBbsCate($cate->pid)->cate); ?> </a>→
			<a href="<?php echo e(action('BbsController@zicate',$cate->id)); ?>"><?php echo e($cate->cate); ?></a>
		</div>
	</div>
	<br>

	<!--在线人数-->
	<div class="zxr">
		&nbsp;&nbsp;总帖数：<?php echo e($countPost); ?>，今日贴子
		<b>
			<font color="red"><?php echo e($todyPost); ?></font>
		</b> 
		<span>
			<a href="">[详情列表]</a>
		</span>
	</div>

	<!--选项块-->
	<div class="plate">
		<a href="<?php echo e(action('PublishController@post',['id'=>$cate->id])); ?>"><button class="btn btn-primary">发表帖子</button></a> 
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
	  	<b style="padding-left:3px;">>> <?php echo e($cate->cate); ?></b>
	  </div>
	</div>

	<!--表格-->
	<div name="batch">

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
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="list">
			<div class="list_r1">
				<div class="list_a">
			    	<a href="" target="_blank"><?php echo e($post->user->name); ?></a>
				</div>
				<div class="list_c"><?php echo e($post->replies->count()); ?></div>
				<div class="list_c"><?php echo e($post->access_count); ?></div>
				<div class="list_t">
			    	<a href=""><?php echo e(date('Y-m-d H:i:s',$post->time)); ?></a>
				</div>
				<font color="#FF0000">|</font>
				<a href="" target="_blank"><?php echo e($post->user->name); ?></a>
			</div>
			<div style="float:right;"> </div>
			<div class="list_s">
				<a href="" target="_blank">
			    	<img style="margin-top:5px" border="0" src="/home/images/ztop.gif">
				</a>
			</div>
			<div class="listtitle">
			  <a href="<?php echo e(action('BbsController@post',$post->id)); ?>" title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></a> 
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<!--按钮-->
		<div class="mainbar0" style="float:right;margin-top:-10px;">
			<?php echo $posts->links(('layouts.pagination')); ?>

		</div>
	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>