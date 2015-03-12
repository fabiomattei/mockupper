<?php

class Logger {
	
	function __construct() {
	}

    public function write($message, $file='', $line='') {
		syslog(LOG_WARNING, date("Y-m-d H:i:s").' - '.$message);
		echo date("Y-m-d H:i:s").' - '.$message;
    }

}