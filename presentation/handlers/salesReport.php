<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$start = $_GET['startdate'];
$end = $_GET['enddate'];

$bs = new ProductBusinessService();

$report = $bs->salesReport($start, $end);
?>

<h2>Product Sales</h2>

<?php 
if ($report) {
    include '_displayReport.php';
} else {
    echo "Nothing was found for that time period.";
}
?>