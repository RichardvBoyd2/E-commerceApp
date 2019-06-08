<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$id = $_POST['id'];

$pbs = new ProductBusinessService();

if ($pbs->deleteProduct($id)) {
    echo "Product successfully deleted.";
} else {
    echo "There was a problem deleting this product.";
}