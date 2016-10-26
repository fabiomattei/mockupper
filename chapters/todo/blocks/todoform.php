<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class TodoForm extends BaseBlock {
	
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
	
	function setIdTitleAndBody($id, $title, $body) {
		$this->id    = $id;
		$this->title = $title;
		$this->body  = $body;
	}
	
	function setMessage($message) {
		$this->message = $message;
	}
	
    function show() {
		$out = '<Form name="'.$this->formname.'" method="post" action="'.$this->action.'">';
		if (isset($this->message) AND $this->message != '') {
			$out .= $out.'<br />'.$this->message.'<br />';
		}
       $out .= '<input name="title" value="'.$this->title.'" /><br/>
       <textarea name="body">'.$this->body.'</textarea><br/>
	   <input type="hidden" name="id" value="'.$this->id.'" />
       <input type="submit" value="Save" />
    </Form>'; 
		return $out;
    }
}
	
?>