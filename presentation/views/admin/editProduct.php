<html>
	<head>
		<title>Edit Product</title>
		<link rel="stylesheet" type="text/css" href="../../../style.css">
		<style>
		#hidden {
		display: none;
		}
		</style>
	</head>
	<body>
		<?php 
		include '../../../navbar.php';
		$i = $_POST['ID'];
		
		$n = $_POST['PRODUCTNAME'];
		$d = $_POST['DESCRIPTION'];
		$p = $_POST['PRICE'];
		?>
		
		<h2>Edit Product</h2>
		<form action="../../handlers/editProductHandler.php" method="post">
		<input type="hidden" name ="id" value="<?php echo $i ?>" />
		Name:<input name="name" type="text" value="<?php echo $n ?>" required /><br>
		Description:<textarea name="desc" rows="5" cols="75" maxlength="1000000000" required><?php echo $d ?></textarea><br>
		Price:<input name="price" type="number" step=".01" value="<?php echo $p ?>" required /><br>
		<input type="submit" value="Submit" />
		</form>
		
		<button onclick="myFunction()">Delete this product</button>
		
		<div id="hidden" >
		<form action="../../handlers/deleteProductHandler.php" method="post">
		Are you sure?<input type="hidden" name ="id" value="<?php echo $i ?>" />
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