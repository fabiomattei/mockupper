<?php

define('APP_ROOT', '');
require_once 'usecases/user/userhashpassword.php';
require_once 'system/utils.php';
require_once 'test/usecases/user/userfakedao.php';

class UserHashPasswordTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenInput_ItGeneratesAPasswordAndASalt() {
	    $uc = new UserHashPassword('hello');
		$this->assertEquals(32, strlen($uc->getSalt()));
		$this->assertEquals(60, strlen($uc->getHashedPassword()));
	}

}