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
    public $getUpdate;    
    
    public $messageBot;

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

    public function getUpdates(){
        $this->getUpdate = file_get_contents('php://input');
        $this->getUpdate = json_decode($this->getUpdate, TRUE);
        return $this->getUpdate;        
    }

    public function getUserData(){
        $this->getUpdates();

        $this->setUserId($this->getUpdate['message']['from']['id']);
        $this->setFirstName($this->getUpdate['message']['from']['first_name']);
        $this->setUsername($this->getUpdate['message']['from']['username']);
        $this->setText($this->getUpdate['message']['text']);
    }

    public function sendMessage($text) {        
        $this->setText($text);        
    
        $url = $this->getUrlToken()."/sendMessage?chat_id=-".$this->getChatId()."&parse_mode=HTML&text=".urlencode($this->getText());
        file_get_contents($url);
    }
}