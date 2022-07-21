<?php

namespace App\Http\Controllers;

use App\Services\Utility\ILoggerService;

class TestLoggingController extends Controller
{
    protected $logger;

    function __construct(ILoggerService $loggerService)
    {
        $this->logger = $loggerService;
    }

    public function index(){
        $this->logger->info("Hello from LoggingService!");
    }
}