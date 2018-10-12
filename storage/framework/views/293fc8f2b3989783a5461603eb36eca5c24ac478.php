<?php $__env->startSection('title'); ?>
<title><?php echo e($config->title); ?></title>
<meta name='keywords' content="<?php echo e($config->keywords); ?>">
<meta name='description' content='<?php echo e($config->description); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- 首页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/index.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- 横条 -->
<?php $__currentLoopData = $catehs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cateh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- <?php echo e($cateh->cate); ?> -->
<div class="box">
    <!--左侧-->
   	<div class="box-l">
       	<!--头-->
       	<div class="box-l-t">
			<h2 style="width:200px;height:61px;border-top: 3px solid red;text-align:center;line-height:60px;font-size:25px;display:inline-block;position: relative;float: left;margin-top:0px">
				<a href="<?php echo e(action('CateController@index',$cateh->id)); ?>" target="_blank"><?php echo e($cateh->cate); ?></a>
			</h2>
			<ul>
				<?php $__currentLoopData = $cateh->sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zicate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><a style="color:#989898;font-size:15px" href="<?php echo e(action('CateController@index',$zicate->id)); ?>" target="_blank"><?php echo e($zicate->cate); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	        	<?php $__currentLoopData = $cateh->hotArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $hotArticleh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        	<div style="float:left;margin-top:10px;">
	        		<div>
	        			<span class="<?php if($k==0): ?> one <?php else: ?> fone <?php endif; ?>"><?php echo e($k+1); ?></span>
	        			<a target="_blank" href="<?php echo e(action('ArticleController@index',$hotArticleh->id)); ?>" class="rwnr"><?php echo e(mb_substr($hotArticleh->title,0,21,'utf-8').' · · ·'); ?></a>
	        		</div>
	        	</div>
	        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </div>
           	<!--文字部分-->
           	<div class="box-l-br">
               	<div class="box-l-brt">
                   	<ul>
                       	<li><b>最新资讯</b></li>
                      	<?php $__currentLoopData = $cateh->newArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newArticleh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       	<li>
                       		<div>
	                        	<a target="_blank" href="<?php echo e(action('ArticleController@index',$newArticleh->id)); ?>" class="cateDate"><?php echo e(mb_substr($newArticleh->title,0,25,'utf-8').' · · ·'); ?></a>
                        	</div>
                       	</li>
                       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   	</ul>
               	</div>
           	</div>
       	</div>
   	</div>
   	<!--右侧-->
   	<div class="box-r">
       	<div style="background-color: red; width: 100%; height: 100%;">
           	<a target="_blank" href="<?php echo e(action('CateController@index',$cateh->id)); ?>"><img src="<?php echo e($cateh->catePic); ?>" width="300" height="490" ></a>
       	</div>
   	</div> 
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- 6个框 -->
<div style="margin: auto;width: 1200px;margin-top:20px">
	<?php $__currentLoopData = $catess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$cates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="main1 <?php if($k%3 == 0): ?> main2 <?php endif; ?>">
        <div class="title-cut">
			<strong class="tt">
				<a href="<?php echo e(action('CateController@index',$cates->id)); ?>" target="_blank"><?php echo e($cates->cate); ?></a>
			</strong>

			<span class="link">
				<?php $__currentLoopData = $cates->sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$zicate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($k < 3): ?>
				<a href="<?php echo e(action('CateController@index',$zicate->id)); ?>" target="_blank"><?php echo e($zicate->cate); ?></a>
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</span>
        </div>
        <div class="list16">
            <ul>
	            <li><b>热文展示</b></li>
	            <?php $__currentLoopData = $cates->hotArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotArticles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <li><a href=""><?php echo e($hotArticles->title); ?></a></li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </ul>
        </div>
		<div class="list16">
	        <ul>
	            <li><b>最新资讯</b></li>
	            <?php $__currentLoopData = $cates->newArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newArticles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <li><a href="<?php echo e($newArticles->title); ?>"></a></li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
    	</div>

	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('friendlink'); ?>
<div class="foot_link con">
	<div class="foot_link_con">
    	<span>友情链接</span><em>Friendly&nbsp;&nbsp;links</em>
    	<?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<a target="_blank" href="<?php echo e($link->url); ?>"><?php echo e($link->title); ?></a>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>