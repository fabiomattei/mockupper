<?php

require_once APP_ROOT.'system/libs/gump/gump.class.php';

class UserCanUpdatePassword {

	function __construct($formdata, $userDao, $userid) { // $formdata = $_POST
		$this->userDao = $userDao;
		$this->userid = $userid;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'oldpassword'   => 'required|max_len,250|min_len,4',
		    'newpassword'   => 'required|max_len,250|min_len,4',
			'newpassword2'  => 'required|max_len,250|min_len,4',
		));

		$this->gump->filter_rules(array(
		    'oldpassword'  => 'trim',
		    'newpassword'  => 'trim',
			'newpassword2' => 'trim',
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() { 
		if($this->validated_data === false) {

			$this->dataValidated = false;
			$this->readableErrors = $this->gump->get_readable_errors(true);

		} else {
			
			$user = $this->userDao->getById($this->userid);
			$this->hashedPassword = UserDao::hashpassword($this->validated_data['oldpassword'], $user->user_salt);
			
			if ($this->hashedPassword == $user->user_hashedpsw) {
				
				if ($this->validated_data['newpassword'] != $this->validated_data['newpassword2']) {
					$this->dataValidated = false;
					$this->readableErrors = '<span class="error-message">The two given passwords are different</span>';
				} else {
					$this->dataValidated = true;
				
					$newsalt = UserDao::generatePassword(4);
					$newhadPSW = UserDao::hashpassword($this->validated_data['newpassword'], $newsalt);
					$presentmoment = date('Y-m-d', time());
				
					$fields = array('user_hashedpsw'        => $newhadPSW, 
									'user_salt'             => $newsalt, 
									'user_password_updated' => $presentmoment);

					$this->user_id = $this->userDao->update($userid, $fields);
				}
				
			} else {
				$this->dataValidated = false;
				$this->readableErrors = '<span class="error-message">You need to insert correcly the old password in order to modify your password.</span>';
			}
		}
	}
	
	public function isDataValidated() {
		return $this->dataValidated;
	}
	
	public function getReadableErrors() {
		return $this->readableErrors;
	}
}