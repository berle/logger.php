<?php

namespace Berle\Logger\Tests;

use Berle\Logger\CallbackLogger;
use PHPUnit\Framework\TestCase;

class CallbackLoggerTest extends TestCase
{
    
    protected $logger;

    protected function setUp()
    {
        $this->logger = new CallbackLogger(function ($label, $message, $data)
        {
            $this->results = [ $label, $message, $data ];
        });
        $this->results = null;
    }
    
    public function testDebugLevel()
    {
        $this->logger->setLogLevel("debug");
        $this->assertTrue($this->logger->isDebug());
        $this->logger->debug("FOOBAR");
        $this->assertSame($this->results, [ "debug", "FOOBAR", [] ]);
    }
    
    public function testInfoLevel()
    {
        $this->logger->setLogLevel("info");
        
        $this->assertFalse($this->logger->isDebug());
        $this->assertTrue($this->logger->isInfo());
        
        $this->logger->debug("FOOBAR");
        $this->assertSame($this->results, null);
        
        $this->logger->info("FOOBAR");
        $this->assertSame($this->results, [ "info", "FOOBAR", [] ]);
    }
    
    public function testWarnLevel()
    {
        $this->logger->setLogLevel("warn");

        $this->assertFalse($this->logger->isInfo());
        $this->assertTrue($this->logger->isWarn());

        $this->logger->info("FOOBAR");
        $this->assertSame($this->results, null);

        $this->logger->warn("FOOBAR");
        $this->assertSame($this->results, [ "warn", "FOOBAR", [] ]);
    }
    
    public function testErrorLevel()
    {
        $this->logger->setLogLevel("error");

        $this->assertFalse($this->logger->isWarn());
        $this->assertTrue($this->logger->isError());

        $this->logger->warn("FOOBAR");
        $this->assertSame($this->results, null);

        $this->logger->error("FOOBAR");
        $this->assertSame($this->results, [ "error", "FOOBAR", [] ]);
    }

}
