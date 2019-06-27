<?php
include '../../navbar.php';
require_once '../../Autoloader.php';

$cartID = $_POST['cartID'];
$user = $_SESSION['User_id'];

$pbs = new ProductBusinessService();

if ($pbs->removeFromCart($cartID, $user)) {
    echo "Item successfully removed from cart";
} else {
    echo "There was a problem";
}