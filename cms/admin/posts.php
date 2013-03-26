	<?php include_once( 'includes/header.php' ); ?>		
	<?php include_once( 'includes/posts-header.php' ); ?>
	
	<script type="text/javascript" src="js/delete_posts.js"></script>
		<div class="col-full">
			<h2 id="postsheading">All Posts</h2>
			
			<div id="postsmenu">
				<ul>
					<li><a href="posts.php">View All | </a></li>
					<li><a href="posts.php?posttype=Published">Published | </a></li>
					<li><a href="posts.php?posttype=Private">Private | </a></li>
					<li><a href="posts.php?posttype=Trash">Trash</a></li>
				</ul>
			</div>

			<div id="viewposts">
			<?php include_once( 'scripts/get-posts.php' ); ?>
			</div><!-- end view posts -->
		</div><!-- end col-full -->
	</div><!--end mainWrapper-->
</body>
</html>