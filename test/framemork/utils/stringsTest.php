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
	
	public function test_spliturl_given_folder_action_return_right_path() {
		list( $folder, $subfolder, $action, $parameters ) = spliturl( 'folder/action' );
		$expfolder     = 'folder';
		$expsubfolder  = '';
		$expaction     = 'action';
		$expparameters = 0;
		$this->assertSame( $expfolder,     $folder );
		$this->assertSame( $expsubfolder,  $subfolder );
		$this->assertSame( $expaction,     $action );
		$this->assertSame( $expparameters, count( $parameters ) );
	}
	
	public function test_spliturl_given_folder_action_parameters_return_right_path() {
		list( $folder, $subfolder, $action, $parameters ) = spliturl( 'folder/action/2/3' );
		$expfolder     = 'folder';
		$expsubfolder  = '';
		$expaction     = 'action';
		$expparameters = 2;
		$exppars1      = '2';
		$exppars2      = '3';
		$this->assertSame( $expfolder,     $folder );
		$this->assertSame( $expsubfolder,  $subfolder );
		$this->assertSame( $expaction,     $action );
		$this->assertSame( $expparameters, count( $parameters ) );
		$this->assertSame( $exppars1, $parameters[0] );
		$this->assertSame( $exppars2, $parameters[1] );
	}
	
	public function test_spliturl_given_folder_subfolder_action_return_right_path() {
		list( $folder, $subfolder, $action, $parameters ) = spliturl( 'folder-subfolder/action' );
		$expfolder     = 'folder';
		$expsubfolder  = 'subfolder';
		$expaction     = 'action';
		$expparameters = 0;
		$this->assertSame( $expfolder,     $folder );
		$this->assertSame( $expsubfolder,  $subfolder );
		$this->assertSame( $expaction,     $action );
		$this->assertSame( $expparameters, count( $parameters ) );
	}
	
	public function test_spliturl_given_folder_subfolder_action_parameters_return_right_path() {
		list( $folder, $subfolder, $action, $parameters ) = spliturl( 'folder-subfolder/action/1/2' );
		$expfolder     = 'folder';
		$expsubfolder  = 'subfolder';
		$expaction     = 'action';
		$expparameters = 2;
		$exppars1      = '1';
		$exppars2      = '2';
		$this->assertSame( $expfolder,     $folder );
		$this->assertSame( $expsubfolder,  $subfolder );
		$this->assertSame( $expaction,     $action );
		$this->assertSame( $expparameters, count( $parameters ) );
		$this->assertSame( $exppars1, $parameters[0] );
		$this->assertSame( $exppars2, $parameters[1] );
	}
	

}
