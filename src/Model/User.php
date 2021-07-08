<?php

class User {
    private $userId;
    private $firstName;
    private $username;
    private $text;

    public function setUserId($userId){
        $this->userId = $userId;
    }
    
    public function getUserId(){
        return $this->userId;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    
    public function getUsername(){
        return $this->username;
    }

    public function setText($text){
        $this->text = $text;
    }
    
    public function getText(){
        return $this->text;
    }
}