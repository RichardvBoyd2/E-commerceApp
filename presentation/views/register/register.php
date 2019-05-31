<?php ?>

<html>
	<head>
		<title>Registrer New User</title>
		
		<link rel="stylesheet" type="text/css" href="../../../style.css">

			
	</head>
	<body>
		<div class="navbar">
			<a href="../../../index.html">Home</a>
			<a href="register.php">Sign Up</a>			
			<a href="../login/login.php" >Log In</a>				
		</div>
		<div>
			<h1>Register a new user</h1>			
			<form action="../../handlers/registrationHandler.php" method="POST">
			<label>Username</label>
			<input name="User_name" type="text" required/>
			<label>Password</label>
			<input name="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
				title="Must contain at least one number, one uppercase and lowercase letter, 
				and be at least 8 characters long" required/>
			<label>First Name</label>
			<input name="First_name" type="text" required/>
			<label>Last Name</label>
			<input name="Last_name" type="text" required/>
			<label>Address</label>
			<input name="Address" type="text" required/>			
			<label>City</label>
			<input name="City" type="text" required/>
			<label>State</label>
			<input name="State" type="text" required/>
			<label>Zipcode</label>
			<input name="Zipcode" type="number" maxlength="5" required/>			
			<input type="submit" value="Register"/>
			</form>			
		</div>
		<hr/>
	</body>
</html>