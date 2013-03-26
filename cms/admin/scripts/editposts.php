<?php
	
	if(isset($_POST['editpost']))
	{
		include_once( 'connection.php' );
		$title = $_POST['title'];
		$content = $_POST['content'];
		$metatitle = $_POST['metatitle'];
		$metadescription = $_POST['metadescription'];
		$metarobots = $_POST['metarobots'];
		$metatags = $_POST['metatags'];
		$getid = $_GET['id'];
		$imageref = $_POST['imageref'];
		$post_status = $_POST['post_status'];

		if(!isset($_POST['categoryname']))
		{
			$category = '';
		}
		else
		{
			$category = $_POST['categoryname'];
		}
		
		$categoryname = implode(',',$category);
		$content = mysql_real_escape_string($content);
		
		
		$sql = mysql_query("UPDATE posts SET post_status = '$post_status',title = '$title',description = '$content',categories = '$categoryname',post_meta = '$metatags'
		,post_robots = '$metarobots',meta_title = '$metatitle',meta_description ='$metadescription',imageref = '$imageref' WHERE id = '$getid'");
		$affected = mysql_affected_rows();
	}
?>