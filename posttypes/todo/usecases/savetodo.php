<?php

require_once APP_ROOT.'system/libs/gump/gump.class.php';

class SaveTodo {

	function __construct($formdata, $todoDao) { // $formdata = $_POST
		$this->todoDao = $todoDao;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'id'    => 'required|numeric',
		    'title' => 'required|max_len,250|min_len,4',
		));

		$this->gump->filter_rules(array(
		    'id'    => 'trim',
		    'title' => 'trim',
		    'body'  => 'trim'
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() { 
		if($this->validated_data === false) {

			$this->dataValidated = false;
			$this->readableErrors = $this->gump->get_readable_errors(true);

		} else {
			
			$this->dataValidated = true;

			if ($this->validated_data['id'] == 0) {
				$this->todoDao->insert($this->validated_data['title'], 
					$this->validated_data['body']);
			} else {
				$this->todoDao->update($this->validated_data['id'], 
					$this->validated_data['title'], 
					$this->validated_data['body']);
			}
		}
	}
	
	public function getDataValidated() {
		return $this->dataValidated;
	}
	
	public function getReadableErrors() {
		return $this->readableErrors;
	}
}
