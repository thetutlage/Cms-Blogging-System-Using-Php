   $(document).ready(function() {
	  $("#markItUp").markItUp(mySettings);

		$('#featuredimage').uploadify({
			'uploader': 'uploadify/uploadify.swf',
			'script': 'uploadify/uploadify.php',
			'folder': 'featured-uploads',
			'fileExt' : '*.jpg;*.gif;*.png',
			'fileDesc' : 'Image Files',
			'multi': false,
			'auto': true,
			'onComplete': function(event,ID,fileObj,response,date)
			{
				$('#imageref').val(fileObj.name);
				$('#preview').html('<img src="featured-uploads/' + fileObj.name + '" width="300" height="300" />');
			}
	});
			$('#deleteimage').live("click",function(){
				var imagename = $('#hiddenfilename').val();
				var id = $('#hiddenfileid').val();
				
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
						if(response == 'done')
						{
							$('#preview1').html('');
							window.location.reload();
						}
					}
				}
				parameters = 'imagename=' + imagename + '&imageid=' + id;

				xmlhttp.open('POST', 'scripts/image-handler.php', true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(parameters);
			});
		});
