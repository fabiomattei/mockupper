<?php

class Logger {
	
	function __construct() {
		$this->logfile = 'logs/log'.date('Y-m-d').'.log';
	}

    public function write($message, $file='', $line='') {
        $message = date("Y-m-d H:i:s") .' - '.$message;
        $message .= $file=='' ? '' : " in $file";
        $message .= $line=='' ? '' : " on line $line";
        $message .= "\n";
        return file_put_contents($this->logfile, $message, FILE_APPEND);
    }

}
