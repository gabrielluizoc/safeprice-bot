<?php

require __DIR__."/vendor/autoload.php";

include './config.php';

$config = new \Config\Telegram();

$file = file_get_contents('./env.json');

$config->configByJson($file);

$config->getUserData();

$chatId = $config->getChatId();

$urlToken = $config->getUrlToken();

if($config->getText() == '/price'){
    $res = shell_exec('python3 ./crawler/safemoon.py');
    $config->sendMessage($res);
}




