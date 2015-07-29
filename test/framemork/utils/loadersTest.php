<?php

define( 'TESTCASE', 'in test' );
require_once 'settings.php';

class LoadersTest extends \PHPUnit_Framework_TestCase {
	
	/**
	 * Testing function usecase()
	 */
	public function test_usecase_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = usecase( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_usecase_given_core_utils_file_return_right_path() {
		$out = usecase( 'users', 'userdosomething' );
		$expected = 'datastore/users/usecases/userdosomething.php';
		$this->assertSame( $expected, $out );
	}
		
	/**
	 * Testing function dao()
	 */
	public function test_dao_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = dao( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_dao_given_core_utils_file_return_right_path() {
		$out = dao( 'users', 'user' );
		$expected = 'datastore/users/dao/user.php';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function helper()
	 */
	public function test_helper_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = helper( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_helper_given_core_utils_file_return_right_path() {
		$out = helper( 'users', 'helper' );
		$expected = 'datastore/users/helpers/helper.php';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function partial()
	 */
	public function test_partial_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = partial( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_partial_given_core_utils_file_return_right_path() {
		$out = partial( 'users', 'partial' );
		$expected = 'datastore/users/partial/partial.php';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function importer()
	 */
	public function test_importer_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = importer( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_importer_given_core_utils_file_return_right_path() {
		$out = importer( 'users', 'pdfimporter' );
		$expected = 'datastore/users/importers/pdfimporter.php';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function exporter()
	 */
	public function test_exporter_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = exporter( '', '' );
		$this->assertSame( $expected, $out );
	}
	
	
	public function test_exporter_given_core_utils_file_return_right_path() {
		$out = exporter( 'users', 'pdfexporter' );
		$expected = 'datastore/users/exporters/pdfexporter.php';
		$this->assertSame( $expected, $out );
	}

	/**
	 * Testing function lib()
	 */
	public function test_lib_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = lib( '' );
		$this->assertSame( $expected, $out );
	}
	
	public function test_lib_given_core_utils_file_return_right_path() {
		$out = lib( 'mailer/mailer' );
		$expected = 'framework/libs/mailer/mailer.php';
		$this->assertSame( $expected, $out );
	}
	
	public function test_lib_given_not_existent_utils_file_return_empty_path() {
		$out = lib( 'not-existent' );
		$expected = '';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function utils()
	 */
	public function test_utils_given_no_parameters_throws_exception() {
		$this->setExpectedException('GeneralException');
		$out = utils( '', 'on' );
		$this->assertSame( $expected, $out );
	}
	
	public function test_utils_given_core_utils_file_return_right_path() {
		$out = utils( 'loaders', 'on' );
		$expected = 'framework/utils/loaders.php';
		$this->assertSame( $expected, $out );
	}
	
	public function test_utils_given_not_existent_utils_file_return_empty_path() {
		$out = utils( 'not-existent', 'on' );
		$expected = '';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function office()
	 */
	public function test_make_url_given_no_parameters_return_index() {
		$out = office( '', '', '', 'on' );
		$expected = 'offices/index.php';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_folder_return_folder_index() {
		$out = office( 'ramp', '', '', 'on' );
		$expected = 'offices/ramp/index.php';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_folder_subfolder_return_folder_subfolder_index() {
		$out = office( 'ramp', 'flight', '', 'on' );
		$expected = 'offices/ramp/flight/index.php';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_folder_subfolder_action_return_folder_subfolder_action() {
		$out = office( 'ramp', 'flight', 'list', 'on' );
		$expected = 'offices/ramp/flight/list.php';
		$this->assertSame( $expected, $out );
	}
	
	/**
	 * Testing function make_url()
	 */
	public function test_make_url_given_no_parameters_return_BASEPATH() {
		$out = make_url();
		$this->assertSame( BASEPATH, $out );
	}
	
	public function test_make_url_given_just_group_parameter_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users' );
		$expected = BASEPATH.'rampa-users/index.html';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_and_action_parameter_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list' );
		$expected = BASEPATH.'rampa-users/list.html';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_and_action_and_one_parameters_parameter_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list', '1' );
		$expected = BASEPATH.'rampa-users/list/1.html';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_and_action_many_parameters_parameter_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list', '1/2/3' );
		$expected = BASEPATH.'rampa-users/list/1/2/3.html';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_action_extension_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list', '', '.pdf' );
		$expected = BASEPATH.'rampa-users/list.pdf';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_action_parameter_extension_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list', '1', '.pdf' );
		$expected = BASEPATH.'rampa-users/list/1.pdf';
		$this->assertSame( $expected, $out );
	}
	
	public function test_make_url_given_group_action_parameters_extension_return_link() {
		$_SESSION['office'] = 'rampa';
		$out = make_url( 'users', 'list', '1/2/3', '.pdf' );
		$expected = BASEPATH.'rampa-users/list/1/2/3.pdf';
		$this->assertSame( $expected, $out );
	}

}
