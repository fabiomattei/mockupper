<?php

class PublicAggregator {
	
	public function __construct() {
		
		// setting an array containing all parameters
		$this->parameters = array();
		
		// messages block loaded by default from all pages
		block( 'template', 'message/messages' );
		$this->messages = new Messages();
		
		$this->title                  = APPNAMEFORPAGETITLE;
		$this->menucontainer          = array();
		$this->topcontainer           = array();
		$this->messagescontainer      = array( $this->messages );
		$this->leftcontainer          = array();
		$this->centralcontainer       = array();
		$this->secondcentralcontainer = array();
		$this->thirdcentralcontainer  = array();
		$this->bottomcontainer        = array();
		$this->templateFile           = PUBLICTEMPLATE;
		
		$this->addToHead = '';
		$this->addToFoot = '';
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
		
		$this->loadTemplate();
		
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
	
	/* ** functions for setting parameters array */
	public function setParameters( $parameters ) {
		if (is_array( $parameters )) {
			$this->parameters = $parameters;
		}
	}
	
	// taken from page script
	function loadTemplate() {
		$this->addToHeadAndToFoot($this->menucontainer);
		$this->addToHeadAndToFoot($this->topcontainer);
		$this->addToHeadAndToFoot($this->messagescontainer);
		$this->addToHeadAndToFoot($this->leftcontainer);
		$this->addToHeadAndToFoot($this->centralcontainer);
		$this->addToHeadAndToFoot($this->secondcentralcontainer);
		$this->addToHeadAndToFoot($this->thirdcentralcontainer);
		$this->addToHeadAndToFoot($this->bottomcontainer);
		
		require_once 'templates/'.$this->templateFile.'.php';
	}

	function addToHeadAndToFoot($container) {
		if (isset($container)) {
			if (gettype($container) == 'array') {
				foreach ($container as $obj) {
					$this->addToHead .= $obj->addToHead();
					$this->addToFoot .= $obj->addToFoot();
				}
			}
			if (gettype($container) == 'object') {
				$this->addToHead .= $container->addToHead();
				$this->addToFoot .= $container->addToFoot();
			}
		}
	}
	
}
