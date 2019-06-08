<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$ubs = new UserBusinessService();

$loginresult = $ubs->login($user, $pass);

if ($loginresult == 0) {
    echo "Login was successful!";        
} else if ($loginresult == 1) {
    echo "Incorrect Password";
} else if ($loginresult == 2) {
    echo "We couldn't find a user with that username";
}