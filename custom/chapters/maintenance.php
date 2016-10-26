<?php

/**
 * Created by Fabio Mattei <fabio@toscasolutions.com>
 * Date: 17/10/2016
 * Time: 11:48
 */
class Maintenance {
	
	static $chapter_slug = 'maintenance';
    static $chapter_name = 'Maintenance';
    static $chapter_icon = 'data-icon="v" class="linea-icon linea-basic fa-fw"';
	
	/* Entities supported by this module */
	static $entries = array( 
		'asset'               => 'Asset',
		'periodicmaintenance' => 'Periodic Maintenances',
		'executedmaintenace'  => 'Executed Maintenaces',
	);
	
	static $dependencies = array(
		'asset'               => array( 'periodicmaintenance' ),
		'periodicmaintenance' => array( 'executedmaintenace' ),
		'executedmaintenace'  => array(  ),
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
		'asset'               => array( 
									'read' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'write' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'delete' => array( Organization::ramp_office_id, Organization::adm_office_id )
								),
		'executedmaintenace'  => array( 
									'read' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'write' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'delete' => array( Organization::ramp_office_id, Organization::adm_office_id )
								),
		'periodicmaintenance' => array( 
									'read' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'write' => array( Organization::ramp_office_id, Organization::adm_office_id ),
									'delete' => array( Organization::ramp_office_id, Organization::adm_office_id )
								),
	);
	
	// voices of menu with controllers
	static $menu = array( 
		'assets'                  => 'Assets', 
		'calendar'                => 'Maintenance by date',
		'km'                      => 'Maintenance by Km',
		'hours'                   => 'Maintenance by Hours',
		'periodicmaintenace'      => 'Maintenance by Asset',
		'maintenancelog'          => 'Maintenance Log',
		'executedoperationexport' => 'Exports',
	);
	
	// controllers
	static $controller = array(
		'assetdelete'                       => array( 'delete', 'asset' ),
		'assetexecutedperiodicmaintenance'  => array( 'read',   'executedmaintenace' ),
		'assetperiodicmaintenance'          => array( 'read',   'periodicmaintenance' ),
		'assets'                            => array( 'read',   'asset' ),
		'calendar'                          => array( 'read',   'periodicmaintenance' ),
		'editasset'                         => array( 'write',  'asset' ),
		'executedmaintenancedelete'         => array( 'delete', 'executedmaintenace' ),
		'executedmaintenanceedit'           => array( 'write',  'executedmaintenace' ),
		'executedoperationexport'           => array( 'read',   'executedmaintenace' ),
		'executedperiodicmaintenanceinsert' => array( 'write',  'periodicmaintenance' ),
		'hours'                             => array( 'read',   'periodicmaintenance' ),
		'km'                                => array( 'read',   'periodicmaintenance' ),
		'maintenancelog'                    => array( 'read',   'periodicmaintenance' ),
		'periodicmaintenace'                => array( 'read',   'periodicmaintenance' ),
		'periodicmaintenancedelete'         => array( 'delete', 'periodicmaintenance' ),
		'periodicmaintenanceedit'           => array( 'write',  'periodicmaintenance' ),
	);
	
	static function entries_office_can_see_in_menu( $office_id ) {
		return Maintenance::$menu;
	}
	
	static function authorize_operation( $controller, $office_id ) {
		list($action, $entry) = Maintenance::$controller[$controller];
		return in_array( $office_id, Maintenance::$authorization[$entry][$action] );
	}

}
