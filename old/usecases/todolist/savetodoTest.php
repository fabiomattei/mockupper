<?php

define('APP_ROOT', '');
require_once 'usecases/todolist/savetodo.php';
require_once 'system/utils.php';
require_once 'test/usecases/todolist/todofakedao.php';

class SaveTodoTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenWrongInput_DoNotPassValidation() {
	    $uc = new SaveTodo(array('id' => 'hi', 'title' => 'My new to do'), new TodoFakeDao());
		$uc->performAction();
		$this->assertFalse($uc->getDataValidated());
	}
	
	public function test_GivenUnespectedField_DoNotPassValidation() {
	    $uc = new SaveTodo(array('id' => 'hi', 'worngfield' => 'hello'), new TodoFakeDao());
		$uc->performAction();
		$this->assertFalse($uc->getDataValidated());
	}
	
	public function test_GivenGoodInput_ItSavesNewRecord() {
		$fakedb = new TodoFakeDao();
	    $uc = new SaveTodo(array('id' => '0', 'title' => 'My new to do', 'body' => 'try'), $fakedb);
		$uc->performAction();
		$this->assertTrue($uc->getDataValidated());
		$this->assertSame(2, $fakedb->getSize());
	}
	
	public function test_GivenGoodInput_ItUpdateOldRecord() {
		$fakedb = new TodoFakeDao();
	    $uc = new SaveTodo(array('id' => '1', 'title' => 'My new to do', 'body' => 'try'), $fakedb);
		$uc->performAction();
		$this->assertTrue($uc->getDataValidated());
		$this->assertSame(1, $fakedb->getSize());
	}
	
}