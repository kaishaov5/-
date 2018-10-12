<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>浏览<small>管理员</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  展示后台管理员所有信息
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>标题</th>
                      <th>链接</th>
                      <th>显示位置</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($link->id); ?></td>
                            <td><?php echo e($link->title); ?></td>
                            <td><a href="<?php echo e($link->url); ?>" target="_blank"><?php echo e($link->url); ?></a></td>
                            <td><?php if($link->status == 1): ?> 首页 <?php elseif($link->status == 2): ?> 栏目 <?php elseif($link->status ==3 ): ?> 详情 <?php endif; ?></td>
                            <td>
                              <a href="<?php echo e(action('Admin\LinkController@edit',$link->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 修改 </a>
                              <a href="<?php echo e(action('Admin\LinkController@delete',$link->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
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