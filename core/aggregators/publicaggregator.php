<?php

class PublicAggregator {
	
	public function __construct() {
		
		// messages block loaded by default from all pages
		block( 'core', 'message/messages' );
		$this->messages = new Messages();
		
		$this->title                  = "SAT :: Dashboard";
		$this->menucontainer          = array();
		$this->topcontainer           = array();
		$this->messagescontainer      = array( $this->messages );
		$this->leftcontainer          = array();
		$this->centralcontainer       = array();
		$this->secondcentralcontainer = array();
		$this->thirdcentralcontainer  = array();
		$this->bottomcontainer        = array();
		$this->templateFile           = 'private';
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
	
	// ** next section load textual messages for messages block
	function setSuccess($success) {
		$this->messages->setSuccess($success);
	}
	
	function setError($error) {
		$this->messages->setError($error);
	}
	
	function setInfo($info) {
		$this->messages->setInfo($info);
	}
	
	function setWarning($warning) {
		$this->messages->setWarning($warning);
	}
	
}