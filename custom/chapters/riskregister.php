<?php

/**
 * Created by Fabio Mattei <fabio@toscasolutions.com>
 * Date: 17/10/2016
 * Time: 11:48
 */
class Riskregister {
	
	static $chapter_slug = 'riskregister';
    static $chapter_name = 'Risk Register';
    static $chapter_icon = 'data-icon="F" class="linea-software linea-basic fa-fw"';
	
	/* Entities supported by this module */
	static $entries = array( 
		'risk' => 'Risk',
	);
	
	static $dependencies = array(
		'risk' => array( ),
	);
	
	static $authorization = array( 
		'risk' => array( 
			   		'read' => array( Organization::adm_office_id, Organization::manager_office_id ),
			   		'write' => array( Organization::adm_office_id, Organization::manager_office_id ),
			   		'delete' => array( Organization::adm_office_id, Organization::manager_office_id )
			   	),
	);
	
	// voices of menu with controllers
	static $menu = array(
        'risklist' => 'Risks',
	);
	
	// controllers
	static $controller = array(
		'risknew'                 => array( 'write',  'risk' ),
		'riskedit'                => array( 'write',  'risk' ),
		'riskdelete'              => array( 'delete', 'risk' ),
		'riskinfo'                => array( 'read',   'risk' ),
		'riskview'                => array( 'read',   'risk' ),
		'riskpdf'                 => array( 'read',   'risk' ),
		'risklist'                => array( 'read',   'risk' ),
		'riskexportpdf'           => array( 'read',   'risk' ),
		'riskexportexcel'         => array( 'read',   'risk' ),
		'risklog'                 => array( 'read',   'risk' ),
	);
	
	static function entries_office_can_see_in_menu( $office_id ) {
		return Riskregister::$menu;
	}
	
	static function authorize_operation( $controller, $office_id ) {
		list($action, $entry) = Riskregister::$controller[$controller];
		return in_array( $office_id, Riskregister::$authorization[$entry][$action] );
	}

}
