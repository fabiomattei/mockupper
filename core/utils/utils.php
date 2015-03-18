<?php

// loading functions
function block( $type, $path ) {
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
	$filepath = 'posttypes/'.$type.'/usecases/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -library- file dose not exists: '.$filepath );
	}
}

function dao( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/dao/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -dao- file dose not exists: '.$filepath );
	}
}

function lib( $path ) {
	$filepath = 'core/libs/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -library- file dose not exists: '.$filepath );
	}
}

function aggregator( $family, $subfamily, $aggregator) {
	if ( $subfamily == '' ) {
		$filepath = 'aggregators/'.$family.'/'.$aggregator.'.php';
	} else {
		$filepath = 'aggregators/'.$family.'/'.$subfamily.'/'.$aggregator.'.php';
	}
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -aggregator- file dose not exists: '.$filepath );
	}
}

function spliturl($request) {
	#split the path by '/'
	$params = explode( '/', $request );

	//echo $_SERVER['REQUEST_URI'].'<br>';
	//print_r($params);

	$family = $params[0];
	$subfamily = '';
	if ( strpos( $family, '-' ) !== FALSE ) {
		$newfamily = explode( '-', $family );
		//print_r($newfamily);
		$family    = $newfamily[0];
		$subfamily = $newfamily[1];
	}
	$aggregator = $params[1];
	$parameters = array();
	if ( isset( $params[2] ) ) { $parameters[] = $params[2]; }
	if ( isset( $params[3] ) ) { $parameters[] = $params[3]; }
	if ( isset( $params[4] ) ) { $parameters[] = $params[4]; }
	
	return array( $family, $subfamily, $aggregator, $parameters );
}

function html_escape($var) {
	if (is_array($var)) {
		return array_map('html_escape', $var);
	} else {
		return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
	}
}

/*
 * Functions that clean string so they can be used in a URL
 */
function url_title($str, $separator = '-', $lowercase = TRUE) {
	if ($separator == 'dash') {
	    $separator = '-';
	} else if ($separator == 'underscore') {
	    $separator = '_';
	}
	
	$q_separator = preg_quote($separator);

	$trans = array(
		'&.+?;'                 => '',
		'[^a-z0-9 _-]'          => '',
		'\s+'                   => $separator,
		'('.$q_separator.')+'   => $separator
	);

	$str = strip_tags($str);

	foreach ($trans as $key => $val) {
		$str = preg_replace("#".$key."#i", $val, $str);
	}

	if ($lowercase === TRUE) {
		$str = strtolower($str);
	}

	return trim($str, $separator);
}

// functions per immagini

function get_activity_img_path($acfoldername, $prid) {
    return 'uploads/activities/group1/'.$acfoldername.'/main/';
}

function generate_activity_logo_url($activity_folder, $filename) {
	$user_file_url = BASEPATH.'uploads/activities/group1/'.$activity_folder.'/main';
	$user_file_path = realpath('uploads/activities/group1/'.$activity_folder.'/main');
	if($filename != '' && file_exists($user_file_path) && file_exists($user_file_path.'/'.$filename)) {
		$out = $user_file_url.'/'.$filename;
	} else {
		$out = BASEPATH.'assets/images/fotomancante.jpg';
	}
    return $out;
}

function generate_activity_jumbotron_url($activity_id, $filename) {
	$user_file_url = BASEPATH.'uploads/activities/group1/activity'.$activity_id.'/main';
	$user_file_path = realpath('uploads/activities/group1/activity'.$activity_id.'/main');
	if($filename != '' && file_exists($user_file_path) && file_exists($user_file_path.'/'.$filename)) {
		$out = $user_file_url.'/'.$filename;
	} else {
		$out = BASEPATH.'assets/images/jumbotron.png';
	}
    return $out;
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
