<?php

define("APP_ROOT", "../");

require_once APP_ROOT.'core/aggregators/publicaggregator.php';

class Aggregator extends PublicAggregator {
	
	public function getRequest() {
		page('public/helppg');

		$page = new HelpPg();
		$page->compose();
	}
	
}

$aggregator = new Aggregator();
$aggregator->showPage();