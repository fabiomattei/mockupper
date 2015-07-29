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
	
	/**
	 *  Testing function url_title
	 */
	public function test_url_title() {
		$out = url_title( 'aeiouàèéìòù 	ola' );
		$exp = 'aeiou-ola';
		$this->assertSame( $exp, $out );
	}
	
	/**
	 *  Testing function clear_string
	 */
	public function test_clear_string() {
		$out = clear_string( 'aeiouàèéìòù' );
		$exp = 'aeiou&#224;&#232;&#233;&#236;&#242;&#249;';
		$this->assertSame( $exp, $out );
	}
}
