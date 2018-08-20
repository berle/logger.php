<?php

namespace Berle\JsonAgent;

class StderrLogger implements LoggerInterface
{

    public function debug(string $message, array $data = []): void
    {
        $this->output("debug", $message, $data);
    }

    public function info(string $message, array $data = []): void
    {
        $this->output("info", $message, $data);
    }

    public function warn(string $message, array $data = []): void
    {
        $this->output("warn", $message, $data);
    }

    public function error(string $message, array $data = []): void
    {
        $this->output("error", $message, $data);
    }
    
    protected function output(string $level, string $message, array $data): void
    {
        $output = "$level> $message";
        
        if (count($data) > 0) {
            $output .= '(' . $this->encode($data) . ')';
        }
        
        $output .= PHP_EOL;

        fwrite(STDERR, $output);
    }
    
    protected function encode(array $data): string
    {
        return json_encode($data);
    }
    
}
