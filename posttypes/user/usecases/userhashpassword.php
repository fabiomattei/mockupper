<?php

if (version_compare(phpversion(), '5.5', '<')) {
    require_once APP_ROOT.'system/libs/password/password.php';
}

class UserHashPassword {

	function __construct($password) {
		//$this->salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM); // PHP >= 5.5
		$this->salt = MD5(microtime()); // PHP < 5.5
		$options = [
		    'cost' => 11,
		    'salt' => $this->salt,
		];
		$this->hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
	}
	
	public function getHashedPassword() {
		return $this->hashedPassword;
	}
	
	public function getSalt() {
		return $this->salt;
	}

}