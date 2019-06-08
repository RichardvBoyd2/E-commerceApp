<html>
	
	<body>
		<?php 
		include 'navbar.php';
		?>
					
		<h1>Product Search</h1>
		<form action="presentation/handlers/ProductSearchHandler.php" method="post">
		Search for a product:<input type="text" name="product" /><br>
		<label>(Leave blank to see full catalog)</label><br>
		<input type="submit" value="Search" />
		</form>
		
		<h1>Person Search</h1>
		<form action="presentation/handlers/PersonSearchHandler.php" method="post">
		Search for a person:<input type="text" name="name" /><br>
		<input type="submit" value="Search" />
		</form>
		
	</body>	
</html>