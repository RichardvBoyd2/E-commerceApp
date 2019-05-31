<?php

class Address
{
    
    private $id;
    private $addresstype;
    private $isdefault;
    private $user_id;
    private $street;
    private $city;
    private $state;
    private $zip;
    
    public function __construct($a, $b, $c, $d, $e, $f, $g, $h) {
        $this->id = $a;
        $this->addresstype = $b;
        $this->isdefault = $c;
        $this->user_id = $d;
        $this->street = $e;
        $this->city = $f;
        $this->state = $g;
        $this->zip = $h;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAddresstype()
    {
        return $this->addresstype;
    }

    public function getIsdefault()
    {
        return $this->isdefault;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAddresstype($addresstype)
    {
        $this->addresstype = $addresstype;
    }

    public function setIsdefault($isdefault)
    {
        $this->isdefault = $isdefault;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    
    
    
}

