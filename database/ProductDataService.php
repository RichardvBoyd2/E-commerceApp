<?php

class ProductDataService
{
    
    function deleteProduct($id) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "DELETE FROM products WHERE ID='$id'";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editProduct(Product $product) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $i = $product->getId();
        $n = $product->getName();
        $d = $product->getDescription();
        $p = $product->getPrice();
        
        $sql = "UPDATE products SET
                PRODUCTNAME='$n', DESCRIPTION='$d', PRICE='$p'
                WHERE ID='$i'";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function newProduct(Product $product) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $n = mysqli_real_escape_string($conn, $product->getName());
        $d = mysqli_real_escape_string($conn, $product->getDescription());
        $p = $product->getPrice();
        
        $sql = "INSERT INTO products (
                PRODUCTNAME,
                DESCRIPTION,
                PRICE) VALUES (
                '$n','$d','$p')";
        
        if (mysqli_query($conn, $sql)) {
            return true;            
        } else {
            return false;            
        }
        
    }
    
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

