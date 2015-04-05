<?PHP

require_once APP_ROOT."presentation/blocks/baseblock/baseblock.php";

class LoginForm extends BaseBlock {
	
	function __construct($formname, $action) {
	    $this->formname  = $formname;
		$this->action    = $action;
	}
	
    function show() {
        return '<Form name="'.$this->formname.'" method="post" action="'.$this->action.'">
       <input type="text" name="username" value="" />
       <input type="password" name="password" value=""  />
       <input type="submit" name="login" value="Log In" />
    </Form><br/>username: hello<br/>password: hello'; 
    }
}
	
?>