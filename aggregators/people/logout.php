<?php

define("APP_ROOT", "../");

require_once APP_ROOT.'core/responders/publicresponder.php';

class Responder extends PublicResponder {
	
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