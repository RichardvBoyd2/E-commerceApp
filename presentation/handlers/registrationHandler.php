<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$user = $_POST['User_name'];
$pass = $_POST['Password'];
$first = $_POST['First_name'];
$last = $_POST['Last_name'];
$street = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$zip = $_POST['Zipcode'];

$ubs = new UserBusinessService();

$newuser = new Person($user, $pass, $first, $last, $street, $city, $state, $zip, 1);

if ($ubs->registerNewUser($newuser)) {
    echo "Registration successful! Enjoy your account ".$first."!";
} else {
    echo "There was a problem registering your account.";
}