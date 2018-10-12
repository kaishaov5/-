<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>浏览<small>前台用户</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          展示前台用户的所有信息
        </p>

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>用户名</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $homeUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($homeUser->id); ?></td>
                    <td><?php echo e($homeUser->name); ?></td>
                    <td>
                    	<input type="checkbox" class="js-switch" checked />
                    </td>
                    <td style="width:30%;">

                        <?php if($homeUser->articles->count() > 0): ?>
                    	<a href="<?php echo e(action('Admin\HomeUserController@article',$homeUser->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 查看文章 </a>
                        <?php endif; ?>

                        <?php if($homeUser->posts->count() > 0): ?>
                    	<a href="<?php echo e(action('Admin\HomeUserController@post',$homeUser->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>查看帖子 </a>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<!-- Switchery -->
<script src="/admins/vendors/switchery/dist/switchery.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>