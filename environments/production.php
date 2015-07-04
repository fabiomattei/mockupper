<?php

// ERROR reporting
ini_set('error_reporting', E_ALL);

// database
/** Live environment Cloud SQL login and SITE_URL info */
//define('DBHOST', ':/cloudsql/cihsscope:scopedb;');
define('DBHOST', 'mysql:unix_socket=/cloudsql/cihsscope:scopedb;dbname=sat');  
define('DBNAME', '');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');

/* 
 * APPLICATION BASE PATH
 * BASEPATH: the base URL where the web application is installed
 * PATHTOAPP: it is the eventual subfolder where the application is installed
 */
define('BASEPATH', 'http://example.com/');
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
