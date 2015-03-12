<?php

require_once APP_ROOT."system/logger/logger.php";
require_once APP_ROOT."datastorage/basicdao.php";

class UserDao extends BasicDao {
	
	const DB_TABLE = 'users';
	const DB_TABLE_PK = 'user_id';
    const DB_TABLE_UPDATED_FIELD_NAME = 'user_updated';
    const DB_TABLE_CREATED_FLIED_NAME = 'user_created';
	
	/* Field list
		user_id;
    	user_or_id;           // foreign key to organizations->or_id
		user_administrator;   // 0 user, 1 administrator
    	user_type;            // 0 viewer, 1 organization member, 2 analyst
		user_name;
		user_surname;
    	user_email;
		user_activated;       // 0 not activated, 1 activated
		user_organization;    // written during signup process, after that has not been used anywhere
    	user_salt;
    	user_hashedpsw;
    	user_updated;
    	user_created;
    	user_password_updated;
	 */
	
	
	function checkEmailAndPassword($email, $password) {
		try {
			$STH = $this->DBH->prepare('SELECT COUNT(*) as numberrows FROM users WHERE user_email = :email AND user_hashedpsw = :user_hashedpsw AND user_activated = 1; ');
			$STH->bindParam(':email', $email, PDO::PARAM_STR);
			$STH->bindParam(':user_hashedpsw', $password, PDO::PARAM_STR);
			$STH->execute();
			return $STH->fetchColumn();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
	
	public function getSaltForEmail($email) {
		try {
			$STH = $this->DBH->prepare('SELECT user_salt from users where user_email = :email');
			$STH->bindParam(':email', $email, PDO::PARAM_STR);
			$STH->execute();
			return $STH->fetchColumn();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
	
	// ****************
	// Static section
	// ****************
	
	public static function hashpassword($password, $salt) {
        return SHA1($password.'ABrew456Aqc'.$salt);
    }
	
	public static function generatePassword($length = 8) {
        $password = "";
        $possible = "0123456789abcdfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $i = 0;
        while ($i < $length) {
            $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
        return $password;
    }
}