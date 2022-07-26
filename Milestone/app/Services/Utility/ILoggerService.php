<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Logging
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: Interface for Logging Service
 * */
namespace App\Services\Utility;

use Monolog\Logger;

interface ILoggerService
{
    function debug( $message);
    function info($message, array $array = []);
    function warning($message);
    function error($message);
}