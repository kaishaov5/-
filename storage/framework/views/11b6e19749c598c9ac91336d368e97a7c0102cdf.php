<?php $__env->startSection('content'); ?>
<div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>修改 <small>友情链接</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="<?php echo e(action('Admin\LinkController@update')); ?>" method="POST" class="form-horizontal form-label-left" novalidate>
              <?php echo e(csrf_field()); ?>

              <p>请输入 <code>修改友情链接</code> 的 <a href="form.html">信息</a>
              </p>
              <span class="section">Update Friend Link</span>
              <input type="hidden" name="id" value="<?php echo e($link->id); ?>">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">标题 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="title" class="form-control col-md-7 col-xs-12" name="title" value="<?php echo e($link->title); ?>" required="required" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">链接 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="url" class="form-control col-md-7 col-xs-12" name="url" value="<?php echo e($link->url); ?>" required="required" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">显示位置</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="status">
                    <option value="1" <?php if($link->status == 1): ?> selected <?php endif; ?>>首页</option>
                    <option value="2" <?php if($link->status == 2): ?> selected <?php endif; ?>>栏目</option>
                    <option value="3" <?php if($link->status == 3): ?> selected <?php endif; ?>>详情</option>
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
    <script src="/admins/vendors/validator/validator.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>