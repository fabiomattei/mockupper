<?php

require_once 'presentation/blocks/html/plainhtml.php';

class PlainhtmlTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenWrongInput_ThrowsGeneralException() {
	    $block = new PlainHtml("<p>Try</p>");
		$this->assertSame("<p>Try</p>", $block->show());
	}
	
}