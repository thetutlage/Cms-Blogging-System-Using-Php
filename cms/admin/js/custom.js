$(function(){

	$('#submenu li a').click(function(){
		$('#submenu li a').removeClass('selected');
		$(this).addClass('selected');
	});
});