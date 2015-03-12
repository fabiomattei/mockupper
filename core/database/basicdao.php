<?php
/**
* Basic class for all dao's
*/

class BasicDao {
	
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract';
    const DB_TABLE_UPDATED_FIELD_NAME = 'abstract';
    const DB_TABLE_CREATED_FLIED_NAME = 'abstract';
	
	function __construct($setting='') {
		if ($setting != 'test') { // I check that in order to avoid initialization during testing
			try {      
				$this->DBH = new PDO(DBHOST.DBNAME, DBUSERNAME, DBPASSWORD);
				$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				$logger = new Logger();
				$logger->write($e->getMessage(), __FILE__, __LINE__);
				throw new GeneralException('General malfuction!!!');
			}
		}
	}
	
	/**
	* Setter made for testing purpose
	*/
	public function setPDO($PDO) {
		$this->DBH = $PDO;
	}
	
	function getAll() {
		try {
			$STH = $this->DBH->query('SELECT * FROM '.$this::DB_TABLE);
			$STH->setFetchMode(PDO::FETCH_OBJ);
 	   
			return $STH;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
		}
	}
	
	function getById($id) {
		try {
			$STH = $this->DBH->prepare('SELECT * from '.$this::DB_TABLE.' WHERE '.$this::DB_TABLE_PK.' = :id');
			$STH->bindParam(':id', $id);
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
			$obj = $STH->fetch();
 	   
			return $obj;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function insert($fields) {
		$presentmoment = date('Y-m-d H:i:s', time());
		
		$filedslist = '';
		$filedsarguments = '';
		foreach ($fields as $key => $value) {
			$filedslist .= $key.', ';
			$filedsarguments .= ':'.$key.', ';
		}
		$filedslist = substr($filedslist, 0, -2);
		$filedsarguments = substr($filedsarguments, 0, -2);
		try {
			$this->DBH->beginTransaction(); 
			$STH = $this->DBH->prepare('INSERT INTO '.$this::DB_TABLE.' ('.$filedslist.', '.$this::DB_TABLE_UPDATED_FIELD_NAME.', '.$this::DB_TABLE_CREATED_FLIED_NAME.') VALUES ('.$filedsarguments.', "'.$presentmoment.'", "'.$presentmoment.'")');
			foreach ($fields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
			$inserted_id = $this->DBH->lastInsertId();
			$this->DBH->commit();
			return $inserted_id;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function update($id, $fields) {
    	$presentmoment = date('Y-m-d H:i:s', time());
		
		$filedslist = '';
		foreach ($fields as $key => $value) {
			$filedslist .= $key.' = :'.$key.', ';
		}
		$filedslist = substr($filedslist, 0, -2);
		try {
			$STH = $this->DBH->prepare('UPDATE '.$this::DB_TABLE.' SET '.$filedslist.', '.$this::DB_TABLE_UPDATED_FIELD_NAME.' = "'.$presentmoment.'" WHERE '.$this::DB_TABLE_PK.' = :id');
			foreach ($fields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->bindParam(':id', $id);
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function delete($id) {
		try {
			$STH = $this->DBH->prepare('DELETE FROM '.$this::DB_TABLE.' WHERE '.$this::DB_TABLE_PK.' = :id');
			$STH->bindParam(':id', $id);
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	function deleteByFields($fields) {
		$filedslist = '';
		foreach ($fields as $key => $value) {
			$filedslist .= $key.' = :'.$key.' AND ';
		}
		$filedslist = substr($filedslist, 0, -4);
		try {
			$STH = $this->DBH->prepare('DELETE FROM '.$this::DB_TABLE.' WHERE '.$filedslist);
			foreach ($fields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	public function getByFields($conditionsfields, $requestedfields = 'none') {
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		try {
			$STH = $this->DBH->prepare('SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' WHERE '.$filedslist);
			foreach ($conditionsfields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
 	   
			return $STH;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	public function getOneByFields($conditionsfields, $requestedfields = 'none') {
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		try {
			$STH = $this->DBH->prepare('SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' WHERE '.$filedslist);
			foreach ($conditionsfields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
			$obj = $STH->fetch();
 	   
			return $obj;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	public function organizeConditionsFields($conditionsfields) {
		$filedslist = '';
		foreach ($conditionsfields as $key => $value) {
			$filedslist .= $key.' = :'.$key.' AND ';
		}
		$filedslist = substr($filedslist, 0, -4);
		return $filedslist;
	}
	
	public function organizeRequestedFields($requestedfields) {
		if (is_array($requestedfields)) {
			$requestedfieldlist = '';
			foreach ($requestedfields as $value) {
				$requestedfieldlist .= $value.', ';
			}
			$requestedfieldlist = substr($requestedfieldlist, 0, -2);
		} else {
			$requestedfieldlist = '*';
		}
		return $requestedfieldlist;
	}
	
	public function putCache($query, $key, $stuff) {
		$dirname = APP_ROOT.'cache/'.$query;
		if (!file_exists($dirname)) {
			mkdir($dirname, 0777, true);
		}
		$filename = $dirname.'/'.$key.'.data';
		file_put_contents($filename, serialize($stuff), LOCK_EX);
	}
	
	public function getCache($query, $key) {
		$filename = APP_ROOT.'cache/'.$query.'/'.$key.'.data';
		$cached = NULL;
		if (file_exists($filename) AND (time()-filemtime($filename) < 2 * 3600)) { // 2 h
			$cached = unserialize(file_get_contents($filename));
		}
		return $cached;
	}
	
}
