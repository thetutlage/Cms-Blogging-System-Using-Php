<?php

/*
	File Created - 4/14/2012
	File Role - Manage Comments Functionality On Front End
*/
	include_once( 'connection.php' );

	class ManageComments{

		function createCommentBox(){
			$form_value = '<form method="post" action="?comments='.$_GET['post'].'" id="comment_box">
				<label for="Name">Name</label>
				<input type="text" name="name" id="name" />

				<label for="Name">Email</label>
				<input type="text" name="email" id="email" />

				<label for="Name">Website</label>
				<input type="text" name="website" id="website" />

				<label for="Name">Comments</label>
				<textarea name="comments" id="comments"></textarea>

				<input type="submit" name="submit" value="Submit Comment" id="submit"/>
			</form>';
			return $form_value;
		}

		function submitComments($name,$email,$website,$comments){

			$comment_date = date("Y-m-d");
			$comment_time = date("H:i:s");
			$comment_status = 'Pending';
			$post_id = $_GET['comments'];

			if(empty($name) || empty($email) || empty($comments))
			{
				$message = 'Required fields missing <a href="#" onclick="history.go(-1)"> Go back </a>';
			}
			elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$message = 'Enter a valid email <a href="#" onclick="history.go(-1)"> Go back </a>';
			}
			elseif(!filter_var($post_id,FILTER_VALIDATE_INT))
			{
				$message = 'There was an error processing request <a href="#" onclick="history.go(-1)"> Go back </a>';
			}
			elseif(!empty($website) && (!filter_var($website,FILTER_VALIDATE_URL)))
			{
				$message = 'Enter a valid website name <a href="#" onclick="history.go(-1)"> Go back </a>';
			}
			else
			{
				$comments = mysql_real_escape_string($comments);
				$email = filter_var($email,FILTER_SANITIZE_EMAIL);
				$sql = mysql_query("INSERT INTO comments (name,email,website,comments,post_id,comment_date,comment_time,comment_status)
					VALUES('$name','$email','$website','$comments','$post_id','$comment_date','$comment_time','$comment_status')") or die(mysql_error());
					
				$affected = mysql_affected_rows();
				if($affected == 1)
				{
					$message = 'Your comment is awaiting moderation and will be visible with admin approval <a href="#" onclick="history.go(-1)"> Go back </a>';
				}
				else
				{
					$message = 'There was an error adding your comment <a href="#" onclick="history.go(-1)"> Go back </a>';
				}
			}
			return $message;
		}		
		function renderComments($post_id)
		{
			$sql = mysql_query("SELECT * FROM comments WHERE post_id = '$post_id' AND comment_status = 'Approve' ORDER BY id DESC");
			$num_rows = mysql_num_rows($sql);
			
			if($num_rows >= 1)
			{
				while($row = mysql_fetch_array($sql))
				{
					$result[] = $row;
				}
			}
			else
			{
				$result = $num_rows;
			}
			return $result;
		}
	}
?>