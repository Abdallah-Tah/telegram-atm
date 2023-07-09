<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Telegram Bot Token
    |--------------------------------------------------------------------------
    |
    | This value is the token of your Telegram bot. You can set this in your 
    | .env file, with the key `TELEGRAM_BOT_TOKEN`
    |
    */

    'bot_token' => env('TELEGRAM_BOT_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | API URLs
    |--------------------------------------------------------------------------
    |
    | This section is for any URLs your package needs to hit. For instance, 
    | the Telegram API URL.
    |
    */
    'api_url' => env('TELEGRAM_API_URL', 'https://api.telegram.org/bot'),

    /*
    |--------------------------------------------------------------------------
    | Other Settings
    |--------------------------------------------------------------------------
    |
    | Any other settings that your package needs can go here. You can create 
    | as many different sections as you want.
    |
    */
];
