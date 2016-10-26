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
$request3 = str_replace( '.pdf', '', $request2 );
$request  = preg_replace( '/\?.*/', '', $request3 );

$parameters = array();

if ( strlen( $request ) > 0 ) {
	
	list( $family, $subfamily, $aggregator, $parameters ) = spliturl( $request );
	
	$controller = controller( $family, $subfamily, $aggregator );
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( $family, $subfamily, $aggregator );
} else {
    $controller = controller( FAMILY, SUBFAMILY, AGGREGATOR );
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( FAMILY, SUBFAMILY, AGGREGATOR );
}

$controller->showPage();
