<?php

class UserBusinessService
{
    
    function deleteUser($id) {
        $dbservice = new UserDataService();
        if ($dbservice->deleteUser($id)) {
            return true;
        } else {
            return false;
        }
    }
    
    function editUser($id, Person $user) {
        $dbservice = new UserDataService();
        if ($dbservice->editUser($id, $user)) {
            return true;
        } else {
            return false;
        }
    }
    
    function registerNewUser(Person $newuser) {
        $dbservice = new UserDataService();
        if ($dbservice->registerNewUser($newuser)) {
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
    
    function findByIdWithAddress($id) {
        $dbservice = new UserDataService();
        
        $person = $dbservice->findByIdWithAddress($id);
        return $person;
    }
    
    function findByFirstNameWithAddress($name) {
        
        $persons = array();
        
        $dbservice = new UserDataService();
        $persons = $dbservice->findByFirstNameWithAddress($name);
        
        return $persons;
    }
    
}

