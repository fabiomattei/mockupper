<?php

require_once APP_ROOT.'system/libs/gump/gump.class.php';

class DeleteTodo {
	
	function __construct($formdata, $todoDao) {
		$this->todoDao = $todoDao;
		$this->dataValidated = false;
		$this->readableErrors = '';

		$this->gump = new GUMP();

		$this->formdata = $this->gump->sanitize($formdata);

		$this->gump->validation_rules(array(
		    'id'    => 'required|numeric'
		));

		$this->gump->filter_rules(array(
		    'id'    => 'trim'
		));

		$this->validated_data = $this->gump->run($this->formdata);
	}
	
	function performAction() {
		if($this->validated_data === false) {
			// not giving feedback
			throw new GeneralException('General malfuction!!!');
		} else {
			
			$this->dataValidated = true;
			
			$this->todoDao->delete($this->validated_data['id']);
		}
	}
}
