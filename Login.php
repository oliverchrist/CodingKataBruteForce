<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author christ
 */
class Login {
    private $username;
    private $password;
    
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }


    public function authenticate($checkUsername, $checkPassword){
        if($this->username == $checkUsername && $this->password == $checkPassword){
            return true;
        }
        return false;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword1($password) {
        $this->password = $password;
    }
    
}

?>
