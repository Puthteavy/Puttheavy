$(document).ready(function(){
	$('#btnA').click(function(){
		$('.de-box01').show(2000);
		$('.de-box02').hide(500);
		$('.act01').css('background-color','#343c48');
		$('.act02').css('background-color','#fff');
		$('.p2').css('color','#343c48');
		$('.p1').css('color','#fff');
	});
	$('#btnB').click(function(){
      $('.de-box01').hide(500);
      $('.de-box02').show(2000);
      $('.p2').css('color','#fff');
      $('.p1').css('color','#343c48');
      $('.act01').css('background-color','#fff');
      $('.act01').css('border','1px solid #343c48');
      $('.act02').css('background-color','#343c48');
	});


});
