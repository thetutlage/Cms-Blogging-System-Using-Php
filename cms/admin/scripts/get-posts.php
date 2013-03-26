<?php

	include_once 'connection.php';
	if(isset($_GET['posttype']))
	{
	$posttype = $_GET['posttype'];
	$sql = mysql_query("SELECT * FROM posts WHERE post_status = '$posttype' ORDER BY id DESC") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);

	if($num_rows >= 1)
	{
		echo '<table width="100%">
					<thead>
						<tr align="left">
							<th scope="col">Title</th>
							<th scope="col">Snippets</th>
							<th scope="col">Created By</th>
							<th scope="col">Created On</th>
							<th scope="col">Comments</th>
							<th scope="col">Actions</th>
						</tr>';
		while($row = mysql_fetch_array($sql))
		{
		extract($row);

		$snippet = explode(" ",$description);
		$snippet_to_use = array_slice($snippet,0,10);
		$snippet_to_use = implode(" ", $snippet_to_use);

		echo '		<tr>
							<td>'.$title.'</td>
							<td>'.$snippet_to_use.'</td>
							<td>'.$created_by.'</td>
							<td>'.$created_on.'</td>
							<td>0</td>
							<td><a href="create-posts.php?id='.$id.'">View | </a> <a href="delete-posts.php?id='.$id.'" id="delete_post"> Delete </a>
							<input type="hidden" name="post_id" value="'.$id.'" id="post_id" />
							</td>
						</tr>';
	}

	echo '</thead>
				</table>';
	}
	else
	{
		echo '<div id="noposts"> There are no posts, you can create one by clicking <a href="create-posts.php"> here </a></div>';
	}
	}




	else
	{
	$sql = mysql_query("SELECT * FROM posts ORDER BY id DESC") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);
	
	if($num_rows >= 1)
	{
		echo '<table width="100%">
					<thead>
						<tr align="left">
							<th scope="col">Title</th>
							<th scope="col">Snippets</th>
							<th scope="col">Created By</th>
							<th scope="col">Created On</th>
							<th scope="col">Comments</th>
							<th scope="col">Actions</th>
						</tr>';
		while($row = mysql_fetch_array($sql))
		{
		extract($row);

		$snippet = explode(" ",$description);
		$snippet_to_use = array_slice($snippet,0,10);
		$snippet_to_use = implode(" ", $snippet_to_use);

		echo '		<tr>
							<td>'.$title.'</td>
							<td>'.$snippet_to_use.'</td>
							<td>'.$created_by.'</td>
							<td>'.$created_on.'</td>
							<td>0</td>
							<td><a href="create-posts.php?id='.$id.'">View | </a> <a href="delete-posts.php?id='.$id.'" id="delete_post"> Delete </a>
							<input type="hidden" name="post_id" value="'.$id.'" id="post_id" />
							</td>
						</tr>';
	}

	echo '</thead>
				</table>';
	}
	else
	{
		echo '<div id="noposts"> There are no posts, you can create one by clicking <a href="create-posts.php"> here </a></div>';
	}
	}
	
?>