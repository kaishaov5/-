<?php $__env->startSection('title'); ?>
<title><?php echo e(Auth::user()->name); ?>的个人中心_传承网</title>
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
                    <span><?php echo e(Auth::user()->name); ?></span>
                </div>

                <div>
                    
                </div>
            </div>
        </div>

        <!-- 右栏 -->
        <div id="personal_right">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>