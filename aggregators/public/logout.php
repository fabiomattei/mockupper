<?php

define("APP_ROOT", "../");

require_once 'core/aggregators/publicaggregator.php';

class Aggregator extends PublicAggregator {
	
	public function getRequest() {
		$this->killSession();
	}
	
	public function postRequest() {
		$this->killSession();
	}
	
	private function killSession() {
		session_start();
		$_SESSION['logged_in'] = false; // just to be sure
		session_unset();
		session_destroy();
	
		header('Location: '.BASEPATH);
		die();
	}
	
}

$page = new Responder();
$page->showPage();