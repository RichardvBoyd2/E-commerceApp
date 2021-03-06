<?php

?>
<head>

<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css">
<script src="../../DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="../../DataTables/datatables.js"></script>
</head>

<h1>Thank you for your purchase!</h1>

<table id="products" class="display">
	<thead>
	<tr>
	<th>Product Name</th>
	<th>Price</th>
	<th>Quantity</th>	
	</tr>
	</thead>
	<tbody>
	<?php 
	for ($x = 0; $x < count($products); $x++) {
	    
	    echo "<tr>";
	    echo "<td>".$products[$x]['PRODUCTNAME']."</td>";
	    echo "<td>".$products[$x]['PRICE']."</td>";
	    echo "<td>".$products[$x]['QUANTITY']."</td>";	    
	    echo "</tr>";
	}
	?>
	</tbody>
</table>

<?php 
$subtotal = 0.00;
for ($x = 0; $x < count($products); $x++) {
    $subtotal += $products[$x]['QUANTITY'] * $products[$x]['PRICE'];
}

if ($promo == 0) {
    echo "Promo code was invalid";
} else if ($promo == 1) {
    echo "You've already used this promo code";
} else {
    echo ($promo * 100)." percent discount applied!";
    $subtotal = $subtotal - ($subtotal * $promo);
}

echo "<h2>Your total was: $".number_format((float)$subtotal, 2, '.', '')."</h2>";
?>

<script>
$(document).ready( function () {
    $('#products').DataTable();
} );
</script>