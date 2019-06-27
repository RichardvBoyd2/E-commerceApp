<head>

<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css">
<script src="../../DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="../../DataTables/datatables.js"></script>
</head>

<table id="products" class="display">
	<thead>
	<tr>
	<th>Product</th>
	<th>Quantity</th>
	<th>Ordered By</th>
	<th>Date</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	for ($x=0; $x < count($report); $x++) {
	    echo "<tr>";
	    echo "<td>".$report[$x]['CURRENTDESCRIPTION']."</td>";
	    echo "<td>".$report[$x]['QUANTITY']."</td>";
	    echo "<td>".$report[$x]['FIRSTNAME']." ".$report[$x]['LASTNAME']."</td>";
	    echo "<td>".$report[$x]['DATE']."</td>";
	}
	?>
	</tbody>
</table>

<script>
$(document).ready( function () {
    $('#products').DataTable();
} );
</script>