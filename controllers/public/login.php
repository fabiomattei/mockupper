<?php

public_aggregator();

class Public__Login extends PublicAggregator {
	
	public function getRequest() {
		$error = '';
		
		if ( isset( $this->parameters[0] )  AND $this->parameters[0] != '' ) {
			$error = 'error';
		}
		
		block( 'user', 'loginform' );
		
		$this->title            = 'Risk Register :: Access page';
		$this->centralcontainer = array( new LoginForm( $error ) );
		// 								 new PublicButtons() );
		$this->templateFile     = 'login';
	}
	
	public function postRequest() {
		usecase( 'user', 'usercanlogin' );
		$dao = dao_exp( 'user', 'UserDao' );

		$usecase = new UserCanLogIn($_POST, $dao);
		$usecase->performAction();

		if ($usecase->getUserCanLogIn() == 1) {
			$user = $dao->getOneByFields( array( 'usr_username' => $usecase->getUsername() ) );

			$_SESSION['email']      = '';  // TODO add to database and implement
			$_SESSION['user_id']    = $user->usr_id;
			$_SESSION['username']   = $usecase->getUsername();

			$_SESSION['logged_in']  = true;

		    $_SESSION['ip']         = $_SERVER['REMOTE_ADDR'];
		    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['last_login'] = time();
			$_SESSION['office']     = 'manager'; // used for calculating urls
			$_SESSION['office_id']  = $user->usr_usrofid;
			$_SESSION['site_id']    = 1;
				
			$_SESSION['usr_type'] = 'todelete';

			if ( APPTESTMODE != 'on' ) {
				header('Location: '.BASEPATH.'manager/dashboard.html');
				die();
			}
			
		} else {
			header('Location: ' . BASEPATH . 'public/login.html');
			die();
		}
	}
	
}
