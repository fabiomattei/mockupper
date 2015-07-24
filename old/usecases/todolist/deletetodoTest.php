<?php

define('APP_ROOT', '');
require_once 'usecases/todolist/deletetodo.php';
require_once 'system/utils.php';
require_once 'test/usecases/todolist/todofakedao.php';

class DeleteTodoTest extends \PHPUnit_Framework_TestCase {
	
	public function test_GivenWrongInput_ThrowsGeneralException() {
		$this->setExpectedException('GeneralException');
		$fakedb = new TodoFakeDao();
	    $uc = new DeleteTodo(array('id' => 'hi'), $fakedb);
		$uc->performAction();
	}
	
	public function test_GivenUnespectedField_ThrowsGeneralException() {
		$this->setExpectedException('GeneralException');
		$fakedb = new TodoFakeDao();
	    $uc = new DeleteTodo(array('id' => 'hi', 'title' => 'hello'), $fakedb);
		$uc->performAction();
	}
	
	public function test_GivenAGoodRequest_RecordDeleted() {
		$fakedb = new TodoFakeDao();
	    $uc = new DeleteTodo(array('id' => '1'), $fakedb);
		$uc->performAction();
	    $this->assertSame(0, $fakedb->getSize());
	}
	
}