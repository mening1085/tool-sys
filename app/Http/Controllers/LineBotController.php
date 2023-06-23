<?php

namespace App\Http\Controllers;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class LineBotController extends Controller
{
    protected $bot;

    public function __construct()
    {
        $this->bot = new LINEBot(new CurlHTTPClient(env('LINE_ACCESS_TOKEN')), [
            'channelSecret' => env('LINE_CHANNEL_SECRET')
        ]);
    }

    public function handleWebhook()
    {
        $json_string = file_get_contents('php://input');
        $json_object = json_decode($json_string);

        $message = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Hello, world!');
        $response = $this->bot->replyMessage($json_object->events[0]->replyToken, $message);

        return $response->getHTTPStatus() . ' ' . $response->getRawBody();
    }
}
