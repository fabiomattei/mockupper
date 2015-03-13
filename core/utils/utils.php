<?php

// loading functions
function block($type, $path) {
	if ( $type == 'core') {
		require_once 'core/blocks/'.$path.'.php';
	} else {
		if ( file_exists( 'aggregators/'.$type.'/blocks/'.$path.'.php' ) ) { 
		    require_once 'aggregators/'.$type.'/blocks/'.$path.'.php';
		}
		if ( file_exists( 'posttypes/'.$type.'/blocks/'.$path.'.php' ) ) { 
		    require_once 'posttypes/'.$type.'/blocks/'.$path.'.php';
		} 
	}	
}

function usecase( $type, $path ) {
	if ( file_exists( 'posttypes/'.$type.'/usecases/'.$path.'.php' ) ) { 
	    require_once 'posttypes/'.$type.'/usecases/'.$path.'.php';
	}
}

function dao( $type, $path ) {
	if ( file_exists( 'posttypes/'.$type.'/dao/'.$path.'.php' ) ) { 
	    require_once 'posttypes/'.$type.'/dao/'.$path.'.php';
	}
}

function lib($path) {
	if ( file_exists( 'core/libs/'.$path.'.php' ) ) {
		require_once 'core/libs/'.$path.'.php';
	}
}

function aggregator( $family, $subfamily, $aggregator) {
	if ( $subfamily != '' ) {
		$filepath = 'aggregators/'.$family.'/'.$subfamily.'/'.$aggregator.'.php';
	} else {
		$filepath = 'aggregators/'.$family.'/'.$aggregator.'.php';
	}
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -aggregator- file dose not exists: '.$filepath );
	}
}

// fuctions that symplifies the selected property in a form
function selected( $variable, $term ) {
	if ( $variable == $term ) return 'selected="selected"';
	return '';
}

// GeneralException
class GeneralException extends Exception {
}

function generalExceptionHandler($exception) {
	header('Location: '.BASEPATH.'errorpage');
	die();
}

set_exception_handler('generalExceptionHandler');