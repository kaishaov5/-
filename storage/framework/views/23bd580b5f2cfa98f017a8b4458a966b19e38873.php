<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><?php echo e($post->title); ?><small>所有回帖</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  展示该条帖子下的所有回帖
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>所属用户</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($reply->id); ?></td>
                          <td><?php echo e($reply->user->name); ?></td>
                          <td style="width:30%">
                            <a href="<?php echo e(action('Admin\PostController@replyDetail',$reply->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 查看内容 </a>
                            <a href="<?php echo e(action('Admin\PostController@replyDelete',$reply->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>