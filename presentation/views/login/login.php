<?php ?>

<html>
	<head>
		<title>Login</title>	
		
		<link rel="stylesheet" type="text/css" href="../../../style.css">

			
	</head>
	<body>
		 
		<div class="navbar">
			<a href="../../../index.html">Home</a>
			<a href="../register/register.php">Sign Up</a>			
			<a href="login.php" >Log In</a>				
		</div>
		
		<div>
			<h1>Log in</h1>
			<form action="../../handlers/loginHandler.php" method="POST">
			<label>Username </label>
			<input name="username" type="text" required/><br/>
			<label>Password </label>
			<input name="password" type="password" required/><br/>
			<input type="submit" value="Login" class="submit"/>
			</form>
		</div>
		<hr/>
	</body>
</html>