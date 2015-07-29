<?php

require_once 'settings.php';

require_once 'framework/utils/hashcode.php';

class HashcodeTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 *  Testing function clear_string
	 */
	public function test_generate_hashcode() {
		$out = generate_hashcode();
		$exp = 76;
		$this->assertSame( $exp, strlen( $out ) );
	}
	
}
