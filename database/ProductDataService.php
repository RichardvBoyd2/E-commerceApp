<?php

class ProductDataService
{
    
    function findByProductName($name) {
        $db = new Database();
        $conn = $db->dbConnect();
        $term = mysqli_real_escape_string($conn, $name);
        $sql = "SELECT * FROM PRODUCTS WHERE PRODUCTNAME LIKE '%".$term."%'";
        
        $result = mysqli_query($conn, $sql);
                
        if ($result->num_rows == 0 ) {
            return null;
        } else {
            
            $products = array();
            
            while ($product = mysqli_fetch_assoc($result)) {
                array_push($products, $product);
            }
            
            return $products;
        }
    }
    
}

