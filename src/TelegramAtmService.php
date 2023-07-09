<?php

namespace Amohamed\TelegramAtm;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class TelegramAtmService
{

    protected $bot_token;
    protected $api_url;

    public function __construct()
    {
        $this->bot_token = config('telegramatm.bot_token');
    }

    public function getApiUrl($method)
    {
        $this->api_url = config('telegramatm.api_url') . 'bot' . $this->bot_token . '/' . $method;

        return $this->api_url;
    }

    public function sendRequest($url, $params = [])
    {
        $response = Http::asForm()->post($url, $params);
        return $response->json();
    }

    public function getMe()
    {
        $url = $this->api_url . $this->bot_token . '/getMe';
        return $this->sendRequest($url);
    }

    public function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        $url = $this->api_url . $this->bot_token . '/sendMessage';
        $params = compact('chat_id', 'text', 'parse_mode', 'disable_web_page_preview', 'disable_notification', 'reply_to_message_id', 'reply_markup');
        return $this->sendRequest($url, $params);
    }

    public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = null)
    {
        $url = $this->api_url . $this->bot_token . '/forwardMessage';
        $params = compact('chat_id', 'from_chat_id', 'message_id', 'disable_notification');
        return $this->sendRequest($url, $params);
    }

    public function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        $url = $this->api_url . $this->bot_token . '/sendPhoto';
        $params = compact('chat_id', 'photo', 'caption', 'parse_mode', 'disable_notification', 'reply_to_message_id', 'reply_markup');
        return $this->sendRequest($url, $params);
    }

    public function sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $performer = null, $title = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        $url = $this->api_url . $this->bot_token . '/sendAudio';
        $params = compact('chat_id', 'audio', 'caption', 'parse_mode', 'duration', 'performer ', 'title', 'disable_notification', 'reply_to_message_id', 'reply_markup');
        return $this->sendRequest($url, $params);
    }

    public function getUserSession($chat_id)
    {
        $user_session = DB::table('telegram_sessions')->where('chat_id', $chat_id)->first();

        return $user_session;
    }

    public function getCommand($text)
    {
        $command = Str::before($text, ' ');

        return $command;
    }

    public function getCommandParams($text)
    {
        $command_params = Str::after($text, ' ');

        return $command_params;
    }

    public function deleteUserSession($chatId)
    {
        $user_session = DB::table('telegram_sessions')->where('chat_id', $chatId)->delete();

        return $user_session;
    }   
}
