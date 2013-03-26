<?php
	if(isset($_POST['edit_comment']))
	{
		include( 'connection.php' );
		$id = $_GET['id'];
		$comments = $_POST['comments'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_website = $_POST['user_website'];
		$comment_status = $_POST['comment_status'];
		
		if(empty($comments) || empty($user_name))
		{
			$error = 'Comments or name cannot be empty';
		}
		else
		{
			$update = mysql_query("UPDATE comments SET comments = '$comments', name = '$user_name', email = '$user_email', website = '$user_website', comment_status = '$comment_status' WHERE id = '$id' LIMIT 1");
			$affected = mysql_affected_rows();
			if($affected == 1)
			{
				$success = 'Comment updated successfully';
			}
			else
			{
				$success = 'Nothing updated';
			}
		}
	}
?>