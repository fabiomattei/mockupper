<?php

require_once 'system/libs/gump/gump.class.php';

class UserCanLogIn {

	function __construct($formdata, $userDao) { // $formdata = $_POST
		$this->userDao = $userDao;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'email' => 'required|max_len,80|min_len,4',
		    'password' => 'required|max_len,80|min_len,4',
		));

		$this->gump->filter_rules(array(
		    'email' => 'trim',
		    'password' => 'trim'
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() { 
		if($this->validated_data === false) {

			$this->dataValidated = false;

		} else {
			
			$this->dataValidated = true;
			
			$this->email = $this->validated_data['email']; // passing back to caller
			
			$salt = $this->userDao->getSaltForEmail($this->validated_data['email']);

			$hashedPassword = UserDao::hashpassword($this->validated_data['password'], $salt);
			
			$this->userCanLogIn = $this->userDao->checkEmailAndPassword(
										$this->validated_data['email'],
										$hashedPassword);
			
		}
	}
	
	public function getDataValidated() {
		return $this->dataValidated;
	}
	
	public function getUserCanLogIn() {
		return $this->userCanLogIn;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getUser() {
		return $this->userDao->findByEmail($this->validated_data['email']);
	}
}
