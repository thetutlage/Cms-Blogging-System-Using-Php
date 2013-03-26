<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'cms';	
	
	$conn = mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());
		mysql_select_db($db_name,$conn);

?>