<?php

require_once dirname(__FILE__) . '/Login.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BruteForce
 *
 * @author christ
 */
class BruteForce {
    private $loginObj;
    private $minAscii = 97;
    private $maxAscii = 122;
    private $maxVersuche = 10000000;
    private $password = array();

    public function __construct($username, $password) {
        $this->loginObj = new Login($username, $password);
        $this->password[] = $this->minAscii;
    }
    
    public function force(){
        $versuche = 0;
        while($currentPassword = $this->generatePassword()){
            
            $versuche++;
            if($versuche > $this->maxVersuche){
                echo "\nPasswort: " . $currentPassword . "\n";
                echo "\n" . 'Versuche: ' . $versuche . "\n\n";
                return false;
            }
            if($this->loginObj->authenticate('oliver', $currentPassword)){
                echo "\nPasswort: " . $currentPassword . "\n";
                echo "\n" . 'Versuche: ' . $versuche . "\n\n";
                return true;
            }
        }
        return false;
    }
    
    public function generatePassword() {
        $password = '';
        foreach ($this->password as $character){
            $password = chr($character) . $password;
        }
        #echo "\ncurrent password: " . $password;
        $this->password[0] += 1;
        $this->checkForPotenzSprung(0);
        return $password;
    }
    
    public function checkForPotenzSprung($index) {
        if($this->password[$index] > $this->maxAscii){
            $this->password[$index] = $this->minAscii;
            if(empty($this->password[$index + 1])){
                $this->password[$index + 1] = $this->minAscii;
            }else{
                $this->password[$index + 1] += 1;
                $this->checkForPotenzSprung($index + 1);
            }
        }
    }
}

?>
