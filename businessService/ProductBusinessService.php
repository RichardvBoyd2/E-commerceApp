<?php

class ProductBusinessService
{
    
    function findByProductName($name) {
        $products = array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByProductName($name);
        
        return $products;
    }
    
}

