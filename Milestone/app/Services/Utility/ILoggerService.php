<?php

namespace App\Services\Utility;

use Monolog\Logger;

interface ILoggerService
{
    function debug( $message);
    function info($message, array $array = []);
    function warning($message);
    function error($message);
}