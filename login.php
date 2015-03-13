<?php
	
define('APP_ROOT', '');

require_once APP_ROOT.'settings.php';
require_once APP_ROOT.'core/database/userdao.php';
require_once APP_ROOT.'core/usecases/user/usercanlogin.php';

$dao = new UserDao();

$usecase = new UserCanLogIn($_POST, $dao);
$usecase->performAction();

if ($usecase->getUserCanLogIn() == 1) {
	$user = $dao->getOneByFields(array('user_email' => $usecase->getEmail()));
	
	$role = 'viewer';
	switch ($user->user_type) {
	    case 1: $role = 'organizationmember'; break;
	    case 2: $role = 'analyst'; break;
	}
	
	session_start();
	
	$_SESSION['email']           = $usecase->getEmail();
	$_SESSION['user_id']         = $user->user_id;
	$_SESSION['username']        = $user->user_name;
	$_SESSION['organization_id'] = $user->user_or_id;
	$_SESSION['administrator']   = ($user->user_administrator == 1 ? true : false);
	$_SESSION['role']   		 = $role;
	$_SESSION['logged_in']       = true;

    $_SESSION['ip']              = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent']      = $_SERVER['HTTP_USER_AGENT'];
	$_SESSION['last_login']      = time();
	
	switch ($user->user_type) {
	    case 1: header('Location: '.BASEPATH.'aggregators/adm/index'); die(); break;
	    case 2: header('Location: '.BASEPATH.'aggregators/rampagent/index'); die(); break;
	}
	
	die();
} else {
	header('Location: '.BASEPATH.'access/login?error=on');
	die();
}


?>