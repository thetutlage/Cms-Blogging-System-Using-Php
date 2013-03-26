<?php
	if($_GET['id'])
	{
		include_once( 'scripts/connection.php' );
		$delete_comment_id = $_GET['id'];
		$delete = mysql_query("DELETE FROM comments WHERE id = '$delete_comment_id' LIMIT 1") or die(mysql_error());
		header("location: view_comments.php");
	}
?>