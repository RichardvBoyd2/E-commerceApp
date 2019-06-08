<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];

$pbs = new ProductBusinessService();

$newProduct = new Product($id, $name, $desc, $price);

if ($pbs->editProduct($newProduct)) {
    echo $name." was successfully edited.";
} else {
    echo "There was a problem editing this product.";
}

?>