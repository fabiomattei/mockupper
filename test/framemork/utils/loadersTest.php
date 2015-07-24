<?php

define( 'TESTCASE', 'in test' );
require_once 'settings.php';
require_once 'framework/utils/loaders.php';

class LoadersTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * Testing function make_url()
	 */
	public function test_make_url_given_no_parameters_return_BASEPATH() {
		$out = make_url();
		$this->assertSame( $out, BASEPATH );
	}
	
	public function test_make_url_given_joust_group_parameter_return_link_to_BASEPATH_groupname_index() {
		$_SESSION['usr_type'] = 'rampa';
		$out = make_url( 'users' );
		$this->assertSame( $out, BASEPATH );
	}

}
