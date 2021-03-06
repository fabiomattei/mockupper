<?php

echo 'sono in test';
	
// ERROR reporting
ini_set( 'error_reporting', E_ALL );

// It simulates we are out of GAE
define ( 'RUNNINGENVIRONMENT', 'none' );

// It activates the test mode
define ( 'TESTMODE', 'on' );
define ( 'APPTESTMODE', 'off' );

// database
/** Live environment Cloud SQL login and SITE_URL info */
//define('DBHOST', ':/cloudsql/cihsscope:scopedb;');
define( 'DBHOST', '' );  
define( 'DBNAME', '' );
define( 'DBUSERNAME', 'root' );
define( 'DBPASSWORD', '' );

/* 
 * APPLICATION BASE PATH
 * BASEPATH: the base URL where the web application is installed
 * PATHTOAPP: it is the eventual subfolder where the application is installed
 */
define( 'BASEPATH', 'http://www.example.com/' );
define( 'PATHTOAPP', '/mockupper/' );

define('APPNAMEFORPAGETITLE', 'Mockupper');

/* 
 * PREDIFINED LOCATOR
 * here you can set the file open by default when a general user is visiting the 
 * base URL of the system
 */
define( 'OFFICE',     'public' );
define( 'CHAPTER',  '' );
define( 'CONTROLLER', 'index' );

/* 
 * PREDIFINED TEMPLATES FILES
 * PUBLICTEMPLATE: filename of public template contained in the "templates" folder without .php 
 * PRIVATETEMPLATE:  filename of private template contained in the "templates" folder without .php 
 */
define( 'PUBLICTEMPLATE',  'public' );
define( 'PRIVATETEMPLATE', 'application' );

// TIMEZONE
date_default_timezone_set( 'Europe/Rome' );
