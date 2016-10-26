<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class TodoDelForm extends BaseBlock {
	
	function __construct($formname, $action, $id, $todoDao) {
	    $this->formname  = $formname;
		$this->action    = $action;
		$this->id        = $id;
        $this->todoDao = $todoDao;
		if ($this->id > 0) {
			$alltodos = $this->todoDao->getById($this->id);
			if($row = $alltodos->fetch()) {
			    $this->title = htmlspecialchars($row->title);
				$this->body  = htmlspecialchars($row->body);
				$this->id    = htmlspecialchars($row->id);
			}
		} else {
		    $this->title = '';
			$this->body  = '';
			$this->id    = 0;
		}
	}
	
    function show() {
		$out = '<Form name="'.$this->formname.'" method="post" action="'.$this->action.'">';
        $out .= '<input type="hidden" name="id" value="'.$this->id.'" />
       <input type="submit" value="Delete" />
    </Form>'; 
		return $out;
    }
}
	
?>