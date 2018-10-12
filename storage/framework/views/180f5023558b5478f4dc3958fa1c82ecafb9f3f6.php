<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><?php echo e($cate->cate); ?><small>下所有帖子</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  展示<?php echo e($cate->cate); ?>下的所有帖子
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>所属作者</th>
                      <th>所属分类</th>
                      <th>标题</th>
                      <th>浏览量</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $cate->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($post->id); ?></td>
                          <td><?php echo e($post->user->name); ?></td>
                          <td><?php echo e($post->cate->cate); ?></td>
                          <td><?php echo e($post->title); ?></td>
                          <td><?php echo e($post->access_count); ?></td>
                          <td style="width:30%">
                            <a href="<?php echo e(action('Admin\PostController@detail',$post->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 查看详情 </a>
                            <a href="<?php echo e(action('Admin\PostController@edit',$post->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 修改 </a>
                            <a href="<?php echo e(action('Admin\PostController@delete',$post->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                            <?php if($post->replies->count('id') > 0): ?>
                              <a href="<?php echo e(action('Admin\PostController@reply',$post->id)); ?>" class="btn btn-warning btn-xs"><i class="fa fa-reply-all"> 查看回帖 </i></a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>