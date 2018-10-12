<?php $__env->startSection('title'); ?>
<title>传承论坛_传承资讯网</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- 论坛首页样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/index.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- 6个框 -->
<div style="margin: auto;width: 1200px;margin-top:20px">
	<?php $__currentLoopData = $bbsCates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$bbsCate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="main1 <?php if($k%3 == 0): ?> main2 <?php endif; ?>">
        <div class="title-cut">
			<strong class="tt">
				<a href="" target="_blank"><?php echo e($bbsCate->cate); ?></a>
			</strong>

			<span class="link">
				<a target="_blank" href="<?php echo e(action('BbsController@zicate',$bbsCate->id)); ?>" style="color:#E00000">更多...</a>
			</span>
        </div>
        <div class="list16">
            <ul>
	            <li><b>热帖展示</b></li>
	            <?php $__currentLoopData = $bbsCate->hotPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <li><a href=""><?php echo e($hotPosts->title); ?></a></li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </ul>
        </div>
		<div class="list16">
	        <ul>
	            <li><b>最新帖子</b></li>
	            <?php $__currentLoopData = $bbsCate->newPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <li><a href=""><?php echo e($newPosts->title); ?></a></li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
    	</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>