<?php

class UserBusinessService
{
    
    function registerNewUser($user, $pass, $first, $last, $street, $city, $state, $zip) {
        $dbservice = new UserDataService();
        if ($dbservice->registerNewUser($user, $pass, $first, $last, $street, $city, $state, $zip)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function login($username, $password) {
        $dbservice = new UserDataService();
        
        if ($dbservice->usernameTest($username)) {
            if ($dbservice->passwordTest($username, $password)) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }
    
    function findByFirstNameWithAddress($name) {
        
        $persons = array();
        
        $dbservice = new UserDataService();
        $persons = $dbservice->findByFirstNameWithAddress($name);
        
        return $persons;
    }
    
}

