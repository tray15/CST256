<?php

namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger implements ILoggerService
{

    function debug($message)
    {
        Log::debug($message);
    }

    function info($message, $array = [])
    {
        Log::info($message, $array);
    }

    function warning($message)
    {
        Log::warning($message);
    }

    function error($message)
    {
        Log::error($message);
    }
}