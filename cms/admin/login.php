<?php include_once( 'scripts/login-scripts.php' );?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
	<meta charset="utf-8">  
	<title>Untitled</title>  
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
</head>
<body>
	<div id="mainWrapper">
	
		<div id="fake">&nbsp;</div>
	
		<?php if(isset($error)) { echo '<div id="errors">'.$error.'</div>'; }?>
		<div id="loginform">
			<h2>Login Area</h2>
			
			<form method="post" action="login.php">
				<div class="form-elements">
					<label for="Username">Username</label>
					<input type="text" name="username" placeholder="Enter Username" id="username"/>
				</div>

				<div class="form-elements">
					<label for="Password">Password</label>
					<input type="password" name="password" placeholder="Enter Password" id="password"/>
				</div>
				
				<div class="form-elements">
					<label></label>
					<input type="submit" name="logintoadminpanel" value="Login" id="logintoadminpanel" class="myButton"/>
				</div>				
			</form>
			
		</div>
	
	
	</div><!--end mainWrapper-->
</body>
</html>