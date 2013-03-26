<?php
	if(isset($_GET['id']))
	{
		include( 'connection.php' );
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM comments WHERE id = '$id' LIMIT 1") or die(mysql_error());
		$row = mysql_fetch_array($sql);
		extract($row);


		$given_status = array("Approve","Pending","Trash");
		$selected_comment = array($comment_status);
		$comment_difference  = array_diff($given_status,$selected_comment);
	}
?>