<?php
	
	if($_POST)
	{
		include( 'connection.php' );
		include_once('session.php');
		
		$categoryname = $_POST['categoryname'];

		$fetch = mysql_query("SELECT * FROM categories WHERE category_name = '$categoryname'") or die(mysql_error());
		$num_rows = mysql_num_rows($fetch);
	
		if(empty($categoryname))
		{
			echo 'Category name is required';
		}
		elseif($num_rows >= 1)
		{
			echo 'Category already exists';
		}
		else
		{
			$categoryname = strip_tags($categoryname);
			$categoryname = mysql_real_escape_string($categoryname);
		
			$sql = mysql_query("INSERT INTO categories (category_name,created_by,created_on)
			VALUES ('$categoryname','$session_name',now())") or die(mysql_error());
			
			if($sql)
			{
				$fetch = mysql_query("SELECT * FROM categories ORDER BY id DESC") or die(mysql_error());
				while($row = mysql_fetch_array($fetch))
				{
					extract($row);
					echo '<div class="form-elements">
					<input type="checkbox" name="categoryname[]" value="'.$category_name.'" id="categoryname"/>'.$category_name.'
					</div>';
				}
			}
		}
		
	}

?>