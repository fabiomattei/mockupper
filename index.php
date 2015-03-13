<?php

require_once 'settings.php';

#remove the directory path we don't want
$request = str_replace('/mockupper/', '', $_SERVER['REQUEST_URI']);

#split the path by '/'
$params = preg_split( '/\//', $request );

//echo $_SERVER['REQUEST_URI'].'<br>';
//print_r($params);

$family = $params[0];
$subfamily = '';
if ( strpos( $family, '-' ) !== FALSE ) {
	$newfamily = preg_split( '/-/', $family );
	$family    = $newfamily[0];
	$subfamily = $newfamily[1];
}
$aggregator = $params[1];

aggregator( $family, $subfamily, $aggregator );

$aggregator = new Aggregator();
$aggregator->showPage();
