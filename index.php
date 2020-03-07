<?php

require __DIR__."/vendor/autoload.php";

include './config.php';

$config = new \Config\Telegram();

$file = file_get_contents('./env-example.json');

$config->configByJson($file);

$config->getUserData();

$chatId = $config->getChatId();

$urlToken = $config->getUrlToken();

$config->sendMessage(json_encode($config->getUpdates(), JSON_PRETTY_PRINT));