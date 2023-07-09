# TelegramAtm

A custom Laravel package for interacting with the Telegram API.

## Installation

Install the package via composer:

```bash
composer require amohamed/telegram-atm:dev-master
```

## Configuration

Publish the package configuration file using:

```bash
php artisan vendor:publish --provider="Amohamed\TelegramAtm\TelegramAtmServiceProvider"
```

Then, you can modify the published configuration file located at `config/telegramatm.php` with your Telegram bot's details.

## Usage

Inject `Amohamed\TelegramAtm\TelegramAtmService` in your service or controller:

```php
use Amohamed\TelegramAtm\TelegramAtmService;

class MyController extends Controller
{
    protected $telegramAtmService;

    public function __construct(TelegramAtmService $telegramAtmService)
    {
        $this->telegramAtmService = $telegramAtmService;
    }

    public function someMethod()
    {
        // Use the telegramAtmService instance
    }
}
```

## Available Methods

Here are the available methods you can use:

### `getApiUrl($method)`

This method returns the Telegram API URL for the given method.

- `$method` (string): The Telegram API method.

### `sendRequest($url, $params = [])`

This method sends a request to the Telegram API.

- `$url` (string): The Telegram API URL.
- `$params` (array): The request parameters.

### `getMe()`

This method returns information about the bot.

### `sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)`

This method sends a text message to a chat.

- `$chat_id` (int|string): The chat ID.
- `$text` (string): The message text.
- `$parse_mode` (string|null): The parse mode of the message text.
- `$disable_web_page_preview` (bool|null): Whether to disable the web page preview.
- `$disable_notification` (bool|null): Whether to disable the notification.
- `$reply_to_message_id` (int|null): The ID of the message being replied to.
- `$reply_markup` (array|null): The reply markup.

### `forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = null)`

This method forwards a message from one chat to another.

- `$chat_id` (int|string): The chat ID.
- `$from_chat_id` (int|string): The chat ID of the source chat.
- `$message_id` (int): The message ID.
- `$disable_notification` (bool|null): Whether to disable the notification.

### `sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)`

This method sends a photo to a chat.

- `$chat_id` (int|string): The chat ID.
- `$photo` (string): The photo file path or URL.
- `$caption` (string|null): The photo caption.
- `$parse_mode` (string|null): The parse mode of the photo caption.
- `$disable_notification` (bool|null): Whether to disable the notification.
- `$reply_to_message_id` (int|null): The ID of the message being replied to.
- `$reply_markup` (array|null): The reply markup.

### `sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $performer = null, $title = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)`

This method sends an audio file to a chat.

- `$chat_id` (int|string): The chat ID.
- `$audio` (string): The audio file path or URL.
- `$caption` (string|null): The audio caption.
- `$parse_mode` (string|null): The parse mode of the audio caption.
- `$duration` (int|null): The duration of the audio file.
- `$performer` (string|null): The performer of the audio file.
- `$title` (string|null): The title of the audio file.
- `$disable_notification` (bool|null): Whether to disable the notification.
- `$reply_to_message_id` (int|null): The ID of the message being replied to.
- `$reply_markup` (array|null): The reply markup.

### `getUserSession($chat_id)`

This method returns the user session data for the given chat ID.

- `$chat_id` (int|string): The chat ID.

### `getCommand($text)`

This method returns the command from the given text.

- `$text` (string): The text.

### `getCommandParams($text)`

This method returns the command parameters from the given text.

- `$text` (string): The text.

### `deleteUserSession($chatId)`

This method deletes the user session data for the given chat ID.

- `$chatId` (int|string): The chat ID.


## License

This package is open-sourced software licensed under the MIT license.