<?php $__env->startSection('title'); ?>
<title><?php echo e($user->name); ?>的个人中心_传承网</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- 个人中心样式 -->
<link rel="stylesheet" type="text/css" href="/home/css/personal/personal.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div id="personal_con">
        <!-- 左栏 -->
        <div id="personal_left">

            <!-- 头像框 -->
            <div class="personal_left_photo">
                <div>
                    <img src="/home/images/login.jpg" alt="">
                    <br>
                    <span><?php echo e($user->name); ?></span>
                </div>

                <div>
                    <div class="left_xk">
                        <span>我的信息</span>
                        <a href="#">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:5px;"></span>
                            基本信息
                        </a>
                        <?php if(Auth::id() == $user->id): ?>
                        <a href="<?php echo e(action('PersonalController@password',Auth::id())); ?>">
                            <span class="glyphicon glyphicon-wrench" aria-hidden="true" style="margin-right:5px;"></span>
                            修改密码
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="left_xk">
                        <span>我的动态</span>
                        <a href="#">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>
                            我的文章
                        </a>
                        <a href="#">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right:5px;"></span>
                            我的帖子
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 右栏 -->
        <div id="personal_right">
            <?php $__env->startSection('personal'); ?>

            <?php echo $__env->yieldSection(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>