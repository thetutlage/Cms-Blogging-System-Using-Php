$(function(){
	$('#delete_post').live("click",function(){
		var delete_post_id = $(this).parent('td').find('#post_id').val();
			if(window.XMLHttpRequest)
			{
				xmlhttp = new window.XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft',XMLHTTP);
			}

			xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == '4' && xmlhttp.status == '200')
				{
				window.location.reload();
				}
			}
				parameters = 'delete_post_id=' + delete_post_id;

				xmlhttp.open('POST', 'scripts/delete_posts.php', true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(parameters);
				return false;
	});
});