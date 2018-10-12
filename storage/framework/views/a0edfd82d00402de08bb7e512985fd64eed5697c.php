<?php $__env->startSection('personal'); ?>
<h2 style="text-align:center;margin-top:50px;">修改密码 <small>Change Password</small></h2>

<form class="form-horizontal" style="margin-top:50px;" action="<?php echo e(action('PersonalController@updatePassword')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

  <div class="form-group">
    <label for="oldPassword" class="col-sm-3 control-label">旧密码</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="oldPassword" placeholder="请输入您的旧密码" name="oldPassword">
    </div>
    <div class="col-sm-3 info">

    </div>
  </div>

  <div class="form-group" style="margin-top:25px;">
    <label for="newPassword" class="col-sm-3 control-label">新密码</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="newPassword" placeholder="请输入6-12位新密码" name="newPassword">
    </div>
    <div class="col-sm-3 info">

    </div>
  </div>

  <div class="form-group" style="margin-top:25px;">
    <label for="repeatNewPassword" class="col-sm-3 control-label">确认密码</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="repeatNewPassword" placeholder="请确认您的新密码" name="repeatNewPassword">
    </div>
    <div class="col-sm-3 info">

    </div>
  </div>

  <div class="form-group" style="margin-top:25px;">
    <div class="col-sm-offset-3 col-sm-9">
      <button id="save" type="submit" class="btn btn-default" disabled>保存</button>
    </div>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    var flag1 = false;
    var flag2 = false;
    var flag3 = false;

    //验证旧密码
    $('#oldPassword').blur(function(){
        var oldPassword = $(this).val();
        var _this = $(this);
        $.ajax({
            url:"<?php echo e(action('PersonalController@changePassword')); ?>",
            type:"post",
            data:{oldpassword:oldPassword},
            success:function(mes){
                if(mes=="ok"){
                    flag1 = true;
                    _this.parent('div').next().empty();
                    _this.parent('div').next().append('<span class="glyphicon glyphicon-ok" aria-hidden="true" style="margin-top:5px;"></span>');
                }else{
                    flag1 = false;
                    _this.parent('div').next().empty();
                    _this.parent('div').next().append('<span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top:5px;"></span>');
                }

                check();
            }
        });
    });

    //判断新密码
    $('#newPassword').blur(function(){
        var newPassword = $(this).val();

        if (/^[0-9a-zA-Z_]{6,15}$/.test(newPassword)){
            flag2 = true;
            $(this).parent('div').next().empty();
            $(this).parent('div').next().append('<span class="glyphicon glyphicon-ok" aria-hidden="true" style="margin-top:5px;"></span>');
        }else{
            flag3 = false;
            $(this).parent('div').next().empty();
            $(this).parent('div').next().append('<span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top:5px;"></span>');
        }

        check();

    });

    //判断新密码和确认密码是否一致
    $('#repeatNewPassword').blur(function(){
        var newPassword = $('#newPassword').val();
        var repeatNewPassword = $('#repeatNewPassword').val();

        if(newPassword == repeatNewPassword && repeatNewPassword != ''){
            flag3 = true;
            $(this).parent('div').next().empty();
            $(this).parent('div').next().append('<span class="glyphicon glyphicon-ok" aria-hidden="true" style="margin-top:5px;"></span>');
        }else{
            flag3 = false;
            $(this).parent('div').next().empty();
            $(this).parent('div').next().append('<span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top:5px;"></span>');
        }

        check();
    });

    //如果三个验证通过再启用按钮
    function check(){
        if(flag1 && flag2 && flag3){
            $('#save').removeAttr('disabled');
        }else{
            $('#save').attr('disabled',true);
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.personal.benren', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>