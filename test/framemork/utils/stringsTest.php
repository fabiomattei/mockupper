<?php

define( 'TESTCASE', 'in test' );
require_once 'settings.php';

class StringsTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * Testing function spliturl()
	 */
	public function test_spliturl_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		spliturl( '' );
	}
	
	public function test_spliturl_given_family_office_return_right_path() {
		list( $folder, $subfolder, $action, $parameters ) = spliturl( 'office/mycontroller' );
		$expfolder     = 'office';
		$expsubfolder  = '';
		$expaction     = 'mycontroller';
		$expparameters = 0;
		$this->assertSame( $expfolder,     $folder );
		$this->assertSame( $expsubfolder,  $subfolder );
		$this->assertSame( $expaction,     $action );
		$this->assertSame( $expparameters, count( $parameters ) );
	}
	

}
