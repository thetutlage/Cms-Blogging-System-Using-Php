<?php

	include_once( 'connection.php' );
	class ManagePosts{
		function getPosts($status,$param1=null)
		{
			if(isset($param1))
			{
				foreach($param1 as $key => $value)
				{
					$sql = mysql_query("SELECT * FROM posts WHERE $key = '$value' AND post_status = '$status' ORDER BY id DESC") or die(mysql_error());
					$num = mysql_num_rows($sql);
				}
			}
			else
			{
				$sql = mysql_query("SELECT * FROM posts WHERE post_status = '$status' ORDER BY id DESC") or die(mysql_error());
				$num = mysql_num_rows($sql);
			}
	
	
				if($num >= 1)
				{
					while($row = mysql_fetch_array($sql))
					{
						$result[] = $row;
					}
				}
				else
				{
					$result = $num;
				}
				return $result;
		}
	}

?>