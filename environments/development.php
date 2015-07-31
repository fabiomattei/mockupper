<?php

define( 'RUNNINGENVIRONMENT', 'development' );

// ERROR reporting
ini_set('error_reporting', E_ALL);

// It activates the test mode
define ( 'TESTMODE', 'off' );
define ( 'APPTESTMODE', 'off' );

// database
define('DBHOST', 'mysql:host=127.0.0.1:8889;dbname=');
define('DBNAME', 'todo');
define('DBUSERNAME', 'root');
define('DBPASSWORD', 'root');

/* 
 * APPLICATION BASE PATH
 * BASEPATH: the base URL where the web application is installed
 * PATHTOAPP: it is the eventual subfolder where the application is installed
 */
define('BASEPATH',  'http://localhost:8888/mockupper/');
define('PATHTOAPP', '/mockupper/');

define('APPNAMEFORPAGETITLE', 'Mockupper');

/* 
 * PREDIFINED LOCATOR
 * here you can set the file open by default when a general user is visiting the 
 * base URL of the system
 */
define('FAMILY',     'public');
define('SUBFAMILY',  '');
define('AGGREGATOR', 'index');

/* 
 * PREDIFINED TEMPLATES FILES
 * PUBLICTEMPLATE: filename of public template contained in the "templates" folder without .php 
 * PRIVATETEMPLATE:  filename of private template contained in the "templates" folder without .php 
 */
define('PUBLICTEMPLATE',  'public');
define('PRIVATETEMPLATE', 'application');

// TIMEZONE
date_default_timezone_set('Europe/Rome');
