<?php

include 'environments/testing.php';
include 'datastorage/tododao.php';

class TodoDaoTest extends PHPUnit_Extensions_Database_TestCase {
	
	/**
	* @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	*/
	public function getConnection() {
		$schema = 'CREATE TABLE "todos" (
		"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
		"title" VARCHAR,
		"body" VARCHAR);';
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
		return $this->createXMLDataSet(dirname(__FILE__).'/tododataset.xml');
	}
	
	public function test_itContains2Elements() {
		$dao = new TodoDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->getAll();
		$cont = 0;
		while($row = $alltodos->fetch()) {
		    $cont++;
		}
		$this->assertEquals(2, $cont);
	}

	public function test_getById() {
		$dao = new TodoDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->getById(1);
		if($row = $alltodos->fetch()) {
		    $this->assertEquals('My first todo title', $row->title);
		}
	}
	
	public function test_insert() {
		$dao = new TodoDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->insert('Hello', 'World');
		$alltodos = $dao->getById(3);
		if($row = $alltodos->fetch()) {
		    $this->assertEquals('Hello', $row->title);
		}
	}
	
	public function test_update() {
		$dao = new TodoDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->update(1, 'Hello', 'World');
		$alltodos = $dao->getById(1);
		if($row = $alltodos->fetch()) {
		    $this->assertEquals('Hello', $row->title);
		}
	}
	
	public function test_delete() {
		$dao = new TodoDao('test');
		$dao->setPDO($this->pdo);
		$alltodos = $dao->delete(2);
		$alltodos = $dao->getAll();
		$cont = 0;
		while($row = $alltodos->fetch()) {
		    $cont++;
		}
		$this->assertEquals(1, $cont);
	}
	
}