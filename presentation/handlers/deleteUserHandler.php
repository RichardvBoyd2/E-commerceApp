<?php
require_once '../../Autoloader.php';
include '../../navbar.php';

$id = $_POST['id'];

$ubs = new UserBusinessService();

if ($ubs->deleteUser($id)) {
    echo "User successfully deleted.";
} else {
    echo "There was a problem deleting this user.";
}