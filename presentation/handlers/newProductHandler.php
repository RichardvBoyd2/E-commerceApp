<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];

$pbs = new ProductBusinessService();

$newProduct = new Product($name, $desc, $price);

if ($pbs->newProduct($newProduct)) {
    echo $name." was successfully added.";
} else {
    echo "There was a problem creating a new product.";
}

?>