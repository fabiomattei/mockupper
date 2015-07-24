<?php

include 'environments/testing.php';
include 'datastorage/userdao.php';

class UserDaoTest extends PHPUnit_Extensions_Database_TestCase {
	
	/**
	* @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	*/
	public function getConnection() {
		$schema = 'CREATE TABLE "users" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
		"name" VARCHAR,
		"password" VARCHAR,
		"salt" VARCHAR);';
		$pdo = new PDO('sqlite::memory:');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec($schema);
		$this->pdo = $pdo;
		return $this->createDefaultDBConnection($pdo, ':memory:');
	}

	/**
	* @return PHPUnit_Extensions_Database_DataSet_IDataSet
	*/
	public function getDataSet() {
		return $this->createXMLDataSet(dirname(__FILE__).'/userdataset.xml');
	}
	
	public function test_itContains2Elements() {
		$dao = new UserDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->getAll();
		$cont = 0;
		while($row = $alltodos->fetch()) {
		    $cont++;
		}
		$this->assertEquals(2, $cont);
	}
	
	public function test_checkUsernameAndPassword() {
		$dao = new UserDao('test');
		$dao->setPDO($this->pdo);
		$usersnumber = $dao->checkUsernameAndPassword('fabio', 'hello');
	    $this->assertEquals(1, $usersnumber);
	}
	
}