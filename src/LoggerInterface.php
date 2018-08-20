<?php

namespace Berle\Logger;

interface LoggerInterface
{

    public function logger(): LoggerInterface;
    public function debug(string $message, array $data = []): void;
    public function info(string $message, array $data = []): void;
    public function warn(string $message, array $data = []): void;
    public function error(string $message, array $data = []): void;
    
}
