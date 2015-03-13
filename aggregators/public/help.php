<?php

define("APP_ROOT", "../");

require_once APP_ROOT.'system/responders/publicresponder.php';

class Responder extends PublicResponder {
	
	public function getRequest() {
		page('public/helppg');

		$page = new HelpPg();
		$page->compose();
	}
	
}

$responder = new Responder();
$responder->showPage();