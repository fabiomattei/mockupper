<?php

define("APP_ROOT", "../");

require_once APP_ROOT.'core/aggregators/publicaggregator.php';

class Aggregator extends PublicAggregator {
	
	public function getRequest() {
		page( 'public/forgotpasswordpg' );

		$page = new ForgotPasswordPg();
		$page->compose();
	}
	
	public function postRequest() {
		usecase( 'user/userforgotpassword' );
		dao( 'userdao' );
		lib( 'mailer/mailer' );
	
		$usecase = new UserForgotPassword($_POST, new UserDao(), new Mailer());
		$usecase->performAction();
	
		if (!$usecase->isDataValidated()) {
			page('public/forgotpasswordpg');
			$page = new ForgotPasswordPg();
			$page->setError($usecase->getReadableErrors());
			$page->compose();
		} else {
			page('public/forgotpasswordpg');
			$page = new ForgotPasswordPg();
			$page->setSuccess("New password sent to your email address.");
			$page->compose();
		}
	}
	
}

$aggregator = new Aggregator();
$aggregator->showPage();