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

	$returned_action = controller( $family, $subfamily, $aggregator );

    if ( class_exists( $returned_action ) ) {
        $controller = new $returned_action();
    } else {
        $controller = new Aggregator();
    }
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( $family, $subfamily, $aggregator );
} else {
    $returned_action = controller( FAMILY, SUBFAMILY, AGGREGATOR );

    $controller = new $returned_action();
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( FAMILY, SUBFAMILY, AGGREGATOR );
}


$controller->showPage();

