<?php
$access_token = 'ifKSrOv1jXoNE12N1uKII0QOKqWrBSinwdXnnwUzclDMOCTqrJby6QHr15tdniiJmBptSk5EKSbD4v+HJos9Tlz5kZMpl5X6HRGLn5RG6uq2U6BUgw2nJHPQkeH5eBLVlJOWqoeX0CH763WNwPKPBAdB04t89/1O/w1cDnyilFU=';
$channel = '926e169d43a233be864a63e84300a9c8';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channel]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($access_token, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

?>
