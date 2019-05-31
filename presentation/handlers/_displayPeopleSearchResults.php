<?php

?>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>

<table id="customers">
	<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Default Address?</th>
	<th>Street</th>
	<th>City</th>
	<th>State</th>
	<th>Zip Code</th>
	</tr>
	
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
	}
	?>

</table>