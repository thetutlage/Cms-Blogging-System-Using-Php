<?php

	include_once 'connection.php';
	if(isset($_GET['commenttype']))
	{
	$commenttype = $_GET['commenttype'];
	$sql = mysql_query("SELECT * FROM comments WHERE comment_status = '$commenttype' ORDER BY id DESC") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);

	if($num_rows >= 1)
	{
		echo '<table width="100%">
					<thead>
						<tr align="left">
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Comment</th>
							<th scope="col">Posted On</th>
							<th scope="col">Comment Date / Time</th>
							<th scope="col">Comment Status</th>
							<th scope="col">Actions</th>
						</tr>';
		while($row = mysql_fetch_array($sql))
		{
		extract($row);

		$snippet = explode(" ",$comments);
		$snippet_to_use = array_slice($snippet,0,10);
		$snippet_to_use = implode(" ", $snippet_to_use);
		
		// ---------------------- Query to get post title using post id ----------------------------------- //
			$get_posts_title = mysql_query("SELECT * FROM posts WHERE id = '$post_id' LIMIT 1");
			$rows = mysql_num_rows($get_posts_title);
			if($rows == 1)
			{
				$title_row = mysql_fetch_array($get_posts_title);
				$post_title = $title_row['title'];
			}
			else
			{
				$post_title = 'This post does not exists';
			}
			echo '<tr>
							<td>'.$name.'</td>
							<td>'.$email.'</td>
							<td>'.$snippet_to_use.'</td>
							<td>'.$post_title.'</td>
							<td>'.$comment_date.' - '.$comment_time.'</td>
							<td>'.$comment_status.'</td>
							<td><a href="edit-comment.php?id='.$id.'">View | </a> <a href="delete-comment.php?id='.$id.'" id="delete_post"> Delete </a>
							<input type="hidden" name="post_id" value="'.$id.'" id="post_id" />
							</td>
						</tr>';
		}

		echo '</thead>
				</table>';
	}
		else
		{
			echo '<div id="noposts"> There are no comments </div>';
		}
	}

	else
	{
		$sql = mysql_query("SELECT * FROM comments ORDER BY id DESC") or die(mysql_error());
		$num_rows = mysql_num_rows($sql);

		if($num_rows >= 1)
		{
			echo '<table width="100%">
						<thead>
							<tr align="left">
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Comment</th>
								<th scope="col">Posted On</th>
								<th scope="col">Comment Date / Time</th>
								<th scope="col">Comment Status</th>
								<th scope="col">Actions</th>
							</tr>';
			while($row = mysql_fetch_array($sql))
			{
			extract($row);

		// ---------------------- Query to get post title using post id ----------------------------------- //
			$get_posts_title = mysql_query("SELECT * FROM posts WHERE id = '$post_id' LIMIT 1");
			$rows = mysql_num_rows($get_posts_title);
			if($rows == 1)
			{
				$title_row = mysql_fetch_array($get_posts_title);
				$post_title = $title_row['title'];
			}
			else
			{
				$post_title = 'This post does not exists';
			}



			$snippet = explode(" ",$comments);
			$snippet_to_use = array_slice($snippet,0,10);
			$snippet_to_use = implode(" ", $snippet_to_use);

			echo '		<tr>
								<td>'.$name.'</td>
								<td>'.$email.'</td>
								<td>'.$snippet_to_use.'</td>
								<td>'.$post_title.'</td>
								<td>'.$comment_date.' - '.$comment_time.'</td>
								<td>'.$comment_status.'</td>
								<td><a href="edit-comment.php?id='.$id.'">View | </a> <a href="delete-comment.php?id='.$id.'" id="delete_post"> Delete </a>
								<input type="hidden" name="post_id" value="'.$id.'" id="post_id" />
								</td>
							</tr>';
			}
	echo '</thead>
				</table>';
	}
	else
	{
		echo '<div id="noposts"> There are no comments </div>';
	}
	}
	
?>