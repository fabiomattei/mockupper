<?php

require_once "core/database/basicdao.php";

class UserDao {
	
	function __construct($setting='') {
		if ($setting != 'test') { // I check that in order to avoid initialization during testing
			try {      
				$this->DBH = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSERNAME, DBPASSWORD);
				$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				$logger = new Logger();
				$logger->write($e->getMessage(), __FILE__, __LINE__);
				throw new GeneralException('General malfuction!!!');
			}
		}
	}
	
	/**
	* Setter made for testing purpose
	*/
	public function setPDO($PDO) {
		$this->DBH = $PDO;
	}
	
	function getAll() {
		try {
			$STH = $this->DBH->query('SELECT id, name from users');
			$STH->setFetchMode(PDO::FETCH_OBJ);
 	   
			return $STH;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
	
	function checkUsernameAndPassword($name, $password) {
		try {
			$STH = $this->DBH->prepare('SELECT COUNT(*) as numberrows FROM users WHERE name = :name AND password = :password');
			$STH->bindParam(':name', $name, PDO::PARAM_STR);
			$STH->bindParam(':password', $password, PDO::PARAM_STR);
			$STH->execute();
			return $STH->fetchColumn();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
	
	public function getSaltForUsername($name) {
		try {
			$STH = $this->DBH->prepare('SELECT salt from users where name = :name');
			$STH->bindParam(':name', $name, PDO::PARAM_STR);
			$STH->execute();
			return $STH->fetchColumn();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
}
