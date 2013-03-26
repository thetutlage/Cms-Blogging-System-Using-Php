<?php include_once( 'includes/header.php' ); ?>		
<?php include_once( 'scripts/session.php' ); ?>	
<?php include_once( 'scripts/create-posts.php' ); ?>
<?php include_once( 'scripts/editposts.php' ); ?>
<script type="text/javascript" src="js/create-cat.js"></script>
<link rel="stylesheet" href="uploadify/uploadify.css" />
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/image-handler.js"></script>
	<?php include_once( 'includes/posts-header.php' ); ?>

		<div class="col-full">
		<?php if(isset($_GET['id']))
		{ 
			include_once( 'scripts/individual-posts.php' );
			$given_array = array("Published","Private","Trash");
			$selected_array = array($post_status);
			$diff_array = array_diff($given_array,$selected_array);
		?>
			<?php
				if(!empty($imageref))
				{
					$file_path = 'featured-uploads/'.$imageref;
				}
				else
				{
				}
			?>

			<div id="leftsection">
			<h2>Edit Posts</h2>
			<form method="post" action="create-posts.php?id=<?php echo $_GET['id']; ?>">
				<div class="form-elements">
					<input type="text" name="title" value="<?php echo $title; ?>" id="title"/>
				</div>
			
				<div class="form-elements">
					<textarea id="markItUp" name="content"><?php echo $description; ?></textarea>
				</div>


				<div class="form-elements">
					<label for="Meta Title">Meta Title</label>
					<input type="text" name="metatitle" value="<?php echo $meta_title; ?>"  id="metatitle"/>
				</div>
	
				<div class="form-elements">
					<label for="Meta Title">Meta Description</label>
					<input type="text" name="metadescription" value="<?php echo $meta_description; ?>"  id="metadescription"/>
				</div>
	
				<div class="form-elements">
					<label for="Meta Title">Meta Robots</label>
					<input type="text" name="metarobots" value="<?php echo $post_robots; ?>"  id="metarobots"/>
				</div>

				<div class="form-elements">
					<label for="Meta Title">Meta Tags</label>
					<input type="text" name="metatags" value="<?php echo $post_meta; ?>"  id="metatags"/>
				</div>
	
			</div><!-- end left section -->
	
			<div id="rightsection">
				<h2><?php echo $post_status; ?></h2>
				
				<div class="form-elements">
					<select name="post_status">
					<?php echo '<option value="'.$post_status.'" selected="selected">'.$post_status.'</option>';
							foreach($diff_array as $da)
							{
								echo '<option value="'.$da.'">'.$da.'</option>';
							}
						?>
					</select><!-- end post_status -->
					<br />
				</div>
				
			</div><!-- end right section -->
	
			<div id="rightsection">
				<h2>Categories</h2>
	
				<div id="listcategories">
				<?php
					$cat = explode(",",$categories);
					foreach($cat as $key =>$value)
					{
						$cat_name[$key] = '' .mysql_real_escape_string($value) . '';
					}
					$fetch = mysql_query("SELECT * FROM categories ORDER BY id DESC") or die(mysql_error());
					while($result = mysql_fetch_array($fetch))
					{
						extract($result);
						$join_name[] = '' .mysql_real_escape_string($category_name) . '';
					}
					$intersect = array_intersect($join_name,$cat_name);
					$diff = array_diff($join_name,$cat_name);
					
					foreach($intersect as $inter)
					{
						echo '<div class="form-elements"><input type="checkbox" name="categoryname[]" value="'.$inter.'" id="categoryname" checked/>'.$inter.'</div>';
					}
					foreach($diff as $diff1)
					{
						echo '<div class="form-elements"><input type="checkbox" name="categoryname[]" value="'.$diff1.'" id="categoryname" />'.$diff1.'</div>';
					}					
					
					
				?>
					<input type="hidden" name="imageref" id="imageref" value="<?php echo $imageref; ?>" />
					<input type="hidden" name="hiddenfileid" id="hiddenfileid" value="<?php echo $_GET['id']; ?>" />
					<input type="hidden" name="hiddenfilename" id="hiddenfilename" value="<?php echo $imageref; ?>" />
				</div><!-- end listcategories -->
	
					<div class="form-elements">
					<input type="submit" name="editpost" value="Edit" id="editpost" class="myButton"/>
					</div>
				</form>
				<div id="preview1">
					<?php if(isset($file_path)){
						echo '<img src="'.$file_path.'" width="300" height="300" />
						<input type="submit" name="deleteimage" id="deleteimage" value="Delete"/>
						';
					} 
					else
					{
						echo '<form method="" action="">
						<label for="Set Featured Image">Set Featured Image</label>
						<div style="padding: 10px;"></div>
						<input type="file" name="featuredimage" id="featuredimage" />
					</form>
					<div id="preview"></div>';
					}
					?>
				</div><!-- end preview 1-->
			</div>
			<?php } else { ?>
		<div id="leftsection">
			<h2>Create Posts</h2>
			<form method="post" action="create-posts.php">
				<div class="form-elements">
					<input type="text" name="title" placeholder="Add Title Here" id="title"/>
				</div>

				<div class="form-elements">
					<textarea id="markItUp" name="content"></textarea>
				</div>

				<div class="form-elements">
					<input type="text" name="metatitle" placeholder="Meta Title" id="metatitle"/>
				</div>

				<div class="form-elements">
					<input type="text" name="metadescription" placeholder="Meta Description" id="metadescription"/>
				</div>

				<div class="form-elements">
					<input type="text" name="metarobots" placeholder="Meta Robots" id="metarobots"/>
				</div>

				<div class="form-elements">
					<input type="text" name="metatags" placeholder="Meta Tags" id="metatags"/>
				</div>

			</div><!-- end left section -->

			<div id="rightsection">
				<h2>Categories</h2>

				<div id="listcategories">
				<?php include_once( 'scripts/get-categories.php' ); ?>
				</div><!-- end listcategories -->
				
					<input type="hidden" name="imageref" id="imageref" value="" />
	
					<div class="form-elements">
					<input type="submit" name="createpost" value="Submit" id="createpost" class="myButton"/>
					</div>
				</form>

				<div id="createcat">
					<div class="form-elements">
						<input type="text" name="categorycreate" id="categorycreate" placeholder="Add New Category"/>
					</div>					
				</div><!-- end createcat-->

				<div id="createcat">
					<div class="form-elements">
					<form method="" action="">
						<label for="Set Featured Image">Set Featured Image</label>
						<div style="padding: 10px;"></div>
						<input type="file" name="featuredimage" id="featuredimage" />
					</form>
					<div id="preview"></div>
					
					</div>
				</div><!-- end createcat-->

			</div>
			<?php } ?>
			
			
		<div class="clear"></div>
		</div>
	</div><!--end mainWrapper-->
</body>
</html>