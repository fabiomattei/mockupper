<?php

// ERROR reporting
ini_set('error_reporting', E_ALL);

// database
define('DBHOST', 'mysql:host=127.0.0.1:8889;dbname=');
define('DBNAME', 'sat');
define('DBUSERNAME', 'root');
define('DBPASSWORD', 'root');

// APPLICATION BASE PATH
define('BASEPATH', 'http://127.0.0.1:8080/');

// TIMEZONE
date_default_timezone_set('Europe/Rome');
