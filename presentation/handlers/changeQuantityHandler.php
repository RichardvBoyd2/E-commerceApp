<?php
include '../../navbar.php';
require_once '../../Autoloader.php';

$cartID = $_POST['cartID'];
$quantity = $_POST['quantity'];

$pbs = new ProductBusinessService();

if ($quantity < 1) {
    if ($pbs->removeFromCart($cartID)) {
        echo "Item successfully removed from cart";
    } else {
        echo "There was a problem";
    }
} else {
    if ($pbs->editQuantity($cartID, $quantity)) {
        echo "Quantity successfully updated.";
    } else {
        echo "There was a problem updating the quantity.";
    }
}

