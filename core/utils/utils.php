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

// check if session is valid
function is_session_valid() {
	// check if user logged in
	if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
		return false;
	}
	
	// check if ip matches
	if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
		return false;
	}
	if(!$_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
		return false;
	}

	// check user agent
	if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
		return false;
	}
	if(!$_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
		return false;
	}

	// check elapsed time
	$max_elapsed = 60 * 60 * 24; // 1 day
	// return false if value is not set
	if(!isset($_SESSION['last_login'])) {
		return false;
	}
	if(!($_SESSION['last_login'] + $max_elapsed) >= time()) {
		return false;
	} 

	return true;
}

function isGetRequest() {
	return $_SERVER["REQUEST_METHOD"] == "GET";
}

function isPostRequest() {
	return $_SERVER["REQUEST_METHOD"] == "POST";
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