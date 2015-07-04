<?php

// ERROR reporting
ini_set('error_reporting', E_ALL);

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

/* 
 * PREDIFINED LOCATOR
 * here you can set the file open by default when a general user is visiting the 
 * base URL of the system
 */
define('FAMILY',     'public');
define('SUBFAMILY',  '');
define('AGGREGATOR', 'index');

// TIMEZONE
date_default_timezone_set('Europe/Rome');
