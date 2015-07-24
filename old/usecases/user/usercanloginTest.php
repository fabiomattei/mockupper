<?php

define('APP_ROOT', '');
require_once 'usecases/user/usercanlogin.php';
require_once 'system/utils.php';
require_once 'test/usecases/user/userfakedao.php';

class UserCanLogInTest extends \PHPUnit_Framework_TestCase {

	public function test_GivenWrongInput_DoNotPassValidation() {
	    $uc = new UserCanLogIn(array('username' => 'hi', 'password' => 'secret'), new UserFakeDao());
		$uc->performAction();
		$this->assertFalse($uc->getDataValidated());
	}

	public function test_GivenGoodInput_ItCheckTheDatabase() {
	    $uc = new UserCanLogIn(array('username' => 'fabio', 'password' => 'secret'), new UserFakeDao());
		$uc->performAction();
		$this->assertTrue($uc->getDataValidated());
		$this->assertEquals(1, $uc->getUserCanLogIn());
	}

}