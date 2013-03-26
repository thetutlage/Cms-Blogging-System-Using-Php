<?php

	if(isset($_GET['id']))
	{
		include( 'connection.php' );
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM posts WHERE id = '$id' LIMIT 1") or die(mysql_error());
		$row = mysql_fetch_array($sql);
		extract($row);
	}
?>