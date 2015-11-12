<?php

require_once 'settings.php';

// checking if I am using https
if ( RUNNINGENVIRONMENT === 'production' AND $_SERVER['HTTPS'] === 'off' ) {
	header( 'Location: '.BASEPATH );
	die();
}

// TODO check cron operations

// remove the directory path we don't want
$request1 = substr( $_SERVER['REQUEST_URI'], strlen( PATHTOAPP ) );
$request2 = str_replace( '.html', '', $request1 );
$request  = str_replace( '.pdf', '', $request2 );

$parameters = array();

if ( strlen( $request ) > 0 ) {
	list( $family, $subfamily, $aggregator, $parameters ) = spliturl( $request );

	$returned_action = controller( $family, $subfamily, $aggregator );
} else {
	$returned_action = controller( FAMILY, SUBFAMILY, AGGREGATOR );
}

if ( class_exists( $returned_action ) ) {
	$aggregator = new $returned_action();
} else {
	$aggregator = new Aggregator();
}
$aggregator->setParameters( $parameters );
$aggregator->showPage();
