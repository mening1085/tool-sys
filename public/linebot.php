<?php
$data_input = json_decode(file_get_contents('php://input'));
file_put_contents("data.txt", "Test : " . print_r($data_input, TRUE));

$chanel__acc_token = 'u2snjc7SQXM5JWbEfQl/U0ryhSLdFoPc4Oji/7WFii6nxMxrwcKz7c4289ZbCKGsSUxMyPQ/0sgfMUM4fhlsw6jI53yhzWtcljEH1aAWGvg7ce1+1Vkn2Cw2Mn4fLRZotOfIp0uBlvfAiu0DpZUOLwdB04t89/1O/w1cDnyilFU=';
$chanel_secret = 'adec818e5c534b2b7b5ba88c2bda34e4';
$reply_token = $data_input->events[0]->replyToken;

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($chanel__acc_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $chanel_secret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($reply_token, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
