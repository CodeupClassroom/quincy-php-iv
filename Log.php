<?php

class Log {

    private $filename;
    private $handle;

    public function __construct($prefix = 'log')
    {
        if(!is_string($prefix)) {
            $prefix = 'log';
        }
        
        $this->filename = $prefix . "-" . date('Y-m-d') . ".log";
        $this->handle = fopen($this->filename, 'a');
    }

    protected function logMessage($level, $message) {
        
        $timestamp = date("Y-m-d H:i:s");
        $logEntry = PHP_EOL . "$timestamp - $level - $message";
        fwrite($this->handle, $logEntry);

    }

    public function info($message) {
        $this->logMessage("INFO", $message);
    } 

    public function error($message) {
        $this->logMessage("ERROR", $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
    }


}