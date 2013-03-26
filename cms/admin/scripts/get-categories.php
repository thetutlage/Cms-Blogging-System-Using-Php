<?php
	include_once 'connection.php';
	$fetch = mysql_query("SELECT * FROM categories ORDER BY id DESC") or die(mysql_error());
	while($row = mysql_fetch_array($fetch))
	{
		extract($row);
		echo '<div class="form-elements">
		<input type="checkbox" name="categoryname[]" value="'.$category_name.'" id="categoryname"/>'.$category_name.'</div>';
	}
?>