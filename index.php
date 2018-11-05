<?php

require_once('config.php');

$content = file_get_contents("php://input");
$update = json_decode($content, true);

$telegram = new Telegram($update["message"]);
$telegram->chek_user();

if($telegram->data ==false){
    return $telegram->register();
}

$telegram->check_command();
