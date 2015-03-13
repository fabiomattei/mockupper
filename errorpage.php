<?php

define("APP_ROOT", '');
require_once 'system/responders/publicresponder.php';

class Aggregator extends PublicResponder {
	
	public function getRequest() {
		page('commons/errorloader');

		$loader = new ErrorLoader();
		$loader->loadBlocks();
		$loader->loadTemplate();
	}
	
}

$aggregator = new Aggregator();
$aggregator->showPage();