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
