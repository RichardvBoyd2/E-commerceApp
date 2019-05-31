<?php

class Database {
    
    private $server = "localhost";
    private $user = "root";
    private $pass = "root";
    private $db = "merchstore";
    
    function dbConnect() {
        
        $conn = mysqli_connect($this->server,$this->user,$this->pass,$this->db,8889);
        
        if ($conn->connect_error) {
            echo "Connection failed ".$conn->connect_error."<br>";
        } else {
            return $conn;
        }
        
    }
}