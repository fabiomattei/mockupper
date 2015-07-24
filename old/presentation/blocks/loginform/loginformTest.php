<?php

require_once 'presentation/blocks/loginform/loginform.php';

class LoginFormTest extends \PHPUnit_Framework_TestCase {
	
	public function test_FormWorks() {
	    $block = new LoginForm('name', 'action');
		$this->assertContains('<Form name="name" method="post" action="action">', $block->show());
	}
	
}