<?php
require_once '../../../Autoloader.php';
include '../../../navbar.php';

?>

<html>
	<head>
		<title>Select Dates</title>
		<link rel="stylesheet" type="text/css" href="../../../style.css">
	</head>
	<body>
		<h2>Select Date Range</h2>
		<form action="../../handlers/salesReport.php" method="get">
		Start Date:<input type="date" name="startdate" />
		End Date:<input type="date" name="enddate" />
		<input type="submit" value="Generate" />
		</form>
	</body>
</html>