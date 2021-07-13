<?php

namespace Islenbo\LaravelAliyunSls\Handlers;

use Islenbo\LaravelAliyunSls\Manager;
use Monolog\Handler\BufferHandler;
use Monolog\Handler\HandlerInterface;
use Monolog\Logger;

class AliyunSlsBufferHandler extends BufferHandler
{

    public function __construct($app, array $handlerConfig, int $bufferLimit = 0, $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($this->makeHandler($app, $handlerConfig), $bufferLimit, $level, $bubble, true);
    }

    private function makeHandler($app, array $config): HandlerInterface
    {
        $manager = new Manager($app);
        return $manager->makeHandler($config);
    }

}
