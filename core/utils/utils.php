<?php

function spliturl( $request ) {
	#split the path by '/'
	$params = explode( '/', $request );

	//echo $_SERVER['REQUEST_URI'].'<br>'.$request;
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

function generate_user_img_url($user_id, $user_filename) {
	$user_file_url = BASEPATH.'uploads/clients/group1/client'.$user_id;
	$user_file_path = realpath('uploads/clients/group1/client'.$user_id);
		
	if($user_filename != '' && file_exists($user_file_path) && file_exists($user_file_path.'/'.$user_filename)) {
		$out = $user_file_url.'/'.$user_filename;
	} else {
		$out = BASEPATH.'assets/images/avatar_default.jpg'; 
	}
    return $out;
}

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

// fuctions that symplifies the selected property in a form
function checked_if_contains( $variable, $term ) {
	if ( strpos( $variable, $term ) !== false ) {
	    return 'checked="checked"';
	}
	return '';
}

// fuctions that symplifies the selected property in a form
function jsselected( $variable, $term ) {
	if ( $variable == $term ) return 'selected=\"selected\"';
	return '';
}

// fuctions that symplifies the selected property in a form
function checked( $variable, $term ) {
	if ( $variable == $term ) return 'checked="checked"';
	return '';
}

// fuctions that symplifies the selected property in a form
function jschecked( $variable, $term ) {
	if ( $variable == $term ) return 'checked=\"checked\"';
	return '';
}

// Delete unwanted accents
function clear_string( $str ) {
    $count	= 1;
    $out	= '';
    $temp	= array();

    for ($i = 0, $s = strlen($str); $i < $s; $i++) {
 	   $ordinal = ord($str[$i]);

 	   if ($ordinal < 128) {
 			if (count($temp) == 1) {
 				$out  .= '&#'.array_shift($temp).';';
 				$count = 1;
 			}

 			$out .= $str[$i];
 	   } else {
 		   if (count($temp) == 0) {
 			   $count = ($ordinal < 224) ? 2 : 3;
 		   }
	
 		   $temp[] = $ordinal;
	
 		   if (count($temp) == $count) {
 			   $number = ($count == 3) ? (($temp['0'] % 16) * 4096) + (($temp['1'] % 64) * 64) + ($temp['2'] % 64) : (($temp['0'] % 32) * 64) + ($temp['1'] % 64);

 			   $out .= '&#'.$number.';';
 			   $count = 1;
 			   $temp = array();
 		   }
 	   }
    }

    return $out;
}

// GeneralException
class GeneralException extends Exception {
}

function generalExceptionHandler($exception) {
	// echo $exception;
	header('Location: '.BASEPATH.'errorpage.html');
	die();
}

set_exception_handler('generalExceptionHandler');
