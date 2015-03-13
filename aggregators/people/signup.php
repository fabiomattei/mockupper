<?php

define("APP_ROOT", "../");

require_once APP_ROOT.'core/aggregators/publicaggregator.php';

class Aggregator extends PublicAggregator {
	
	public function getRequest() {
		page('public/signuppg');

		$page = new SignupPg();
		$page->compose();
	}
	
	public function postRequest() {
		usecase( 'user/usercansubscribe' );
		dao( 'userdao' );
	
		$usecase = new UserCanSubscribe($_POST, new UserDao());
		$usecase->performAction();
		
		page('public/signuppg');
		$page = new SignupPg();
		if (!$usecase->isDataValidated()) {
			$page->setError($usecase->getReadableErrors());
			$page->compose();
		} else {
			$page->setSuccess("Thank you for subscribing. We will check the data and activate your account as soon as possible.");
			$page->compose();
		}
	}
	
}

$aggregator = new Aggregator();
$aggregator->showPage();