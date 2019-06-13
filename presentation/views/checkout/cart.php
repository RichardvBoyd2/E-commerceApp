<?php

require_once '../../../Autoloader.php';
include '../../../navbar.php';

$user = $_SESSION['User_id'];

$bs = new ProductBusinessService();

$products = $bs->getCart($user);

?>

<h2>Your Shopping Cart</h2>

<?php 

if ($products) {
    include '../../handlers/_displayCart.php';
} else {
    echo "Your cart is empty! Get some stuff in there!";
}

?>