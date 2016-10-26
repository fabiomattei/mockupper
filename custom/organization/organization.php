<?php

/**
 * Created by Fabio Mattei <fabio@funambolo.net>
 * Date: 17/10/2016
 * Time: 10:32
 */
class Organization {
	
	const site_one_id = 1;

	static $sites = array( 
		Organization:site_one_id => 'Site one',
	);
	
	const team_one_id = 1;
	const team_two_id = 2;
	const team_three_id = 3;
	const team_admin_id = 99;
	
	static $teams = array( 
		Organization::team_one_id   => 'Team one', 
		Organization::team_two_id   => 'Team two',
		Organization::team_three_id => 'Team three',
		Organization::team_admin_id => 'Admin',
	);
	
	// Associate a specific chapert to offices that have access to it
	static $chapters = array( 
		Organization::team_one_id => array(
			'chapter_one', 'chapter_two'
		),
		Organization::team_two_id => array(
			'chapter_one', 'chapter_two', 'chapter_three'
		),
		Organization::team_three_id => array(
			'chapter_two', 'chapter_three'
		),
		Organization::team_admin_id => array(
			'chapter_admin',
		),
	);
	
	static function get_site( $site_id ) {
		return Organization::$teams[$site_id];
	}

	static function get_sites() {
		return Organization::$sites;
	}

	static function get_office( $team_id ) {
		return Organization::$teams[$team_id];
	}
	
	static function get_offices() {
		return Organization::$teams;
	}

}
