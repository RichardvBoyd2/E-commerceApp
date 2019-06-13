<?php
include '../../navbar.php';
require_once '../../Autoloader.php';

$cartID = $_POST['cartID'];

$pbs = new ProductBusinessService();

if ($pbs->removeFromCart($cartID)) {
    echo "Item successfully removed from cart";
} else {
    echo "There was a problem";
}