<?php

class Product
{
    
    private $id;
    private $name;
    private $description;
    private $price;
    
    public function __construct($id, $name, $desc, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
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

    public function setId($id)
    {
        $this->id = $id;
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

