<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class TodoAdministrationList extends BaseBlock {
	
	function __construct($editscript, $deletescript, $todoDao) {
		$this->editscript   = $editscript;
		$this->deletescript = $deletescript;
		$this->todoDao = $todoDao;
	}
	
    function show() {
		$this->alltodos = $this->todoDao->getAll();
		require APP_ROOT.'presentation/blocks/todos/templates/adminlist.php';
    }
}
	
?>