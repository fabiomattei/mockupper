<?php

require_once 'system/libs/gump/gump.class.php';

class UserCanSubscribe {

	function __construct($formdata, $userDao) { // $formdata = $_POST
		$this->userDao = $userDao;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'name'         => 'required|max_len,250|min_len,4',
		    'surname'      => 'required|max_len,250|min_len,4',
			'email'        => 'required|max_len,250|min_len,4',
			'password'     => 'required|max_len,250|min_len,4',
			'organization' => 'min_len,2',
		));

		$this->gump->filter_rules(array(
		    'name'         => 'trim',
		    'surname'      => 'trim',
			'email'        => 'trim',
			'password'     => 'trim',
			'organization' => 'trim',
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() { 
		if($this->validated_data === false) {

			$this->dataValidated = false;
			$this->readableErrors = $this->gump->get_readable_errors(true);

		} else {
			
			$this->dataValidated = true;
			
			// TODO check if email was never used
			
			$newsalt = UserDao::generatePassword(4);
			$newhadPSW = UserDao::hashpassword($this->validated_data['password'], $newsalt);
			$presentmoment = date('Y-m-d', time());
			
			$fields = array('user_name'             => $this->validated_data['name'], 
						    'user_surname'          => $this->validated_data['surname'], 
						    'user_email'            => $this->validated_data['email'],
							'user_activated'        => 0,
							'user_organization'     => $this->validated_data['organization'],
							'user_hashedpsw'        => $newhadPSW, 
							'user_salt'             => $newsalt, 
							'user_password_updated' => $presentmoment);

			$this->user_id = $this->userDao->insert($fields);
			$this->user_name = $this->validated_data['name'];
			$this->user_email = $this->validated_data['email'];
		}
	}
	
	public function isDataValidated() {
		return $this->dataValidated;
	}
	
	public function getReadableErrors() {
		return $this->readableErrors;
	}
	
	public function getUserName() {
		return $this->user_name;
	}
	
	public function getEmail() {
		return $this->user_email;
	}
	
	public function getUserId() {
		return $this->user_id;
	}
}