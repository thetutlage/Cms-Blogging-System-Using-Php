<?php
	session_start();	
	if(isset($_SESSION['username']) && ($_SESSION['username'] !== ''))
	{
		$session_name = $_SESSION['username'];
		$session_level = $_SESSION['level'];
	}
	else
	{
		header("location:login.php");
	}
?>