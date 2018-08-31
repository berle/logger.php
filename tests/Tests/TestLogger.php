<?php

namespace Berle\Logger\Tests;

use Berle\Logger\AbstractLogger;

class TestLogger extends AbstractLogger
{
    
    protected function message(string $label, string $message, array $data): void
    {
        
    }
    
}
