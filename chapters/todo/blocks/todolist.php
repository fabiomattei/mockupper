<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class TodoList extends BaseBlock {
	
	function __construct($todoDao) {
		$this->todoDao = $todoDao;
	}
	
    function show() {
		$alltodos = $this->todoDao->getAll();
		# showing the results
		$out = '';
		while($row = $alltodos->fetch()) {
		    $out .= htmlspecialchars($row->id).' '.htmlspecialchars($row->title).' '.htmlspecialchars($row->body).'</br>';
		}
		return $out;
    }
}
	
?>