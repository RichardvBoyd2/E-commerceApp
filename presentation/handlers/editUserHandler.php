<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$id = $_POST['id'];
$user = $_POST['User_name'];
$pass = $_POST['Password'];
$first = $_POST['First_name'];
$last = $_POST['Last_name'];
$street = $_POST['Address'];
$city = $_POST['City'];
$state = $_POST['State'];
$zip = $_POST['Zipcode'];
$role = 1;
if ($_POST['Role'] == "admin") {
    $role = 5;
}

$ubs = new UserBusinessService();

$newuser = new Person($user, $pass, $first, $last, $street, $city, $state, $zip, $role);

if ($ubs->editUser($id, $newuser)) {
    echo $first."'s account has successfully been updated.";
} else {
    echo "There was a problem editing this account.";
}