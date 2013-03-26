<?php include_once( 'scripts/session.php' ); ?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
	<meta charset="utf-8">  
	<title>Admin Panel :- CMS</title>  
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Federo' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="latest/markitup/skins/markitup/style.css" />
		<link rel="stylesheet" type="text/css" href="latest/markitup/sets/default/style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="latest/markitup/jquery.markitup.js"></script>
	<script type="text/javascript" src="latest/markitup/sets/default/set.js"></script>

</head>
<body>
	<div id="mainWrapper">
		<div id="header">
			<div class="col-full">
				<div id="headerleft">
					<h2>CMS Admin</h2>
					<ul id="mainmenu">
						<li><a href="#">Dashboard</a></li>
						<li><a href="posts.php">Posts</a></li>
						<li><a href="#">Pages</a></li>
						<li><a href="view_comments.php">View Comments</a></li>
						<li><a href="themes.php">Manage Themes</a></li>
					</ul>


				</div><!-- end headerleft-->

				<div id="headerright">
					<div id="user">
						<span class="name">User</span>
						<span class="name"><a href="scripts/logout.php">Logout</a></span>
						<span class="settings"><img src="images/system.png" /></span>
					</div>
				</div><!-- headerright end -->

				<div class="clear"></div>

			</div><!-- end col-full-->

		</div><!-- end header -->
