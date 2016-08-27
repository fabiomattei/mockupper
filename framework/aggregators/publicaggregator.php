<?php

class PublicAggregator {
	
	public function __construct() {
		session_start();
		
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

    /**
     * Saving the request made to webserver
     *
     * @param $request STRING containing URL complete of parameters
     */
	public function setRequest( $request ) {
		$this->request = $request;
	}

    /**
     * Saving URL controller PATH in the controller
     *
     * @param $family      STRING coming from URL slicing
     * @param $subfamily   STRING coming from URL slicing
     * @param $aggregator  STRING coming from URL slicing
     */
    public function setControllerPath( $family, $subfamily, $aggregator ) {
        $this->family = $family;
        $this->subfamily = $subfamily;
        $this->aggregator = $aggregator;
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

	function get_selected_language() {
		if ( isset( $_SESSION['HTTP_ACCEPT_LANGUAGE'] ) ) {
			return $_SESSION['HTTP_ACCEPT_LANGUAGE'];
		} else {
			return $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		}
	}

	function set_selected_language( $HTTP_ACCEPT_LANGUAGE ) {
		$_SESSION['HTTP_ACCEPT_LANGUAGE'] == $HTTP_ACCEPT_LANGUAGE;
	}

    /**
     * Redirect the script to a selected page
     * it creates the url using the library function make_url form loaders.php
     * It send flash messages to new controller [info, warning, error, success]
     */
    public function redirectToPage($group = 'main', $action = '', $parameters = '', $extension = '.html') {
        if ( APPTESTMODE != 'on' ) {
            header( 'Location: ' . make_url( $group, $action, $parameters, $extension ) );
            die();
        }
    }

    /**
     * Redirect the script to a selected page
     * it creates the url using the library function make_url form loaders.php
     * It send flash messages to new controller [info, warning, error, success]
     */
    public function redirectToCompleteUrl($office = 'public', $group = 'main', $action = '', $parameters = '', $extension = '.html') {
        if ( APPTESTMODE != 'on' ) {
            header( 'Location: ' . make_complete_url( $office, $group, $action, $parameters, $extension ) );
            die();
        }
    }

}
