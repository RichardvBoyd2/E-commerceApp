<?php

class ProductBusinessService
{
    
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

