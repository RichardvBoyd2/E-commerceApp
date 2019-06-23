<?php
require_once '../../Autoloader.php';

class CheckoutDataService {
    private $conn;
    
    function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function clearCart($userID) {
        $sql = "DELETE FROM cart WHERE USERS_ID='$userID'";
        
        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function newOrder(Order $order) {
        $pds = new ProductDataService();
        $orderid = $pds->getLastOrderId();
        $orderid++;
        
        $user = $order->getUserID();
        $address = $order->getAddressID();        
        $sql2 = "INSERT INTO orders (ID, USERS_ID, ADDRESSES_ID) 
                VALUES ('$orderid','$user','$address')";
        
        if (mysqli_query($this->conn, $sql2)) {            
            return $orderid;
        } else {
            echo "insert into orders failed";
            return 0;
        }
    }
    
    public function newOrderdetail(OrderDetails $orderdetails) {
        $o = $orderdetails->getOrdersID();
        $p = $orderdetails->getProductsID();
        $q = $orderdetails->getQuantity();
        $cp = $orderdetails->getCurrentprice();
        $cd = $orderdetails->getCurrentdescription();
        
        $sql3 = "INSERT INTO orderdetails (
                ORDERS_ID,
                PRODUCTS_ID,
                QUANTITY,
                CURRENTPRICE,
                CURRENTDESCRIPTION ) VALUES (
                '$o','$p','$q','$cp','$cd')";
        
        if (mysqli_query($this->conn, $sql3)) {
            return true;
        } else {
            return false;
        }
    }
}