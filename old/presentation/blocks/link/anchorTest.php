<?php

require_once 'presentation/blocks/link/anchor.php';

class AnchroTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenWrongInput_ThrowsGeneralException() {
	    $block = new Anchor("one", "two");
		$this->assertSame('<a href="two" title="No title">one</a>', $block->show());
	}
	
}