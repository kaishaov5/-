<?php $__env->startSection('content'); ?>
<div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>修改 <small>帖子</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="<?php echo e(action('Admin\PostController@update')); ?>" method="POST" class="form-horizontal form-label-left" novalidate>
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="id" value="<?php echo e($post->id); ?>">
              <p>请输入 <code>修改帖子</code> 的相关信息
              </p>
              <span class="section">Post Info</span>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">帖子标题 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="title" class="form-control col-md-7 col-xs-12" name="title" value="<?php echo e($post->title); ?>" required="required" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">所属分类</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="bbs_cate_id">
                    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cate->id); ?>" <?php if($post->bbs_cate_id == $cate->id): ?> selected <?php endif; ?>><?php echo e($cate->cate); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                  <button id="send" type="submit" class="btn btn-success">提交</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src='/wangeditor/wangEditor.min.js'></script>
<script src="/admins/vendors/validator/validator.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>