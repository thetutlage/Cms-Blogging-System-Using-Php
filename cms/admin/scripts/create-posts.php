<?php
	include_once( 'connection.php' );
	include_once( 'session.php' );
//	error_reporting(0);

	if(isset($_POST['createpost']))
	{
		$title = $_POST['title'];
		$content = mysql_real_escape_string($_POST['content']);
		$metatitle = $_POST['metatitle'];
		$metadescription = $_POST['metadescription'];
		$metarobots = $_POST['metarobots'];
		$metatags = $_POST['metatags'];

		/* changes being made here  */
		if(!isset($_POST['categoryname']))
		{
			$categoryname = '';
		}
		else
		{
			$categoryname = $_POST['categoryname'];
		}

		/* end of changes */
		$imageref = $_POST['imageref'];

		if(empty($title) || empty($content))
		{
			$error = 'A valid title and some content is required to create a post';
		}
 		/* removed else if from here */
		else
		{
			$category = implode(',',$categoryname);
			$sql = mysql_query("INSERT INTO posts (title,description,categories,post_meta,post_robots,meta_title,meta_description,created_by,created_on,post_status,imageref)
			VALUES ('$title','$content','$category','$metatags','$metarobots','$metatitle','$metadescription','$session_name',now(),'Published','$imageref')") or die(mysql_error());
			$affeced_rows = mysql_affected_rows();
			if($affeced_rows == 1)
			{
				$id = mysql_insert_id();
				header("location: create-posts.php?id=$id");
			}
			
		}
	}
	elseif(isset($_POST['editpost']))
	{
		$getid = $_GET['id'];
		
		$title = $_POST['title'];
		$content = mysql_real_escape_string($_POST['content']);
		$metatitle = $_POST['metatitle'];
		$metadescription = $_POST['metadescription'];
		$metarobots = $_POST['metarobots'];
		$metatags = $_POST['metatags'];
		$categoryname = $_POST['categoryname'];

		if(empty($title) || empty($content))
		{
			$error = 'A valid title and some content is required to create a post';
		}
		elseif(empty($categoryname))
		{
			$category = 'Uncategorized';
		}
		else
		{
			$category = implode(',',$categoryname);
			
			$sql = mysql_query("UPDATE posts SET title = '$title', description = '$content', categories = '$category', 
			post_meta = '$metatags', post_robots = '$metarobots', meta_title = '$metatitle', 
			meta_description = '$metadescription' WHERE id = '$getid'") or die(mysql_error());
			
			$affeced_rows = mysql_affected_rows();
			if($affeced_rows == 1)
			{
			}
			else
			{
			}

		}
	}


?>