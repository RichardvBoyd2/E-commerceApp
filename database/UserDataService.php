<?php
session_start();

class UserDataService
{
    
    function deleteUser($id) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "DELETE FROM users WHERE ID='$id'";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editUser($id, Person $newuser) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $u = mysqli_real_escape_string($conn, $newuser->getUsername());
        $p = mysqli_real_escape_string($conn, $newuser->getPassword());
        $f = mysqli_real_escape_string($conn, $newuser->getFirst_name());
        $l = mysqli_real_escape_string($conn, $newuser->getLast_name());
        $a = mysqli_real_escape_string($conn, $newuser->getAddress());
        $c = mysqli_real_escape_string($conn, $newuser->getCity());
        $s = mysqli_real_escape_string($conn, $newuser->getState());
        $z = mysqli_real_escape_string($conn, $newuser->getZip());
        $r = $newuser->getRole();
        
        $sql = "UPDATE users SET
                FIRSTNAME='$f',
                LASTNAME='$l',
                USERNAME='$u',
                PASSWORD='$p',
                ROLE='$r'
                WHERE ID='$id'";
        
        if (mysqli_query($conn, $sql)) {
            $sql = "UPDATE addresses SET
                    STREET='$a',
                    CITY='$c',
                    STATE='$s',
                    ZIP='$z'
                    WHERE USERS_ID='$id' AND ISDEFAULT='1'";
            
            if (mysqli_query($conn, $sql)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    function registerNewUser(Person $newuser) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $u = mysqli_real_escape_string($conn, $newuser->getUsername());
        $p = mysqli_real_escape_string($conn, $newuser->getPassword());
        $f = mysqli_real_escape_string($conn, $newuser->getFirst_name());
        $l = mysqli_real_escape_string($conn, $newuser->getLast_name());
        $a = mysqli_real_escape_string($conn, $newuser->getAddress());
        $c = mysqli_real_escape_string($conn, $newuser->getCity());
        $s = mysqli_real_escape_string($conn, $newuser->getState());
        $z = mysqli_real_escape_string($conn, $newuser->getZip());
        $r = $newuser->getRole();
        
        $sql = "INSERT INTO users (
                FIRSTNAME,
                LASTNAME,
                USERNAME,
                PASSWORD,
                ROLE) VALUES (
                '$f','$l','$u','$p','$r')";
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
    
    function findByIdWithAddress($id) {
        $db = new Database();
        $conn = $db->dbConnect();
        $term = mysqli_real_escape_string($conn, $name);
        
        $sql = "SELECT USERNAME, PASSWORD, ROLE, FIRSTNAME, LASTNAME, STREET, CITY, STATE, ZIP
        FROM users
        INNER JOIN addresses
        ON users.ID = addresses.USERS_ID
        WHERE users.ID = '".$id."'";
        
        $result = mysqli_query($conn, $sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
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

