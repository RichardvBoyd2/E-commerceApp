<?php

session_start();
$_SESSION = array();
if (session_destroy()) {
    $message = "You are now logged out.";
} else {
    $message = "There was an issue logging you out.";
}

include '../../../navbar.php';
echo $message;