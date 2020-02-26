<?php

require __DIR__."/vendor/autoload.php";

include './config.php';

$config = new \Config\Telegram();

$file = file_get_contents('./env-example.json');

$config->configByJson($file);
