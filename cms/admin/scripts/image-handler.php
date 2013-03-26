<?php
	if($_POST)
	{
		include_once( 'connection.php' );
		$imagename = $_POST['imagename'];
		$imageid = $_POST['imageid'];
		
		$sql = mysql_query("UPDATE posts SET imageref = '' WHERE id = '$imageid' LIMIT 1") or die(mysql_error());
		$affected = mysql_affected_rows();
		
		if($affected == 1)
		{
			unlink("../featured-uploads/".$imagename);
			echo 'done';
		}
		
	}
	

?>