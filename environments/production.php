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

// APPLICATION BASE PATH
define('BASEPATH', 'http://toscasat.appspot.com/');

// TIMEZONE
date_default_timezone_set('Europe/Rome');
