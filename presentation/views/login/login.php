<?php ?>

<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		 
		<?php 
		include '../../../navbar.php';
		?>
		
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