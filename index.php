<?php

/**
 * This is the main script.
 *
 * This script processes all requests to the application, it makes an interpretation
 * of the URL, in calls the right controller and pass the parameters to the 
 * selected controller.
 * In order to develop an application you do not need to touch this script.
 */

require_once 'settings.php';

// TODO check cron operations

// remove the directory path we don't want
$request1 = substr( $_SERVER['REQUEST_URI'], strlen( PATHTOAPP ) );
$request2 = str_replace( '.html', '', $request1 );
$request3 = str_replace( '.pdf', '', $request2 );
$request  = preg_replace( '/\?.*/', '', $request3 );

$parameters = array();

if ( strlen( $request ) > 0 ) {
	
	list( $team, $chapter, $controller, $parameters ) = spliturl( $request );
	
	$controller = controller( $team, $chapter, $controller );
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( $team, $chapter, $controller );
} else {
    $controller = controller( OFFICE, CHAPTER, CONTROLLER );
    $controller->setParameters( $parameters );
    $controller->setRequest( $request );
    $controller->setControllerPath( OFFICE, CHAPTER, CONTROLLER );
}

$controller->showPage();
