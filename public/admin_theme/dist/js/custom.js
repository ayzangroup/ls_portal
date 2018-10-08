//active link
$(function(){
  if($('.sidebar li a[href*="'+location.pathname+'"] ').length != -1){
    $('.sidebar li a[href*="'+location.pathname+'"] ').parent('li').addClass('active')
  }
}());

