<?php

namespace Config;

class Telegram {
    private $baseUrl;
    private $token;
    private $chatId;    

    public function setBaseUrl($baseUrl){
        $this->baseUrl = $baseUrl;
    }
    
    public function getBaseUrl(){
        return $this->baseUrl;
    }    

    public function setToken($token){
        $this->token = $token;
    }

    public function getToken(){
        return $this->token;    
    }

    public function setChatId($chatId){
        $this->chatId = $chatId;
    }

    public function getChatId(){
        return $this->chatId;
    }    
}