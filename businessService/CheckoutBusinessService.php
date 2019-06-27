<?php
session_start();
require_once '../../Autoloader.php';

class CheckoutBusinessService
{
    public function checkout($products) {
        $db = new Database();
        $conn = $db->dbConnect();
        
        mysqli_autocommit($conn, FALSE);
        mysqli_begin_transaction($conn);
        
        $user = $_SESSION['User_id'];
        
        $order = new Order();
        $order->setUserID($user);
        $order->setAddressID($user);
        
        $checkout = new CheckoutDataService($conn);
        
        $orderID = $checkout->newOrder($order);
        
        $detailstest;
                
        for ($x = 0; $x < count($products); $x++) {
            
            $detail = new OrderDetails($orderID, $products[$x]['products.ID'], $products[$x]['QUANTITY'], $products[$x]['PRICE'], $products[$x]['PRODUCTNAME']);
            if ($checkout->newOrderdetail($detail)) {
                $detailstest = false;
            } else {
                $detailstest = true;
                break;
            }
        }
        
        $cartClearTest = $checkout->clearCart($user);
        
        if ($orderID && !$detailstest && $cartClearTest) {
            mysqli_commit($conn);
            mysqli_close($conn);
            return true;
        } else {            
            mysqli_rollback($conn);
            mysqli_close($conn);
            return false;
        }
    }
}

