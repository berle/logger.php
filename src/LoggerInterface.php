<?php

namespace Berle\Logger;

interface LoggerInterface
{

    public function debug(string $message, array $data = []): void;
    public function isDebug(): bool;
    public function info(string $message, array $data = []): void;
    public function isInfo(): bool;
    public function warn(string $message, array $data = []): void;
    public function isWarn(): bool;
    public function error(string $message, array $data = []): void;
    public function isError(): bool;
    
}
