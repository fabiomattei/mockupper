<?php

require_once 'settings.php';

// remove the directory path we don't want
$request1 = str_replace(PATHTOAPP, '', $_SERVER['REQUEST_URI']);
$request = str_replace('.html', '', $request1);

$parameters = array();
if ( strlen( $request ) > 0 ) {
	list( $family, $subfamily, $aggregator, $parameters ) = spliturl( $request );

	aggregator( $family, $subfamily, $aggregator );
} else {
	aggregator( 'public', '', 'index' );
}

$aggregator = new Aggregator();
$aggregator->setParameters( $parameters );
$aggregator->showPage();
