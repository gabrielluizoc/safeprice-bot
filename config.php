<?php

namespace Config;

use User;

include './src/Model/User.php';

class Telegram extends User{
    private $baseUrl;
    private $token;
    private $chatId;
    private $urlToken;
    public $jsonFileConfig;

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

    public function setUrlToken($baseUrl, $token){
        $this->urlToken = $baseUrl.$token;
    }

    public function getUrlToken(){
        return $this->urlToken;
    }

    public function configByJson($file){
        $this->jsonFileConfig = json_decode($file);
        foreach($this->jsonFileConfig as $value):
            $this->baseUrl = $value->BASE_URL;
            $this->token = $value->TOKEN;
            $this->chatId = $value->CHAT_ID;
            $this->setUrlToken($this->baseUrl, $this->token);
        endforeach;

        return $this->getUrlToken();
    }
}