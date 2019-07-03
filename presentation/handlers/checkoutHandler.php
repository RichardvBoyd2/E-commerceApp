<?php
session_start();
require_once '../../Autoloader.php';
include '../../navbar.php';

$user = $_SESSION['User_id'];
$code = $_POST['promo'];

$bs = new ProductBusinessService();

$products = $bs->getCart($user);

$cbs = new CheckoutBusinessService();

if ($cbs->checkout($products)) {
    $promo = $bs->promoCode($code);
    include '_displayReceipt.php';
} else {
    echo "There was a problem completing your order.";
}