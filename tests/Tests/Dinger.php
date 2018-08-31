<?php

namespace Berle\Logger\Tests;

class Dinger
{
    
    protected $callback;
    
    public function __construct()
    {
        $this->callback(function () {});
    }
    
    public function callback(callable $callback): void
    {
        $this->callback = $callback;
    }

    public function ding(): void
    {
        ($this->callback)();
    }
    
}
