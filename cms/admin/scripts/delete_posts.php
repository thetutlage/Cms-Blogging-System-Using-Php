<?php

	if($_POST)
	{
		include_once( 'connection.php' );
		$delete_post_id = $_POST['delete_post_id'];
		
		$delete = mysql_query("DELETE FROM posts WHERE id = '$delete_post_id' LIMIT 1") or die(mysql_error());
	}
?>