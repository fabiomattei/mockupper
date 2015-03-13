<?php

// loading functions
function block($type, $path) {
	if ( $type == 'core') {
		require_once APP_ROOT.'core/blocks/'.$path.'.php';
	} else {
		if ( file_exists( APP_ROOT.'aggregators/'.$type.'/blocks/'.$path.'.php' ) ) { 
		    require_once APP_ROOT.'aggregators/'.$type.'/blocks/'.$path.'.php';
		}
		if ( file_exists( APP_ROOT.'posttypes/'.$type.'/blocks/'.$path.'.php' ) ) { 
		    require_once APP_ROOT.'posttypes/'.$type.'/blocks/'.$path.'.php';
		} 
	}	
}

function usecase( $type, $path ) {
	if ( file_exists( APP_ROOT.'posttypes/'.$type.'/usecases/'.$path.'.php' ) ) { 
	    require_once APP_ROOT.'posttypes/'.$type.'/usecases/'.$path.'.php';
	}
}

function dao( $type, $path ) {
	if ( file_exists( APP_ROOT.'posttypes/'.$type.'/dao/'.$path.'.php' ) ) { 
	    require_once APP_ROOT.'posttypes/'.$type.'/dao/'.$path.'.php';
	}
}

function lib($path) {
	if ( file_exists( APP_ROOT.'core/libs/'.$path.'.php' ) ) {
		require_once APP_ROOT.'core/libs/'.$path.'.php';
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