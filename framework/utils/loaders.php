<?php

/* ==============================================================
 * This file contains all function that mockupper uses in order
 * to load the files that composes the pages
 * ============================================================== */

/**
 * Load a block file.
 * It starts checking the "framework/blocks" folder in order to check that the passed
 * name matches a core block file name.
 * If it does not match it checks the "aggregators" folder looking for a file named:
 * aggregatos/$type/blocks/$path.php
 * If no file is found it checks the "datastore" folder looking for a file named:
 * datastore/$type/blocks/$path.php
 * 
 * If no file is found the function writes an ERROR message in the log
 *
 * @param        string     datastore name or office name or 'core'
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
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

/**
 * Load an usecase file.
 * Usecase are associated to a posttype, in effect they all are contained
 * in a folder named "usecases" inside the postype folder.
 * If the usecase file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function usecase( $datastore, $path ) {
	$filepath = 'datastore/'.$datastore.'/usecases/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -usecase- file dose not exists: '.$filepath );
	}
}

/**
 * Load a DAO (data access object) file.
 * DAO's are associated to a posttype, in effect they all are contained
 * in a folder named "dao" inside the postype folder.
 * If the dao file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function dao( $datastore, $path ) {
	$filepath = 'datastore/'.$datastore.'/dao/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -dao- file dose not exists: '.$filepath );
	}
}

/**
 * Load an helper file.
 * helpers are associated to a posttype, in effect they all are contained
 * in a folder named "helpers" inside the postype folder.
 * If the helper file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function helper( $datastore, $path ) {
	$filepath = 'datastore/'.$datastore.'/helpers/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -helper- file dose not exists: '.$filepath );
	}
}

/**
 * Load an partial file.
 * partials are associated to a posttype, in effect they all are contained
 * in a folder named "partial" inside the postype folder.
 * If the partial file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function partial( $datastore, $path ) {
	$filepath = 'datastore/'.$datastore.'/partial/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -partial- file dose not exists: '.$filepath );
	}
}

/**
 * Load an importer file.
 * importers are associated to a datastore, in effect they all are contained
 * in a folder named "importers" inside the datastore folder.
 * If the importer file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function importer( $datastore, $path ) {
	
	if ( $datastore == '' OR $path == '' ) throw new GeneralException('General malfuction!!!');
	
	$filepath = 'datastore/'.$datastore.'/importers/'.$path.'.php';
	
	if ( TESTMODE == 'on' ) return $filepath;
	
	if ( file_exists( $filepath ) ) {
		
	    require_once $filepath;
		
	} else {
		
		if ( TESTMODE == 'on' ) return '';
		
		$logger = new Logger();
		$logger->write( 'ERROR: -importer- file dose not exists: '.$filepath );
		
	}
}

/**
 * Load an exporter file.
 * exporters are associated to a datastore, in effect they all are contained
 * in a folder named "exporters" inside the datastore folder.
 * If the exporter file is not found the systems writes an ERROR message in the log
 *
 * @param        string     datastore name
 * @param        string     path concatenated to file name
 *
 * @return       string     Just for testing purpose
 */
function exporter( $datastore, $path ) {
	
	if ( $datastore == '' OR $path == '' ) throw new GeneralException('General malfuction!!!');
	
	$filepath = 'datastore/'.$datastore.'/exporters/'.$path.'.php';
	
	if ( TESTMODE == 'on' ) return $filepath;
	
	if ( file_exists( $filepath ) ) {
		
	    require_once $filepath;
		
	} else {
		
		if ( TESTMODE == 'on' ) return '';
		
		$logger = new Logger();
		$logger->write( 'ERROR: -exporters- file dose not exists: '.$filepath );
		
	}
}

/**
 * Load a library file.
 * Libraries are contained in the folder named "framework"
 * 
 * If no lib file is found the function writes an ERROR message in the log
 *
 * @param        string     lib file name
 *
 * @return       string     Just for testing purpose
 */
function lib( $path ) {
	
	if ( $path == '' ) throw new GeneralException('General malfuction!!!');
	
	if ( file_exists( 'framework/libs/'.$path.'.php' ) ) {
		
		if ( TESTMODE == 'on' ) return 'framework/libs/'.$path.'.php';
		
		require_once 'framework/libs/'.$path.'.php';
		
	} elseif ( file_exists( 'libs/'.$path.'.php' ) ) {
		
		require_once 'libs/'.$path.'.php';
		
	} else {
		
		if ( TESTMODE == 'on' ) return '';
		
		$logger = new Logger();
		$logger->write( 'ERROR: -library- file dose not exists: '.$filepath );
		
	}
}

/**
 * Load an utils file. (using require_once)
 * Uitls files are libraries of useful functions you can use inside the code.
 * Some utils are provided by the framework, they are located in /framework/utils.
 * User can write his own utils and put the in the project root folder: /utils
 * When user uses the utils function in order to load a file the function checks
 * initially in the framwork/utils folder and then in /utils folder.
 * 
 * If no file is found the function writes an ERROR message in the log
 *
 * @param        string     utils file name
 *
 * @return       string     Just for testing purpose
 */
function utils( $path ) {
	if ( $path == '' ) throw new GeneralException('General malfuction!!!');
	
	if ( file_exists( 'framework/utils/'.$path.'.php' ) ) {
		
		if ( TESTMODE == 'on' ) return 'framework/utils/'.$path.'.php';
		
		require_once 'framework/utils/'.$path.'.php';
		
	} elseif ( file_exists( 'utils/'.$path.'.php' ) ) {
		
		require_once 'utils/'.$path.'.php';
		
	} else {
		
		if ( TESTMODE == 'on' ) return '';
		
		$logger = new Logger();
		$logger->write( 'ERROR: -utils- file dose not exists: ' . $path );
		
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
 * @return       string     Just for testing purpose
 */
function office( $folder, $subfolder, $action ) {
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
	
	if ( TESTMODE == 'on' ) return $filepath; 
	
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
