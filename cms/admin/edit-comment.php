<?php include_once( 'includes/header.php' );
	include_once( 'scripts/individual-comment.php' );
	include_once( 'scripts/edit-comment.php' );
 ?>
 <script type="text/javascript">
 	$(function(){
	  $("#markItUp").markItUp(mySettings);
	});
 </script>
		<div class="col-full">
			<div class="clear"></div>
			<form method="post" action="edit-comment.php?id=<?php echo $_GET['id']; ?>">
				<div id="leftsection">
					<h2 id="postsheading">Manage Comments</h2>								
					<div class="form-elements">
						<label for="Comment">Comment</label><br />
						<textarea name="comments" id="markItUp"><?php echo $comments; ?></textarea>
					</div>

					<div class="form-elements">
						<label for="Comment">User Name</label>
						<input type="text" name="user_name" value="<?php echo $name; ?>" />
					</div>

					<div class="form-elements">
						<label for="Comment">User Email</label>
						<input type="text" name="user_email" value="<?php echo $email; ?>" />
					</div>

					<div class="form-elements">
						<label for="Comment">User Website</label>
						<input type="text" name="user_website" value="<?php echo $website; ?>" />
					</div>

				
				</div><!-- end left section -->
	
				<div id="rightsection">			
					<h2>Manage Comments</h2>
					<div class="form-elements">
						<p><b>Commented On Date </b><?php echo $comment_date; ?></p><br />
						<p><b>Commented Time </b><?php echo $comment_time; ?></p>
					</div>
					<br />
					
					<div class="form-elements">
						<label for="Comment Status">Comment Status</label><br /><br />
						<select name="comment_status">
							<option value="<?php echo $comment_status; ?>" selected="selected"><?php echo $comment_status; ?></option>
							<?php
								foreach($comment_difference as $cd){
									echo '<option value="'.$cd.'">'.$cd.'</option>';
								}
							?>
						</select>
					</div>
					
					<div class="form-elements">
						<input type="submit" name="edit_comment" value="Edit" class="myButton"/>
					</div>
				</div><!-- end right section -->
			</form>
		</div><!-- end col-full -->
	</div><!--end mainWrapper-->
</body>
</html>