<?php

/**
 * Created by Fabio Mattei <fabio@funambolo.net>
 * Date: 17/10/2016
 * Time: 10:32
 */
class Organization {
	
	const pescara_id = 1;

	static $sites = array( 
		Organization::pescara_id => 'Pescara',
	);
	
	const adm_office_id = 1;
	const ramp_office_id = 2;
	const manager_office_id = 3;
	const safety_office_id = 4;
	const admin_id = 99;
	
	static $offices = array( 
		Organization::adm_office_id     => 'ADM', 
		Organization::ramp_office_id    => 'Ramp',
		Organization::manager_office_id => 'Manager',
		Organization::safety_office_id  => 'Safety',
		Organization::admin_id          => 'Admin',
	);
	
	// Associate a specific chapert to offices that have access to it
	static $chapters = array( 
		Organization::adm_office_id => array(
			'riskregister', 'reports'
		),
		Organization::ramp_office_id => array(
			'riskregister', 'reports', 'maintenance'
		),
		Organization::manager_office_id => array(
			'riskregister', 'reports'
		),
		Organization::safety_office_id => array(
			'riskregister', 'reports', 'gsr',
		),
	);
	
	static function get_site( $site_id ) {
		return Organization::$offices[$site_id];
	}

	static function get_sites() {
		return Organization::$sites;
	}

	static function get_office( $office_id ) {
		return Organization::$offices[$office_id];
	}
	
	static function get_offices() {
		return Organization::$offices;
	}

}
