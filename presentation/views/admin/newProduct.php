<html>
	<head>
		<title>Create new product</title>
	</head>
	<body>
		<?php 
		include '../../../navbar.php';
		?>
		
		<h2>Create a new product</h2>
		<form action="../../handlers/newProductHandler.php" method="post">
		Name:<input type="text" name="name"/><br>
		Description:<textarea name="desc" rows="5" cols="75" maxlength="1000000000" required></textarea><br>
		Price:<input type="number" name="price" step=".01"/><br>
		<input type="submit" value="Create"/>
		</form>
		
	</body>
</html>


