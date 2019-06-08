<?php

?>
<head>
<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css">
<script src="../../DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="../../DataTables/datatables.js"></script>
</head>

<table id="customers" class="display">
	<thead>
	<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Default Address?</th>
	<th>Street</th>
	<th>City</th>
	<th>State</th>
	<th>Zip Code</th>
	<?php if ($_SESSION['Role'] == 5) {?>
	<th>Edit?</th>
	<?php }?>
	</tr>
	</thead>
	<tbody>
	<?php 
	for ($x = 0; $x < count($persons); $x++) {
	    echo "<tr>";
	    echo "<td>".$persons[$x]['ID']."</td>";
	    echo "<td>".$persons[$x]['FIRSTNAME']."</td>";
	    echo "<td>".$persons[$x]['LASTNAME']."</td>";
	    echo "<td>".$persons[$x]['ISDEFAULT']."</td>";
	    echo "<td>".$persons[$x]['STREET']."</td>";
	    echo "<td>".$persons[$x]['CITY']."</td>";
	    echo "<td>".$persons[$x]['STATE']."</td>";
	    echo "<td>".$persons[$x]['ZIP']."</td>";
	    if ($_SESSION['Role'] == 5) {
	    echo "<td>
                <form action='../views/admin/editUser.php' method='post'>
            	   <input type='hidden' name='ID' value='".$persons[$x]['ID']."'/>
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
    $('#customers').DataTable();
} );
</script>