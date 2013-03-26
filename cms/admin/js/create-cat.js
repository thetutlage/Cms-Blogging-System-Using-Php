$(function(){
	$('#categorycreate').live("keypress",function(e){
		if(e.which == 13)
		{
			var categoryname = $(this).val();
			
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
					response = xmlhttp.responseText;
					$('#listcategories').html(response);
					$('#categorycreate').val('');
				}
			}
				parameters = 'categoryname=' + categoryname;

				xmlhttp.open('POST', 'scripts/create-cat.php', true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(parameters);
		}
	});
});
