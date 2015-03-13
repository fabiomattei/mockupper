<?php

require_once APP_ROOT.'system/libs/gump/gump.class.php';

class UserForgotPassword {

	function __construct($formdata, $userDao, $mailer) { // $formdata = $_POST
		$this->userDao = $userDao;
		$this->mailer = $mailer;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'email'   => 'required|max_len,50|min_len,1',
		));

		$this->gump->filter_rules(array(
		    'email'  => 'trim',
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() { 
		if($this->validated_data === false) {

			$this->dataValidated = false;
			$this->readableErrors = $this->gump->get_readable_errors(true);

		} else {
			
			$this->dataValidated = true;
			
			$user = $this->userDao->getOneByFields(array('user_email' => $this->validated_data['email']));			
		
			if (isset($user->user_id)) {
				$newsalt = UserDao::generatePassword(4);
				$newpassword = UserDao::generatePassword(8);
				$newhadPSW = UserDao::hashpassword($newpassword, $newsalt);
				$presentmoment = date('Y-m-d', time());
		
				$fields = array('user_hashedpsw'        => $newhadPSW, 
								'user_salt'             => $newsalt, 
								'user_password_updated' => $presentmoment);

				$this->user_id = $this->userDao->update($user->user_id, $fields);
			
	            $object = 'Now password from SAT';
	            $message = 'Dear '.$user->user_name.', your new assword to access to SAT is: '.$newpassword;
				
				$this->mailer->send($user->user_email, $object, $message);
			} else { 
				// email not in the database, no user exists
				$this->dataValidated = false;
				$this->readableErrors = "Email is not valid"; 
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