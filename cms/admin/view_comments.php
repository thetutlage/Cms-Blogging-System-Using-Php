<?php include_once( 'includes/header.php' ); ?>
		<div class="col-full">
			<div class="clear"></div>
			<h2 id="postsheading">Comments</h2>			
			<div id="postsmenu">
				<ul>
					<li><a href="view_comments.php">View All | </a></li>
					<li><a href="view_comments.php?commenttype=Approve">Approve | </a></li>
					<li><a href="view_comments.php?commenttype=Pending">Pending | </a></li>
					<li><a href="view_comments.php?commenttype=Trash">Trash</a></li>
				</ul>
			</div>
			<div id="viewposts">
			<?php include_once( 'scripts/get-comments.php' ); ?>
			</div><!-- end view posts -->
		</div><!-- end col-full -->
	</div><!--end mainWrapper-->
</body>
</html>