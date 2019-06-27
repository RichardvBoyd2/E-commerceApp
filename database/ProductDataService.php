<?php

class ProductDataService
{
    function salesReport($start, $end) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "SELECT CURRENTDESCRIPTION, QUANTITY, FIRSTNAME, LASTNAME, DATE
                FROM orders 
                JOIN orderdetails ON orders.ID = orderdetails.ORDERS_ID
                JOIN users ON orders.USERS_ID = users.ID
                WHERE DATE > '$start' AND DATE < '$end'
                ORDER BY QUANTITY DESC";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows == 0 ) {
            return null;
        } else {
            
            $report = array();
            
            while ($product = mysqli_fetch_assoc($result)) {
                array_push($report, $product);
            }
            
            return $report;
        }
        
    }
    
    function getLastOrderId() {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql2 = "SELECT ID FROM orders ORDER BY ID DESC LIMIT 1";
        $result = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result);
        $orderid = $row['ID'];
        
        return $orderid;
    }
    
    function removeFromCart($cartID, $user) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "DELETE FROM cart WHERE ID='$cartID' AND USERS_ID='$user'";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editQuantity($cartID, $quantity) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "UPDATE cart SET 
                QUANTITY='$quantity' 
                WHERE ID='$cartID'";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function getCart($user) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "SELECT cart.ID AS 'cart.ID', products.ID AS 'products.ID', PRODUCTNAME, PRICE, QUANTITY
                FROM cart
                INNER JOIN products
                ON cart.PRODUCTS_ID = products.ID
                WHERE cart.USERS_ID = '$user'";
        
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
    
    function addToCart($user, $product) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        $sql = "INSERT INTO cart (USERS_ID, PRODUCTS_ID)
                VALUES ('$user', '$product')";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
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

