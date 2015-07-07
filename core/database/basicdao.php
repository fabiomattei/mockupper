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
	
	/**
	 * This is the basic function for one row from a table specifying the primary key
	 * of the row you want to delete.
	 * Once you created a instance of the DAO object you can do for example:
	 *
	 * $tododao->delete( 15 );
	 * this will delete the row having the primary key set to 15.
	 * 
	 * Remeber that you need to set the primary key in the tabledao.php file
	 * in a costant named DB_TABLE_PK
	 *
	 * Example:
	 * const DB_TABLE_PK = 'stp_id';
	 */
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
	
	/**
	 * This function deletes a set of row from a table depending from the
	 * parameters you set when calling it.
	 *
	 * $tododao->delete( array( 'open' => '0', 'handling' => '1' ) );
	 * this will delete the row having the field open set to 0 and the field handling set to 1.
	 * 
	 * Remeber that you need to set the table name in the tabledao.php file
	 * in a costant named DB_TABLE
	 *
	 * Example:
	 * const DB_TABLE = 'mytablename';
	 */
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
	
	/**
	 * This is the basic function for getting a set of elements from a table.
	 * Once you created a instance of the DAO object you can do for example:
	 *
	 * $tododao->getByFields( array( 'open' => '0' ) );
	 * this will get all the row having the field open = 0
	 *
	 * you can set more then a search parameter (evaluated in AND)
	 * $tododao->getByFields( array( 'open' => '0', 'handling' => '1' ) );
	 *
	 * you can even specify how to order the rows you requested
	 * $tododao->getByFields( array( 'id' => '42' ), array('name', 'description') );
	 *
	 * you can even request few specific fields and not the whole table fields
	 * $tododao->getByFields( array( 'id' => '42' ), array('name', 'description'), array('id', 'name', 'description') );
	 */	
	public function getByFields( $conditionsfields, $orderby = 'none', $requestedfields = 'none' ) {
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		$orderbyfieldlist = $this->organizeOrderByFields($orderby);
		
		try {
			// building the query
			$query = 'SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' ';
			if ( $filedslist != '' ) {
				$query .= 'WHERE '.$filedslist.' ';
			}
			$query .= $orderbyfieldlist;

			$STH = $this->DBH->prepare( $query );
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
	
	public function getByFieldList( $fieldname, $ids, $conditionsfields, $orderby = 'none', $requestedfields = 'none' ) {
		$ids_string = ' (';
		foreach ($ids as $id) {
			$ids_string .= $id.', ';
		}
		$ids_string = substr( $ids_string, 0, -2 ); // cutting out last two caracters
		$ids_string .= ') ';
		
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		$orderbyfieldlist = $this->organizeOrderByFields($orderby);
		
		try {
			// building the query
			$query = 'SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' ';
			$query .= 'WHERE '.$fieldname.' IN '.$ids_string.' ';
			if ( $filedslist != '' ) {
				$query .= 'AND '.$filedslist;
			}
			$query .= $orderbyfieldlist;

			$STH = $this->DBH->prepare( $query );
			
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
	
	/**
	 * This is the basic function for getting one element from a table.
	 * Once you created a instance of the DAO object you can do for example:
	 *
	 * $tododao->getOneByFields( array( 'id' => '42' ) );
	 * this will get the field having id = 42
	 *
	 * you can set more then a search parameter (evaluated in AND)
	 * $tododao->getOneByFields( array( 'id' => '42', 'open' => '1' ) );
	 *
	 * you can even request few specific fields and not the whole table fields
	 * $tododao->getOneByFields( array( 'id' => '42' ), array('id', 'name', 'description') );
	 */
	public function getOneByFields($conditionsfields, $requestedfields = 'none') {
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		try {
			// building the query
			$query = 'SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' ';
			if ( $filedslist != '' ) {
				$query .= 'WHERE '.$filedslist;
			}
			
			$STH = $this->DBH->prepare( $query );
			foreach ($conditionsfields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
			$obj = $STH->fetch();
			
			if ( $obj == null ) {
				$obj = $this->getEmpty();
			}
 	   
			return $obj;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	/**
	 * This is the basic function for getting an array of elements from a table.
	 * The returned array will have the entity id as index
	 * Once you created a instance of the DAO object you can do for example:
	 *
	 * $tododao->getByFields( array( 'open' => '0' ) );
	 * this will get all the row having the field open = 0
	 *
	 * you can set more then a search parameter (evaluated in AND)
	 * $tododao->getByFields( array( 'open' => '0', 'handling' => '1' ) );
	 *
	 * you can even specify how to order the rows you requested
	 * $tododao->getByFields( array( 'id' => '42' ), array('name', 'description') );
	 *
	 * you can even request few specific fields and not the whole table fields
	 * $tododao->getByFields( array( 'id' => '42' ), array('name', 'description'), array('id', 'name', 'description') );
	 */	
	public function getArrayByFields( $conditionsfields, $orderby = 'none', $requestedfields = 'none' ) {
		$filedslist = $this->organizeConditionsFields($conditionsfields);
		
		$requestedfieldlist = $this->organizeRequestedFields($requestedfields);
		
		$orderbyfieldlist = $this->organizeOrderByFields($orderby);
		
		try {
			// building the query
			$query = 'SELECT '.$requestedfieldlist.' FROM '.$this::DB_TABLE.' ';
			if ( $filedslist != '' ) {
				$query .= 'WHERE '.$filedslist.' ';
			}
			$query .= $orderbyfieldlist;

			$STH = $this->DBH->prepare( $query );
			foreach ($conditionsfields as $key => &$value) {
				$STH->bindParam($key, $value);
			}
			$STH->execute();
		
			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_OBJ);
			
			$out = array();
		    while( $item = $STH->fetch() ) {
				$id = $item->{$this::DB_TABLE_PK};
		    	$out[$id] = $item;
		    }
 	   
			return $out;
		}
		catch(PDOException $e) {
			$logger = new Logger();
			$logger->write($e->getMessage(), __FILE__, __LINE__);
			throw new GeneralException('General malfuction!!!');
		}
	}
	
	public function getEmpty() {
		return null;
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
	
	public function organizeOrderByFields($orderby) {
		if ( is_array( $orderby ) ) {
			$orderbyfields = ' ORDER BY ';
			foreach ($orderby as $value) {
				$orderbyfields .= $value.', ';
			}
			$orderbyfields = substr($orderbyfields, 0, -2);
		} else {
			$orderbyfields = '';
		}
		return $orderbyfields;
	}
	
	public function putCache($query, $key, $stuff) {
		$dirname = 'cache/'.$query;
		if (!file_exists($dirname)) {
			mkdir($dirname, 0777, true);
		}
		$filename = $dirname.'/'.$key.'.data';
		file_put_contents($filename, serialize($stuff), LOCK_EX);
	}
	
	public function getCache($query, $key) {
		$filename = 'cache/'.$query.'/'.$key.'.data';
		$cached = NULL;
		if (file_exists($filename) AND (time()-filemtime($filename) < 2 * 3600)) { // 2 h
			$cached = unserialize(file_get_contents($filename));
		}
		return $cached;
	}
	
}
