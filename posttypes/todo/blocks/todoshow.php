<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class TodoShow extends BaseBlock {
	
	function __construct($id, $todoDao) {
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
        $out = 'Title: '.$this->title.'<br /><br />'.$this->body; 
		return $out;
    }
}
	
?>