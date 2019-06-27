<?php

class ProductBusinessService
{
    function salesReport($start, $end) {
        $report = array();
        $dbservice = new ProductDataService();
        $report = $dbservice->salesReport($start, $end);
        return $report;
    }
    
    function removeFromCart($cartID, $user) {
        $dbservice = new ProductDataService();
        if ($dbservice->removeFromCart($cartID, $user)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editQuantity($cartID, $quantity) {
        $dbservice = new ProductDataService();
        if ($dbservice->editQuantity($cartID, $quantity)) {
            return true;
        } else {
            return false;
        }
    }
    
    function getCart($user) {
        $products = array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->getCart($user);
        
        return $products;
    }
    
    function addToCart($user, $product) {
        $dbservice = new ProductDataService();
        if ($dbservice->addToCart($user, $product)) {
            return true;
        } else {
            return false;
        }
    }
    
    function deleteProduct($id) {
        $dbservice = new ProductDataService();
        if ($dbservice->deleteProduct($id)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editProduct(Product $product) {
        $dbservice = new ProductDataService();
        if ($dbservice->editProduct($product)) {
            return true;
        } else {
            return false;
        }
    }
    
    function newProduct(Product $product) {
        $dbservice = new ProductDataService();
        if ($dbservice->newProduct($product)) {
            return true;            
        } else {
            return false;            
        }
    }
    
    function findByProductName($name) {
        $products = array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByProductName($name);
        
        return $products;
    }
    
}

