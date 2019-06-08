<html>
<?php
require_once '../../../Autoloader.php';
include '../../../navbar.php';

$id = $_POST['ID'];

$ubs = new UserBusinessService();
$user = $ubs->findByIdWithAddress($id);

//TODO create the handler and business and data functions for editing user data
?>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="../../../style.css">
	<style>
		#hidden {
		display: none;
		}
	</style>
</head>
<body>
	<h1>Edit user</h1>			
	<form action="../../handlers/editUserHandler.php" method="POST">
		<label>Username</label>
	<input name="User_name" type="text" value="<?php echo $user['USERNAME']?>" required/>
		<label>Password</label>
	<input name="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
		title="Must contain at least one number, one uppercase and lowercase letter, 
		and be at least 8 characters long" required/>
		<label>First Name</label>
	<input name="First_name" type="text" value="<?php echo $user['FIRSTNAME']?>" required/>
		<label>Last Name</label>
	<input name="Last_name" type="text" value="<?php echo $user['LASTNAME']?>" required/>
		<label>Address</label>
	<input name="Address" type="text" value="<?php echo $user['STREET']?>" required/>			
		<label>City</label>
	<input name="City" type="text" value="<?php echo $user['CITY']?>" required/>
		<label>State</label>
	<input name="State" type="text" value="<?php echo $user['STATE']?>" required/>
		<label>Zipcode</label>
	<input name="Zipcode" type="number" maxlength="5" value="<?php echo $user['ZIP']?>" required/>
	<?php 
	if ($user["ROLE"] == 5) {
	    echo "<label>Current role: admin</label>";
	} else {
	    echo "<label>Current role: customer</label>";
	}
	?>
	<select name="Role">
		<option value='admin'>admin</option>
		<option value='customer'>customer</option>
	</select>
	<input type="hidden" name="id" value="<?php echo $id ?>" />
	<input type="submit" value="Edit"/>
	</form>
	
	<button onclick="myFunction()">Delete this user</button>
		
	<div id="hidden" >
	<form action="../../handlers/deleteUserHandler.php" method="post">
	Are you sure?<input type="hidden" name ="id" value="<?php echo $id ?>" />
	<input type="submit" value="I'm sure" />
	</form>
	</div>
	
	<script>
    function myFunction() {
      var x = document.getElementById("hidden");
      if (x.style.display == "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
	
</body>

</html>