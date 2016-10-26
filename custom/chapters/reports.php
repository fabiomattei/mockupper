<?php

/**
 * Created by Fabio Mattei <fabio@toscasolutions.com>
 * Date: 21/10/2016
 * Time: 15:28
 */
class Reports {
	
	static $chapter_slug = 'reports';
    static $chapter_name = 'Reports';
    static $chapter_icon = 'data-icon=")" class="linea-icon linea-basic fa-fw"';
	
	/* Entities supported by this module */
	static $entries = array( 
		'report'              => 'Report',
		'recommendation'      => 'Recommendation',
	);
	
	static $dependencies = array(
		'report'         => array( 'recommendation' ),
		'recommendation' => array(  ),
	);
	
	/*
	Standard linking system: (this is the real added value)
	i link devono essere precalcolati in base al nome dell'entita ed all'array dependencies
	entitynew
	entityedit
	entitydelete
	entityinfo
	entityview (con i sotto link precalcolati delle entita' collegate e con le funzionalita' progetto)
	entitypdf
	entitylist
	entityexportpdf
	entityexportexcel
	entitylog
	*/
	
	static $authorization = array( 
		'report'         => array( 
								'read' => array( Organization::adm_office_id, Organization::ramp_office_id ),
								'write' => array( Organization::adm_office_id, Organization::ramp_office_id ), 
								'delete' => array( Organization::adm_office_id, Organization::ramp_office_id ) 
								),
		'recommendation' => array( 
								'read' => array( Organization::adm_office_id, Organization::ramp_office_id ),
								'write' => array( Organization::adm_office_id, Organization::ramp_office_id ), 
								'delete' => array( Organization::adm_office_id, Organization::ramp_office_id ) 
								),
	);
	
	// voices of menu with controllers
	static $menu = array(
        'reportlist'         => 'Reports',
        'recommendationlist' => 'Recommendations',
	);
	
	// controllers
	static $controller = array(
		'reportnew'                 => array( 'write',  'report' ),
		'reportedit'                => array( 'write',  'report' ),
		'reportdelete'              => array( 'delete', 'report' ),
		'reportinfo'                => array( 'read',   'report' ),
		'reportview'                => array( 'read',   'report' ),
		'reportpdf'                 => array( 'read',   'report' ),
		'reportlist'                => array( 'read',   'report' ),
		'reportexportpdf'           => array( 'read',   'report' ),
		'reportexportexcel'         => array( 'read',   'report' ),
		'reportlog'                 => array( 'read',   'report' ),
		'recommendationnew'         => array( 'write',  'recommendation' ),
		'recommendationedit'        => array( 'write',  'recommendation' ),
		'recommendationdelete'      => array( 'delete', 'recommendation' ),
		'recommendationinfo'        => array( 'read',   'recommendation' ),
		'recommendationview'        => array( 'read',   'recommendation' ),
		'recommendationpdf'         => array( 'read',   'recommendation' ),
		'recommendationlist'        => array( 'read',   'recommendation' ),
		'recommendationexportpdf'   => array( 'read',   'recommendation' ),
		'recommendationexportexcel' => array( 'read',   'recommendation' ),
		'recommendationlog'         => array( 'read',   'recommendation' ),
	);
	
	static function entries_office_can_see_in_menu( $office_id ) {
		return Reports::$menu;
	}
	
	static function authorize_operation( $controller, $office_id ) {
		list($action, $entry) = Reports::$controller[$controller];
		return in_array( $office_id, Reports::$authorization[$entry][$action] );
	}

}
