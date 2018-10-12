<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/x-admin/css/xadmin.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
      <div class="x_title">
        <h2>浏览<small>分类</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          展示所有分类列表
        </p>
		<table class="layui-table layui-form">
		    <thead>
		      <tr>
		        <th width="70">ID</th>
		        <th>栏目名</th>
		        <th>展示位置</th>
		        <th>分类图片</th>
		        <th>操作</th>
		      </tr>
		    </thead>
		    <tbody class="x-cate">

		    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr cate-id='<?php echo e($cate->id); ?>' fid='<?php echo e($cate->pid); ?>' >
			        <td><?php echo e($cate->id); ?></td>
			        <td>
			          <i class="layui-icon x-show" status='true'>&#xe623;</i>
			          <?php echo e($cate->cate); ?>

			        </td>
			        <td><?php if($cate->check == 0): ?> 横条 <?php else: ?> 竖条 <?php endif; ?></td>
			        <td style="text-align:center">
			        	<button type="button" name="button" img-src='<?php echo e($cate->catePic); ?>' class='btn btn-defaut btn-xs pigimg'>点击查看图片</button>
			        </td>
			        <td class="td-manage">
		            	<a href="<?php echo e(action('Admin\CateController@edit',['id'=>$cate->id])); ?>" class="layui-btn layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>编辑</a>
		            	<a href="<?php echo e(action('Admin\CateController@add',['id'=>$cate->id])); ?>" class="layui-btn layui-btn-warm layui-btn-xs" ><i class="layui-icon">&#xe642;</i>添加子分类</a>
		            	<button cate_id="<?php echo e($cate->id); ?>" class="layui-btn-danger layui-btn layui-btn-xs shanchu" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
		            	<?php if($cate->articles->count('id') > 0): ?>
		            	<a class="layui-btn-normal layui-btn layui-btn-xs" href="<?php echo e(action('Admin\CateController@articles',$cate->id)); ?>">查看文章</a>
		            	<?php endif; ?>
		            </td>
			    </tr>
			    <?php $__currentLoopData = $cate->sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <tr cate-id='<?php echo e($sub1->id); ?>' fid='<?php echo e($sub1->pid); ?>' >
				        <td><?php echo e($sub1->id); ?></td>
				        <td>
				          &nbsp;&nbsp;&nbsp;&nbsp;
				          <?php echo e($sub1->cate); ?>

				        </td>
				        <td><?php if($sub1->check == 0): ?> 横条 <?php else: ?> 竖条 <?php endif; ?></td>
				        <td style="text-align:center">
				        	<button type="button" name="button" img-src='<?php echo e($sub1->catePic); ?>' class='btn btn-defaut btn-xs pigimg'>点击查看图片</button>
				        </td>
				        <td class="td-manage">
			            	<a href="<?php echo e(action('Admin\CateController@edit',['id'=>$sub1->id])); ?>" class="layui-btn layui-btn layui-btn-xs"><i class="layui-icon">&#xe642;</i>编辑</a>
			            	<button cate_id="<?php echo e($sub1->id); ?>" class="layui-btn-danger layui-btn layui-btn-xs shanchu" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
			            	<?php if($sub1->articles->count('id') > 0): ?>
			            	<a class="layui-btn-normal layui-btn layui-btn-xs" href="<?php echo e(action('Admin\CateController@articles',$sub1->id)); ?>">查看文章</a>
			            	<?php endif; ?>
			            </td>
				    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </tbody>
		</table>
	  </div>
	</div>
</div>

<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;">
    <div id="innerdiv" style="position:absolute;">
        <img id="bigimg" style="border:5px solid #fff;" src="" />
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="/x-admin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/x-admin/js/xadmin.js"></script>
<script type="text/javascript">
//删除分类
$('.shanchu').click(function(){
    var id = $(this).attr('cate_id');
    var _this = $(this);
    layer.confirm('您确认删除该分类并且删除该分类下的所有文章？', {
        btn: ['确定','取消'] //按钮
    }, function(){

        $.ajax({
            url:"<?php echo e(action('Admin\CateController@chaxun')); ?>",
            data:{id:id},
            type:'get',
            success:function(mes){
                if(mes=='ok'){
                    $.ajax({
                        url:"<?php echo e(action('Admin\CateController@delete')); ?>",
                        data:{id:id},
                        type:'get'
                    });
                    _this.parents('tr').remove();
                    layer.msg('删除成功', {icon: 1});
                }else{
                    layer.msg('由于该分类下存在子类故不能删除', {icon: 2});
                }
            }
        });
    });
});
</script>
<!-- 点击查看分类图片 -->
<script type="text/javascript">

$(".pigimg").click(function(){
    var _this = $(this);
    imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
});

function imgShow(outerdiv, innerdiv, bigimg, _this){
    var src = _this.attr("img-src");
    $(bigimg).attr("src", src);


    $("<img/>").attr("src", src).load(function(){
        var windowW = $(window).width();
        var windowH = $(window).height();
        var realWidth = this.width;
        var realHeight = this.height;
        var imgWidth, imgHeight;
        var scale = 0.8;

        if(realHeight>windowH*scale) {
            imgHeight = windowH*scale;
            imgWidth = imgHeight/realHeight*realWidth;
            if(imgWidth>windowW*scale) {
                imgWidth = windowW*scale;
            }
        } else if(realWidth>windowW*scale) {
            imgWidth = windowW*scale;
                        imgHeight = imgWidth/realWidth*realHeight;
        } else {
            imgWidth = realWidth;
            imgHeight = realHeight;
        }
                $(bigimg).css("width",imgWidth);

        var w = (windowW-imgWidth)/2;
        var h = (windowH-imgHeight)/2;
        $(innerdiv).css({"top":h, "left":w});
        $(outerdiv).fadeIn("fast");
    });

    $(outerdiv).click(function(){
        $(this).fadeOut("fast");
    });
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>