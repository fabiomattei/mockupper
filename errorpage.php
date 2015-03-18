<?php

require_once 'settings.php';

aggregator( 'public', '', 'errorpage' );

$aggregator = new Aggregator();
$aggregator->showPage();
