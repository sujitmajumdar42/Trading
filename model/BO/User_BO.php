<?php

class UserBO{
    private $userDAO = null;
    function __construct() {
        $this->userDAO = new UserDAO();
    }
    
    function UserLogin($uname,$pass){
        return $this->userDAO->userLogin($uname, $pass);
    }
}

