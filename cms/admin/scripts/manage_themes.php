<?php

	include_once( 'connection.php' );
	
	if(isset($_GET['theme']))
	{
		$theme_name = $_GET['theme'];
		$activate_theme =  mysql_query("SELECT * FROM site_meta WHERE type = 'theme' LIMIT 1") or die(mysql_error());
		$num_rows = mysql_num_rows($activate_theme);
		if($num_rows == 1)
		{
			$row = mysql_fetch_array($activate_theme);
			$theme_id = $row['id'];
			
			$update_theme = mysql_query("UPDATE site_meta SET name = '$theme_name' WHERE id = '$theme_id' LIMIT 1") or die(mysql_error());
		}
		else
		{
			$insert_theme = mysql_query("INSERT INTO site_meta (name,type) VALUES ('$theme_name','theme')") or die(mysql_error());
		}
	}

	$get_active_theme = mysql_query("SELECT * FROM site_meta WHERE type = 'theme' LIMIT 1") or die(mysql_error());
	$num_rows = mysql_num_rows($get_active_theme);
	if($num_rows == 1)
	{
		$rows = mysql_fetch_array($get_active_theme);
		$theme_name = $rows['name'];

		$dir = '../themes/';
		$folder = scandir($dir);
		$filename = $dir.$theme_name.'/style.css';
		$handle = fopen($filename,"r");
		
		$string = array("*/", "/*");
		$replace = '';

		$output = '<div class="themes">
		<h2> Theme Name :- '.$theme_name.'</h2>';

		$output .= '<ul>';

				while(($buffer = fgets($handle,4096)) !== false)
				{
					if(trim($buffer) == '*/')
					{
						break;
					}
					$output .= '<li>'.str_replace($string,$replace,$buffer).'</li>';
				}
				$output .= '</ul></div>';
	}
	else
	{
		$theme_name = "You don't have any active theme";
		$output = '';
	}


	if(isset($_GET['delete']))
	{
		$theme_name = $_GET['delete'];
		$dir = '../themes/'.$theme_name;
		foreach(scandir($dir) as $item)
		{
			if($item == '.' || $item == '..') continue;
			unlink($dir.DIRECTORY_SEPARATOR.$item);
		}
		rmdir($dir);
		header("location: themes.php");
	}
	
?>