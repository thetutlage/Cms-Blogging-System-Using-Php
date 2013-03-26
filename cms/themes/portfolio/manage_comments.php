<?php

	// adding the header file to make sure everything works fine
	include_once( 'header.php' );
	
		/* new section added
		   ----------------------------  Added On - 04/14/2012 ------------------------------------------------
		   -------------------------------- Will call the function to render and submit comments --------------------------
		*/
		
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$website = $_POST['website'];
			$comments = $_POST['comments'];

			$comment_init = new ManageComments();
			echo $comment_init->submitComments($name,$email,$website,$comments);
		}
?>