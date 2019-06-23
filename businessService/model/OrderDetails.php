<?php

class OrderDetails
{
    private $id;
    private $ordersID;
    private $productsID;
    private $quantity;
    private $currentprice;
    private $currentdescription;
    
    public function __construct() {
        $args = func_get_args();
        switch(func_num_args()) {
            case 5:
                self::__construct1($args[0], $args[1], $args[2], $args[3], $args[4]);
                break;
            case 6:
                self::__construct2($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
                break;
        }
    }
    
    private function __construct1($ordersID, $productsID, $quantity, $price, $desc) {
        $this->ordersID = $ordersID;
        $this->productsID = $productsID;
        $this->quantity = $quantity;
        $this->currentprice = $price;
        $this->currentdescription = $desc;
    }
    
    private function __construct2($id, $ordersID, $productsID, $quantity, $price, $desc) {
        $this->id = $id;
        $this->ordersID = $ordersID;
        $this->productsID = $productsID;
        $this->quantity = $quantity;
        $this->currentprice = $price;
        $this->currentdescription = $desc;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrdersID()
    {
        return $this->ordersID;
    }

    /**
     * @return mixed
     */
    public function getProductsID()
    {
        return $this->productsID;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getCurrentprice()
    {
        return $this->currentprice;
    }

    /**
     * @return mixed
     */
    public function getCurrentdescription()
    {
        return $this->currentdescription;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $ordersID
     */
    public function setOrdersID($ordersID)
    {
        $this->ordersID = $ordersID;
    }

    /**
     * @param mixed $productsID
     */
    public function setProductsID($productsID)
    {
        $this->productsID = $productsID;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $currentprice
     */
    public function setCurrentprice($currentprice)
    {
        $this->currentprice = $currentprice;
    }

    /**
     * @param mixed $currentdescription
     */
    public function setCurrentdescription($currentdescription)
    {
        $this->currentdescription = $currentdescription;
    }

    
    
}

