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
	require_once 'environments/production.php';
} else {
	// loading developement settings
	require_once 'environments/development.php';
}

require_once 'core/utils/loaders.php';
require_once 'core/utils/utils.php';
require_once 'core/logger/logger.php';
