<?php $__env->startSection('css'); ?>

<link rel="stylesheet" type="text/css" href="/home/css/search.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="s-contoiner">

	<!-- 帖子部分 -->
	<div class="s-head">
		<span class="s-head-a">资讯帖子</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>

	<div id="s-detail">
		<!-- 一侧可以容纳条帖子 -->
		<?php if($post->count() > 0): ?>
			<div class="s-detail">
				<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="s-detail-line">
					<div class="s-post-img">
						<a href="">
							<img src="/home/images/folder.gif">
						</a>
					</div>
					<div class="s-post-title">
						<a href="/bbs/post/<?php echo e($v->id); ?>.html"><?php echo e($v->title); ?></a>
					</div>
					<div class="s-detail-d">
						<span>
							回复 : <?php echo e($v->replies->count()); ?>

						</span>
						<span>
							热度 : <?php echo e($v->access_count); ?>

						</span>
					</div>
					<div class="s-time">
						<?php echo e($v->created_at); ?>

					</div>
					<div class="s-post-auth">
						<a href="/personal/<?php echo e($v->user->id); ?>">作者 ： <?php echo e($v->user->name); ?></a>
					</div>
				</div>	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php else: ?>
			<div class="s-nopost">
				暂无相关帖子~
			</div>
		<?php endif; ?>
	</div>

	<!-- 文章部分 -->
	<div class="s-head">
		<span class="s-head-a">资讯文章</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>

	<div id="s-detail">
		<!-- 一侧可以容纳条帖子 -->
		<?php if($article->count() > 0): ?>
			<div class="s-detail">
				<?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="s-detail-line">
					<div class="s-post-img" >
						<a href="/cate/<?php echo e($v->cate->id); ?>.html" style="color:red"> 
							<?php echo e($v->cate->cate); ?>

						</a>
					</div>
					<div class="s-post-title">
						<a href="/article/<?php echo e($v->id); ?>.html"><?php echo e($v->title); ?></a>
					</div>
					<div class="s-detail-d">
						<span>
							评论数量 : <?php echo e($v->comments->count()); ?>

						</span>
						<span>
							阅读量 : <?php echo e($v->access_count); ?>

						</span>
					</div>
					<div class="s-time">
						<?php echo e($v->created_at); ?>

					</div>
					<div class="s-post-auth">
						<a href="/personal/<?php echo e($v->user->id); ?>">作者 ： <?php echo e($v->user->name); ?></a>
					</div>
				</div>	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php else: ?>
			<div class="s-nopost">
				暂无相关文章~
			</div>
		<?php endif; ?>
	</div>


	<!-- 用户部分 -->
	<div class="s-head">
		<span class="s-head-a">用户</span>
		<span class="s-head-b"><a href="">更多</a></span>
	</div>


	<div class="s-detail">
		<?php if($user -> count() > 0): ?>
			<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="s-user">
				<div class="s-user-img">
					<a href="/personal/<?php echo e($v->id); ?>">
						<img src="/home/images/login.jpg">
					</a>
				</div>
				<div class="s-user-detail">
					<div class="s-user-name">
						<a href="/personal/<?php echo e($v->id); ?>"><?php echo e($v->name); ?></a>
					</div>
					<div>
						个人主页
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
		<div class="s-nopost">
			暂无相关用户~
		</div>
		<?php endif; ?>
	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>