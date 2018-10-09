$(document).ready(function(){
$(".top_ad_btn").click(function(){
	$(".top_ad_btn").toggle();
	$(".top_ad_img").toggle();
});
$(".toolbar_site,.toolbar_new,.toolbar_service,.toolbar_mobile,.toolbar_my,.toolbar_order").mouseenter(function(){
	$(this).addClass('toolbar_box_hover');
	$(this).children("div.toolbar_down_box").show();
});
$(".toolbar_site,.toolbar_new,.toolbar_service,.toolbar_mobile,.toolbar_my,.toolbar_order").mouseleave(function(){
	$(this).removeClass('toolbar_box_hover');
	$(this).children("div.toolbar_down_box").hide();
});
$(".toolbar_site,.toolbar_new,.toolbar_service,.toolbar_mobile_a,.toolbar_my,.toolbar_order").mouseenter(function(){
	$(this).addClass('toolbar_box_hover');
	$(this).children("div.toolbar_down_box_a").show();
});
$(".toolbar_site,.toolbar_new,.toolbar_service,.toolbar_mobile_a,.toolbar_my,.toolbar_order").mouseleave(function(){
	$(this).removeClass('toolbar_box_hover');
	$(this).children("div.toolbar_down_box_a").hide();
});
$(".toolbar_site em,.toolbar_mobile em").click(function(){
	$(this).parent().parent().removeClass('toolbar_box_hover');
	$(this).parent().hide();
});

	
	$(".nav_center a").mouseover(function(){
		var index = $(this).index();
		$('.nav_center a').removeClass('cur');
		$(this).addClass('cur');
		$('.nav_con ul').hide();
		$('.nav_con ul:eq('+index+')').show();
	});
	$(".nav_con ul").mouseover(function(){
		var index = $(this).index();
		$('.nav_center a').removeClass('cur');
		$('.nav_center a:eq('+index+')').addClass('cur');
	});
	
	$(".tupian_nav0 li").mouseover(function(){
		var index = $(this).index();
		$('.tupian_nav li').hide();
		$('.tupian_nav li:eq('+index+')').show();
	});
	
$(".con_third_l_nav a").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.con_third_l_tabContent ul').hide();
		$('.con_third_l_tabContent ul:eq('+index+')').show();
});

$(".con_third_r_nav a").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.con_third_r_con ul').hide();
		$('.con_third_r_con ul:eq('+index+')').show();
});
$(".con_four_r_nav a").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.con_four_r_con ul').hide();
		$('.con_four_r_con ul:eq('+index+')').show();
});
$(".con_seven_con_r_nav a").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.con_seven_con_r_con ol').hide();
		$('.con_seven_con_r_con ol:eq('+index+')').show();
});
$(".con_seven_nav a").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.con_seven_con_l ul').hide();
		$('.con_seven_con_l ul:eq('+index+')').show();
});
$(".news_f3_fr_nav li").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.news_f3_fr_con ol').hide();
		$('.news_f3_fr_con ol:eq('+index+')').show();
});
$(".news_f4_fr_nav li").mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
		var index = $(this).index();
		$('.news_f4_fr_con ol').hide();
		$('.news_f4_fr_con ol:eq('+index+')').show();
});
$(".float_l em").click(function(){
	$(".float_l").hide();
});


});
