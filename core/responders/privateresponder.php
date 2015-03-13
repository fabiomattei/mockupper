<?php

require_once APP_ROOT."settings.php";
require_once APP_ROOT."system/logger/logger.php";

class PrivateResponder {
	
	public function __construct() {
	    session_start();
		if (!$this->isSessionValid()) {
			header('Location: '.BASEPATH.'index');
			die();
		}
	}
	
	public function isGetRequest() {
		return $_SERVER["REQUEST_METHOD"] == "GET";
	}
	
	public function isPostRequest() {
		return $_SERVER["REQUEST_METHOD"] == "POST";
	}
	
	/**
	 * Method to override (eventually)
	 */
	public function getRequest() {
		echo 'not implemented yet';
	}
	
	/**
	 * Method to override (eventually)
	 */
	public function postRequest() {
		echo 'not implemented yet';
	}
	
	public function showPage() {
		$time_start = microtime(true); 
		if ($this->isGetRequest()) {
			$this->getRequest();
		} else {
			$this->postRequest();
		}
		$time_end = microtime(true);
		if (($time_end - $time_start) > 5) {
			$logger = new Logger();
			$logger->write('WARNING TIME :: '.$_SERVER["REQUEST_METHOD"].' '.$_SERVER['PHP_SELF'].' '.($time_end - $time_start).' sec', __FILE__, __LINE__);
		}
	}
	
	private function isSessionValid() {
		// check if user logged in
		if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
			return false;
		}
		
		// check if ip matches
		if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
			return false;
		}
		if(!$_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
			return false;
		}

		// check user agent
		if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
			return false;
		}
		if(!$_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
			return false;
		}

		// check elapsed time
		$max_elapsed = 60 * 60 * 24; // 1 day
		// return false if value is not set
		if(!isset($_SESSION['last_login'])) {
			return false;
		}
		if(!($_SESSION['last_login'] + $max_elapsed) >= time()) {
			return false;
		} 

		return true;
	}
}