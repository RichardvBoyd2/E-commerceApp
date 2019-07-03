<?php

class ProductDataService
{
    function promoUse($couponID) {
        $db = new Database();
        $conn = $db->dbConnect();
        $userID = $_SESSION['User_id'];
        
        $sql = "INSERT INTO couponuses (
                COUPON_ID, USER_ID) VALUES (
                '$couponID','$userID')";
        
        if (mysqli_query($conn, $sql)) {
            $note = "Coupon ID = ".$couponID;
            $order = $this->getLastOrderId();
            
            $sql2 = "INSERT INTO ordernotes (
                     NOTES, ORDERS_ID, USERS_ID) VALUES (
                     '$note','$order','$userID')";
            mysqli_query($conn, $sql2);
            
            return true;
        } else {
            return false;
        }
    }
    
    function promoCheck($code) {
        $db = new Database();
        $conn = $db->dbConnect();
        $test = mysqli_real_escape_string($conn, $code);
        
        $sql = "SELECT * FROM coupons WHERE CODE='$code'";
        $result = mysqli_query($conn, $sql);
        $coupon = mysqli_fetch_assoc($result);
        $couponID = $coupon['ID'];
        $userID = $_SESSION['User_id'];
        
        $sql2 = "SELECT * FROM couponuses 
                WHERE COUPON_ID='$couponID' AND USER_ID='$userID'";
        $result2 = mysqli_query($conn, $sql2);
        
        if ($result->num_rows == 1) {
            if ($result2->num_rows >= 1) {
                //code already used
                return 1;
            } else {
                //code successful!
                return $coupon;
            }
        } else {
            //no code found
            return 0;
        }
    }
    
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

