<?php

require_once "framework/database/basicdao.php";

class TodoDao {
	
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
			# creating the statement
			$STH = $this->DBH->query('SELECT id, title, body from todos');
 
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
 	   
			return $STH;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function getById($id) {
		try {
			$STH = $this->DBH->prepare('SELECT id, title, body from todos WHERE id = :id');
			$STH->bindParam(':id', $id);
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
 	   
			return $STH;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function insert($title, $body) {
		try {
			$STH = $this->DBH->prepare('INSERT INTO todos (title, body) values (:title, :body)');
			$STH->bindParam(':title', $title);
			$STH->bindParam(':body', $body);
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function update($id, $title, $body) {
		try {
			$STH = $this->DBH->prepare('UPDATE todos set title = :title, body = :body WHERE id = :id');
			$STH->bindParam(':title', $title);
			$STH->bindParam(':body', $body);
			$STH->bindParam(':id', $id);
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function delete($id) {
		try {
			$STH = $this->DBH->prepare('DELETE FROM todos WHERE id = :id');
			$STH->bindParam(':id', $id);
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
}
