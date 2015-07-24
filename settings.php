<?php

/*
 * APPLICATION ENVIRONMENT
 *
 * You can load different configurations depending on your
 * current environment. You can find the configuration files
 * in APP_ROOT/environments/
 */

if ( null !== TESTCASE ) {
	if ( isset( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false ) {
		// loading pruduction settings
		require_once 'environments/production.php';
	} else {
		// loading developement settings
		require_once 'environments/development.php';
	}
} else {
	require_once 'environments/test.php';
}


// Loading the basic framework
require_once 'framework/utils/exception.php';
require_once 'framework/utils/loaders.php';
require_once 'framework/utils/utils.php';
require_once 'framework/logger/logger.php';
