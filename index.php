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
	list( $family, $subfamily, $office, $parameters ) = spliturl( $request );

	controller( $family, $subfamily, $office );
} else {
	// redirecting to default aggregator set in the environment file
	controller( FAMILY, SUBFAMILY, AGGREGATOR );
}

$controller = new Aggregator();
$controller->setParameters( $parameters );
$controller->showPage();
