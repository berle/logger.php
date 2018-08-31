<?php

namespace Berle\Logger;

class CallbackLogger extends AbstractLogger
{
    
    protected $callback;
    
    public function __construct(callable $callback = null)
    {
        if (is_null($callback)) {
            $this->callback = function () {};
        } else {
            $this->callback = $callback;
        }
    }
    
    public function callback(callable $callback)
    {
        $this->callback = $callback;
        
        return $this;
    }
    
    protected function message(string $label, string $message, array $data): void
    {
        ($this->callback)($label, $message, $data);
    }

}
