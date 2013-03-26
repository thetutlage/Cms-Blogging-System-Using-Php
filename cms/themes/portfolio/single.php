<?php
	include_once( 'header.php' );	
	if(isset($_GET['post']))
	{
		$post_id = $_GET['post'];
		$init = new ManagePosts();
		
		$comment_init = new ManageComments();   // init the comment class

		$posts = $init->getPosts('published',array('id'=>$post_id));
	
		foreach($posts as $post)
		{
			echo '<h2>'.$post['title'].'</h2>';
			echo '<p>'.$post['description'].'</p>';
		}
		
		
		/* new section added
		   ----------------------------  Added On - 04/14/2012 ------------------------------------------------
		   -------------------------------- Will call the function to render existing comments --------------------------
		*/
		$existing_comments = $comment_init->renderComments($_GET['post']);
		if($existing_comments !== 0)
		{
			foreach($existing_comments as $key => $value)
			{
				echo '<h2>'.$value['name'].'</h2>';
			}
		}
		else
		{
			echo '<h4> There are no comments </h4>';
		}

		/* new section added
		   ----------------------------  Added On - 04/14/2012 ------------------------------------------------
		   -------------------------------- Will call the function to create comment box --------------------------
		*/
		echo $comment_init->createCommentBox();
		
	}
	else
	{
		header("location: index.php");
	}
?>