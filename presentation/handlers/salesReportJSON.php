<?php
require_once '../../Autoloader.php';

$start = $_GET['startdate'];
$end = $_GET['enddate'];

$bs = new ProductBusinessService();

$report = $bs->salesReport($start, $end);
?>

<h2>Product Sales</h2>

<?php 
if ($report) {
    echo json_encode($report);
} else {
    echo "Nothing was found for that time period.";
}
?>