<?php $__env->startSection('css'); ?>
<style type="text/css">
    .panel{
        border-right:none;
        border:none;
        box-shadow:none;
    }
    .panel-heading{
        background-color:white !important;   
        border-bottom:none !important;
    }
    .container{
        /*border:1px solid red;*/
        margin-top:40px;
        margin-bottom:40px;
        position:relative;
    }
    .panel-body{

        margin-left:-220px;
        margin-right:120px;
    }
    #img{
        width:400px;
        position:absolute;
        right:0px;
        top:50px;
        z-index:1;
    }
    .inputre{
        width:400px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <img src="/home/images/logo1.jpg" id="img">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">传承注册</div> -->

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">用户名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="inputre form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">手机号</label>

                            <div class="col-md-6">
                                <input id="email" type="phone" class="inputre form-control" name="phone" value="<?php echo e(old('phone')); ?>" required>

                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="inputre form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">确认密码</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="inputre form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>