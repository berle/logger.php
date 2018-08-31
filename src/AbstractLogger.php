<?php

namespace Berle\Logger;

define("BERLE_LOGGER_DEBUG",  4);
define("BERLE_LOGGER_INFO",   3);
define("BERLE_LOGGER_WARN",   2);
define("BERLE_LOGGER_ERROR",  1);

abstract class AbstractLogger implements LoggerInterface
{
    
    protected $level = BERLE_LOGGER_INFO;

    abstract protected function message(string $label, string $message, array $data): void;

    public function __construct()
    {
        $this->detectLogLevel();
    }

    public function debug(string $message, array $data = []): void
    {
        if ($this->isDebug()) {
            $this->message("debug", $message, $data);
        }
    }

    public function isDebug(): bool
    {
        return $this->checkLogLevel(BERLE_LOGGER_DEBUG);
    }
    
    public function info(string $message, array $data = []): void
    {
        if ($this->isInfo()) {
            $this->message("info", $message, $data);
        }
    }
    
    public function isInfo(): bool
    {
        return $this->checkLogLevel(BERLE_LOGGER_INFO);
    }

    public function warn(string $message, array $data = []): void
    {
        if ($this->isWarn()) {
            $this->message("warn", $message, $data);
        }
    }
    
    public function isWarn(): bool
    {
        return $this->checkLogLevel(BERLE_LOGGER_WARN);
    }
    
    public function error(string $message, array $data = []): void
    {
        if ($this->isError()) {
            $this->message("error", $message, $data);
        }
    }
    
    public function isError(): bool
    {
        return $this->checkLogLevel(BERLE_LOGGER_ERROR);
    }
    
    protected function detectLogLevel(): void
    {
        if (array_key_exists('LOG_LEVEL', $_ENV)) {
            $this->setLogLevel($_ENV[ 'LOG_LEVEL' ]);
        }
    }

    public function setLogLevel(string $level): void
    {
        switch ($level) {
            case 'debug':
                $this->level = BERLE_LOGGER_DEBUG;
                break;
            case 'info':
                $this->level = BERLE_LOGGER_INFO;
                break;
            case 'warn':
                $this->level = BERLE_LOGGER_WARN;
                break;
            case 'error':
                $this->level = BERLE_LOGGER_ERROR;
                break;
            default:
                throw new \Exception("Invalid log level ($level)");
                break;
        }
    }
    
    protected function checkLogLevel(int $level): bool
    {
        if ($this->level >= $level) {
            return true;
        }

        return false;
    }
    
}
