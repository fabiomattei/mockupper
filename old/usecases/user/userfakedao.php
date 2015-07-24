<?php

class UserFakeDao {
	
	function __construct() {
		$this->todofaketable = array('1' => 'fabio');
	}
	
	function checkUsernameAndPassword($name, $password) {
		return 1;
	}
	
	public function getSize() {
		return count($this->todofaketable);
	}
	
	public function getSaltForUsername() {
		return 'hellohellohellohellooo';
	}
	
}