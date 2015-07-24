<?php

class TodoFakeDao {
	
	function __construct() {
		$this->todofaketable = array('1' => 'my todo');
	}
	
	function insert($title, $body) {
		array_push($this->todofaketable, $title);
	}
	
	function update($id, $title, $body) {
		$this->todofaketable[$id] = $title;
	}
	
	function delete($id) {
		unset($this->todofaketable["$id"]);
	}
	
	public function getSize() {
		return count($this->todofaketable);
	}
}