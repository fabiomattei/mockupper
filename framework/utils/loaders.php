<?php

/* ==============================================================
 * This file contains all function that mockupper uses in order
 * to load the files that composes the pages
 * ============================================================== */

/*
 * Load a block file.
 * It starts checking the "framework/blocks" folder in order to check that the passed
 * name matches a core block file name.
 * If it does not match it checks the "aggregators" folder looking for a file named:
 * aggregatos/$type/blocks/$path.php
 * If no file is found it checks the "datastore" folder looking for a file named:
 * datastore/$type/blocks/$path.php
 */
function block( $type, $path ) {
	if ( $type == 'core') {
		require_once 'templates/blocks/'.$path.'.php';
	} else {
		if ( file_exists( 'aggregators/'.$type.'/blocks/'.$path.'.php' ) ) {
		    require_once 'aggregators/'.$type.'/blocks/'.$path.'.php';
		}
		if ( file_exists( 'datastore/'.$type.'/blocks/'.$path.'.php' ) ) {
		    require_once 'datastore/'.$type.'/blocks/'.$path.'.php';
		}
	}
}

/*
 * Load an usecase file.
 * Usecase are associated to a posttype, in effect they all are contained
 * in a folder named "usecases" inside the postype folder.
 * If the usecase file is not found the systems write a note in the log
 */
function usecase( $type, $path ) {
	$filepath = 'datastore/'.$type.'/usecases/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -usecase- file dose not exists: '.$filepath );
	}
}

/*
 * Load a DAO (data access object) file.
 * DAO's are associated to a posttype, in effect they all are contained
 * in a folder named "dao" inside the postype folder.
 * If the dao file is not found the systems write a note in the log
 */
function dao( $type, $path ) {
	$filepath = 'datastore/'.$type.'/dao/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -dao- file dose not exists: '.$filepath );
	}
}

/*
 * Load an helper file.
 * helpers are associated to a posttype, in effect they all are contained
 * in a folder named "helpers" inside the postype folder.
 * If the helper file is not found the systems write a note in the log
 */
function helper( $type, $path ) {
	$filepath = 'datastore/'.$type.'/helpers/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -helper- file dose not exists: '.$filepath );
	}
}

/*
 * Load an partial file.
 * partials are associated to a posttype, in effect they all are contained
 * in a folder named "partial" inside the postype folder.
 * If the partial file is not found the systems write a note in the log
 */
function partial( $type, $path ) {
	$filepath = 'datastore/'.$type.'/partial/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -partial- file dose not exists: '.$filepath );
	}
}

/*
 * Load an importer file.
 * importers are associated to a posttype, in effect they all are contained
 * in a folder named "importers" inside the postype folder.
 * If the importer file is not found the systems write a note in the log
 */
function importer( $type, $path ) {
	$filepath = 'datastore/'.$type.'/importers/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -importer- file dose not exists: '.$filepath );
	}
}

/*
 * Load an exporter file.
 * exporters are associated to a posttype, in effect they all are contained
 * in a folder named "exporters" inside the postype folder.
 * If the exporter file is not found the systems write a note in the log
 */
function exporter( $type, $path ) {
	$filepath = 'datastore/'.$type.'/exporters/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -exporters- file dose not exists: '.$filepath );
	}
}

/*
 * Load a library file.
 * Libraries are contained in the folder named "core"
 */
function lib( $path ) {
	$filepath = 'framework/libs/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} elseif ( file_exists( 'libs/'.$path.'.php' ) ) {
		require_once $filepath;
	}
	else {
		$logger = new Logger();
		$logger->write( 'ERROR: -library- file dose not exists: '.$filepath );
	}
}

/*
 * Load an utils file.
 * Utils are contained in the folder named "core"
 */
function utils( $path ) {
	$filepath = 'framework/utils/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -utils- file dose not exists: '.$filepath );
	}
}

/**
 * Load an office file. (using require_once)
 * Office files are contained in the folder named "offices".
 * They act as the "controllers" of this framework, they load data from database
 * in order to populate blocks, they load the blocks and they organize blocks 
 * so blocks can be displayed in the template.
 *
 * @param        string     Group
 * @param        string     Action
 * @param        string     Parameters: string containing all parameters separated by '/'
 * @param        string     If set to "on" make the function return the calculated path
 *                          instead to "require" the file.
 *
 * @return       string     Just for testing purpose
 */
function office( $folder, $subfolder, $action, $testmode = 'off' ) {
	// default out path
	$filepath = 'offices';
	
	if ( $folder != '' ) {
		$filepath .= '/'.$folder;
	}
	
	if ( $subfolder != '' ) {
		$filepath .= '/'.$subfolder;
	}
	
	if ( $action == '' ) {
		$filepath .= '/index.php';
	} else {
		$filepath .= '/'.$action.'.php';
	}
	
	if ( $testmode == 'on' ) {
		return $filepath;
	} 
	
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -office- file dose not exists: '.$filepath );
	}
}

/**
 * It creates a URL appenting the content of variable $_SESSION['office'] to BASEPATH
 *
 * Result is: BASEPATH . $_SESSION['office'] . $final_part
 *
 * @param        string     Group
 * @param        string     Action
 * @param        string     Parameters: string containing all parameters separated by '/'
 * @param        string     Extension:  .html by default
 *
 * @return       string     The url well formed
 */
function make_url( $group = 'main', $action = '', $parameters = '', $extension = '.html' ) {
	if ( $group == 'main' AND $action == '' ) {
		return BASEPATH;
	}
	if ( $group != 'main' AND $action == '' ) {
		return BASEPATH.$_SESSION['office'].'-'.$group.'/index.html';
	}
    if ( $group == 'main' ) {
        return BASEPATH.$_SESSION['office'].'/'.$action.( $parameters == '' ? '' : '/'.$parameters ).$extension;
    } else {
        return BASEPATH.$_SESSION['office'].'-'.$group.'/'.$action.( $parameters == '' ? '' : '/'.$parameters ).$extension;
    }
	
}
