<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    
    public function __construct() {
        $args = func_get_args();
        switch(func_num_args()) {
            case 3:
                self::__construct1($args[0], $args[1], $args[2]);
                break;
            case 4:
                self::__construct2($args[0], $args[1], $args[2], $args[3]);
                break;
        }
    }
    
    private function __construct1($name, $desc, $price) {
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }    
    
    private function __construct2($id, $name, $desc, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    
}

