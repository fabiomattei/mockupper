<?php

/* ==============================================================
 * This file contains all function that mockupper uses in order
 * to load the files that composes the pages
 * ============================================================== */

/* 
 * Load a block file.
 * It starts checking the "core/blocks" folder in order to check that the passed
 * name matches a core block file name.
 * If it does not match it checks the "aggregators" folder looking for a file named:
 * aggregatos/$type/blocks/$path.php
 * If no file is found it checks the "posttypes" folder looking for a file named:
 * posttypes/$type/blocks/$path.php
 */
function block( $type, $path ) {
	if ( $type == 'core') {
		require_once 'core/blocks/'.$path.'.php';
	} else {
		if ( file_exists( 'aggregators/'.$type.'/blocks/'.$path.'.php' ) ) {
		    require_once 'aggregators/'.$type.'/blocks/'.$path.'.php';
		}
		if ( file_exists( 'posttypes/'.$type.'/blocks/'.$path.'.php' ) ) {
		    require_once 'posttypes/'.$type.'/blocks/'.$path.'.php';
		}
	}
}

function usecase( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/usecases/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -usecase- file dose not exists: '.$filepath );
	}
}

function dao( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/dao/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -dao- file dose not exists: '.$filepath );
	}
}

function helper( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/helpers/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -helper- file dose not exists: '.$filepath );
	}
}

function partial( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/partial/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -partial- file dose not exists: '.$filepath );
	}
}

function importer( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/importers/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -importer- file dose not exists: '.$filepath );
	}
}

function exporter( $type, $path ) {
	$filepath = 'posttypes/'.$type.'/exporters/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
	    require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -exporters- file dose not exists: '.$filepath );
	}
}

function lib( $path ) {
	$filepath = 'core/libs/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -library- file dose not exists: '.$filepath );
	}
}

function utils( $path ) {
	$filepath = 'core/utils/'.$path.'.php';
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -utils- file dose not exists: '.$filepath );
	}
}

function aggregator( $family, $subfamily, $aggregator ) {
	if ( $subfamily == '' ) {
		$filepath = 'aggregators/'.$family.'/'.$aggregator.'.php';
	} else {
		$filepath = 'aggregators/'.$family.'/'.$subfamily.'/'.$aggregator.'.php';
	}
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	} else {
		$logger = new Logger();
		$logger->write( 'ERROR: -aggregator- file dose not exists: '.$filepath );
	}
}
