<?php

/*
 * APPLICATION ENVIRONMENT
 *
 * You can load different configurations depending on your
 * current environment. You can find the configuration files
 * in APP_ROOT/environments/
 */

if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
	// loading pruduction settings
	require_once APP_ROOT.'environments/production.php';
} else {
	// loading developement settings
	require_once APP_ROOT.'environments/development.php';
}

require_once APP_ROOT.'system/utils.php';