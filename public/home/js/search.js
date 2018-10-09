$(function(){

  //搜索框js特效
  $('#bdcs-search-form-input').focus(function(){
    $('#bdcs-search-form-submit').css({
      'width':'80px',
      'transition':'0.4s',

    })
  }).blur(function(){
        $('#bdcs-search-form-submit').css({
      'width':'0px',
      'transition':'0.4s',

    })
  })


  //input输入时自动搜索联想的ajax
  $('#bdcs-search-form-input').on('input',function(){
    var thiss = $(this);
    //设置倒计时防止不停刷新
    setTimeout(function(){
      console.log(thiss.val());
    },1500);
  })
        

  //搜索按钮点击提交事件
  $('#bdcs-search-form-submit').click(function(){

  })
})