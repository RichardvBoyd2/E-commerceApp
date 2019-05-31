<?php

class UserDataService
{
    
    function registerNewUser($user, $pass, $first, $last, $street, $city, $state, $zip) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $u = mysqli_real_escape_string($conn, $user);
        $p = mysqli_real_escape_string($conn, $pass);
        $f = mysqli_real_escape_string($conn, $first);
        $l = mysqli_real_escape_string($conn, $last);
        $a = mysqli_real_escape_string($conn, $street);
        $c = mysqli_real_escape_string($conn, $city);
        $s = mysqli_real_escape_string($conn, $state);
        $z = mysqli_real_escape_string($conn, $zip);
        
        $sql = "INSERT INTO users (
                FIRSTNAME,
                LASTNAME,
                USERNAME,
                PASSWORD) VALUES (
                '$f','$l','$u','$p')";
        if (mysqli_query($conn, $sql)) {
            $sql = "SELECT ID FROM users WHERE USERNAME='$u'";
            $result = mysqli_query($conn, $sql);
            $userID = mysqli_fetch_object($result);
            $ID = $userID->ID;
            
            $sql = "INSERT INTO addresses (
                USERS_ID,
                STREET,
                CITY,
                STATE,
                ZIP) VALUES (
                '$ID','$a','$c','$s','$z')";
            
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    function usernameTest($username) {
        $db = new Database();
        $conn = $db->dbConnect();
        $user = mysqli_real_escape_string($conn, $username);
        
        $sql = "SELECT * FROM users WHERE USERNAME = '".$user."'";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    function passwordTest($username, $password) {
        $db = new Database();
        $conn = $db->dbConnect();
        $user = mysqli_real_escape_string($conn, $username);
        $pass = mysqli_real_escape_string($conn, $password);
        
        $sql = "SELECT * FROM users WHERE USERNAME = '".$user."' AND PASSWORD = '".$pass."'";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows == 1) {
            $user = mysqli_fetch_object($result);
            $_SESSION['User_id'] = $user->ID;
            $_SESSION['Role'] = $user->ROLE;
            $_SESSION['Loggedin'] = true;
            return true;
        } else {
            return false;
        }
    }
    
    function findByFirstNameWithAddress($name) {
        
        $db = new Database();
        $conn = $db->dbConnect();
        $term = mysqli_real_escape_string($conn, $name);
        
        $sql = "SELECT users.ID, ISDEFAULT, FIRSTNAME, LASTNAME, STREET, CITY, STATE, ZIP
        FROM users
        INNER JOIN addresses
        ON users.ID = addresses.USERS_ID
        WHERE FIRSTNAME LIKE '%".$term."%'";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows == 0) {
            return null;
        } else {
            $persons = array();
            
            while ($person = mysqli_fetch_assoc($result)) {
                array_push($persons, $person);
            }
            return $persons;
        }
        
    }
    
}

