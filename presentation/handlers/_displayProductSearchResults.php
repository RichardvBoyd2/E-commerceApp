<?php

?>
<head>

<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css">
<script src="../../DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="../../DataTables/datatables.js"></script>
</head>

<table id="products" class="display">
	<thead>
	<tr>
	<th>ID</th>
	<th>Product Name</th>
	<th>Description</th>
	<th>Price</th>
	<?php if ($_SESSION['Loggedin'] == true) {?>
	<th>Add To Cart</th>
	<?php }?>
	<?php if ($_SESSION['Role'] == 5) {?>
	<th>Edit</th>
	<?php }?>
	</tr>
	</thead>
	<tbody>
	<?php 
	for ($x = 0; $x < count($products); $x++) {
	    
	    echo "<tr>";
	    echo "<td>".$products[$x]['ID']."</td>";
	    echo "<td>".$products[$x]['PRODUCTNAME']."</td>";
	    echo "<td>".$products[$x]['DESCRIPTION']."</td>";
	    echo "<td>".$products[$x]['PRICE']."</td>";
	    if ($_SESSION['Loggedin'] == true) {
	        echo "<td>
    	    	<form action='addToCartHandler.php' method='post'>
    	    		<input type='hidden' name='PRODUCT_ID' value='".$products[$x]['ID']."'/>
                    <input type='hidden' name='USER_ID' value='".$_SESSION['User_id']."'/>
    	    		<input type='submit' value='Add To Cart' />
    	    	</form>
    	    </td>";
	    }
	    if ($_SESSION['Role'] == 5) {
	       echo "<td>
    	    	<form action='../views/admin/editProduct.php' method='post'>
    	    		<input type='hidden' name='ID' value='".$products[$x]['ID']."'/>
    	    		<input type='hidden' name='PRODUCTNAME' value='".$products[$x]['PRODUCTNAME']."'/>
    	    		<input type='hidden' name='DESCRIPTION' value='".$products[$x]['DESCRIPTION']."'/>
    	    		<input type='hidden' name='PRICE' value='".$products[$x]['PRICE']."'/>
    	    		<input type='submit' value='Edit' />
    	    	</form>
    	    </td>";
	    }
	    echo "</tr>";
	}
	?>
	</tbody>
</table>

<script>
$(document).ready( function () {
    $('#products').DataTable();
} );
</script>
