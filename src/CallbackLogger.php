<?php

namespace Berle\Logger;

class CallbackLogger implements LoggerInterface
{
    
    protected $callback;
    
    public function __construct()
    {
        $this->callback = function () {};
    }
    
    public function callback(\Closure $callback)
    {
        $this->callback = $callback;
        
        return $this;
    }

    public function debug(string $message, array $data = []): void
    {
        ($this->callback)("debug", $message, $data);
    }
    
    public function info(string $message, array $data = []): void
    {
        ($this->callback)("info", $message, $data);
    }

    public function warn(string $message, array $data = []): void
    {
        ($this->callback)("warn", $message, $data);
    }

    public function error(string $message, array $data = []): void
    {
        ($this->callback)("error", $message, $data);
    }
    
}
