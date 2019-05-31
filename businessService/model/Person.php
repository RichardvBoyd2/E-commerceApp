<?php

class Person
{
    
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $role;
    
    public function __construct($id, $first, $last, $user, $role) {
        $this->id = $id;
        $this->first_name = $first;
        $this->last_name = $last;
        $this->username = $user;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    
    
    
}

