<?php
	
	session_start();
	if(isset($_POST['logintoadminpanel']))
	{
		include_once 'connection.php';
	
		$username = $_POST['username'];
		$password = $_POST['password'];
			
		if(empty($username) || empty($password))
		{
			$error = 'Please fill the required fields';
		}
		else
		{
			$username = strip_tags($username);
			$password = strip_tags($password);
			
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$password = md5($password);
			$sql = mysql_query("SELECT * FROM users WHERE name = '$username' && password = '$password' LIMIT 1") or die(mysql_error());
			$num_rows = mysql_num_rows($sql);
			if($num_rows == 1)
			{
				$rows = mysql_fetch_array($sql);
				extract($rows);
				
				$_SESSION['username'] = $name;
				$_SESSION['level'] = $access_level;
				
				if(isset($_SESSION['username']))
				{
					$update = mysql_query("UPDATE users SET last_log_time = now()") or die(mysql_error());
					header("location: index.php");
				}
				
			}
			else
			{
				$error = 'Invalid Credentials';
			}
		
		}
		
		
	}
?>