<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Logging
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: Logging Service implementation
 * Implements ILoggerService
 * */
namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger implements ILoggerService
{
    /**
     * @param $message
     * @return void
     */
    function debug($message)
    {
        Log::debug($message);
    }

    /**
     * @param $message
     * @param $array
     * @return void
     */
    function info($message, $array = [])
    {
        Log::info($message, $array);
    }

    /**
     * @param $message
     * @return void
     */
    function warning($message)
    {
        Log::warning($message);
    }

    /**
     * @param $message
     * @return void
     */
    function error($message)
    {
        Log::error($message);
    }
}