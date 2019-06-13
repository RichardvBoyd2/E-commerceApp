<?php
include '../../navbar.php';
require_once '../../Autoloader.php';

$product_id = $_POST['PRODUCT_ID'];
$user_id = $_POST['USER_ID'];

$pbs = new ProductBusinessService();

if ($pbs->addToCart($user_id, $product_id)) {
    echo "Product successfully added to cart.";
} else {
    echo "There was a problem adding item to cart.";
}