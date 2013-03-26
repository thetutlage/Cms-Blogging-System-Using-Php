<?php

	include_once( 'connection.php' );

	class ManageCategories{
		var $result;

		function getCategories(){
			$sql = mysql_query("SELECT * FROM categories");
			$num = mysql_num_rows($sql);
			
			if($num >= 1)
			{
				while($row = mysql_fetch_array($sql))
				{
					$this->result[] = $row;
				}
			}
			else
			{
				$this->result = $num;
			}
			return $this->result;
		}

	function filterCategories(){
		$this->getCategories();
		
		if($this->result !== 0)
		{
			foreach($this->result as $key => $value)
			{
				$category_to_find = $value['category_name'];
				$sql = mysql_query("SELECT * FROM posts WHERE categories RLIKE '$category_to_find'");	
				$num_rows = mysql_num_rows($sql);
				
				if($num_rows >= 1)
				{
					$categories_array[] = $value['category_name'];
				}
			}
		}
		
		return $categories_array;
	}

	}
	
	$init = new ManageCategories;
	
	$r = $init->filterCategories();
	
	print_r($r);
	
?>