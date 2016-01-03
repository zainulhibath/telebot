<?php

include('basics.php');

use unreal4u\TelegramLog;
use unreal4u\Telegram\Methods\SendPhoto;
use GuzzleHttp\Exception\ClientException;

$tgLog = new TelegramLog(BOT_TOKEN);

$sendPhoto = new SendPhoto();
$sendPhoto->chat_id = A_USER_CHAT_ID;
// Send out cURL-style file
$sendPhoto->photo = '@examples/binary-test-data/demo-photo.jpg';
$sendPhoto->caption = 'Not sure if sending image or image not arriving';

try {
    $message = $tgLog->performApiRequest($sendPhoto);
    echo '<pre>';
    var_dump($message);
    echo '</pre>';
} catch (ClientException $e) {
    echo '<pre>';
    var_dump($e->getMessage());
    var_dump($e->getRequest());
    var_dump($e->getTrace());
    echo '</pre>';
}
