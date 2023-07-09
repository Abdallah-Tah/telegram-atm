<?php

namespace Amohamed\TelegramAtm\Facades;

use Illuminate\Support\Facades\Facade;

class TelegramBotService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'telegramatm';
    }
}
