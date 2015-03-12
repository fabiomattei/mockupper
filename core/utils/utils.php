<?php

// loading functions
function block($path) {
	require_once APP_ROOT.'presentation/blocks/'.$path.'.php';
}
function page($path) {
	require_once APP_ROOT.'presentation/pages/'.$path.'.php';
}
function usecase($path) {
	require_once APP_ROOT.'usecases/'.$path.'.php';
}
function dao($path) {
	require_once APP_ROOT.'datastorage/'.$path.'.php';
}
function lib($path) {
	require_once APP_ROOT.'system/libs/'.$path.'.php';
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