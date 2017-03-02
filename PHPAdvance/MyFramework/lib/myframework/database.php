<?php 
	class MyFramework_Database
	{
		private $table;
		private $conn;
		private $query;
		private $maps;

		public function __construct($table = null) {
			$this->connect();
			$this->maps = $this->maps();
			$this->table = $table;
		}

		public function __destruct() {
			$this->conn = null;
		}
		// Create connection to database
		public function connect() {
			try {
				$this->conn = new PDO(
					MyFrameworkBase::$config['db']['connectionString'],
					MyFrameworkBase::$config['db']['username'],
					MyFrameworkBase::$config['db']['pass']
					);
				$this->conn->setAttribute(
                	PDO::ATTR_ERRMODE,
                	PDO::ERRMODE_EXCEPTION
            		);
				$this->conn->exec("SET character_set_results=utf8");
				$this->conn->query("SET NAMES utf8");


			} catch (PDOException $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception('No connect to database!');
			}
			return $this->conn;
		}
		/**
		  * Get all record in table
		  *@param  $condition string
		  *@param  $param
		  *@return array of records
		*/
		public function getAll($condition = null, $param = null) {
			try {
				if ($this->table) {
					$query = 'SELECT * FROM ' . $this->table;
					if ($condition) {
						$query .= ' WHERE ' . $condition;
					}	
					$result = $this->conn->prepare($query);
					$result->execute($param);
					return $result->fetchAll(PDO::FETCH_OBJ);
				} else {
					throw new Exception('Table not found!');
					return false;
					
				}
			} catch (PDOException $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception('Wrong SQL Query');
				return false;
				
			}
		}
		/**
		  * Get one record in table
		  *@param  $condition string
		  *@param  $param
		  *@return record
		*/
		public function get($condition = null, $param = null) {
			try {
				if ($this->table) {
					$query = 'SELECT * FROM ' . $this->table;
					if ($condition) {
						$query .= ' WHERE ' . $condition;
					}
					$result = $this->conn->prepare($query);
					$result->execute($param);
					return $result->fetch(PDO::FETCH_OBJ);
				} else {
					throw new Exception('Table not found!');
					return false;
					
				}
			} catch (PDOException $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception('Wrong SQL Query');
				return false;
			}
		}
		/** 
		  *	Insert new record to table
		  * @return boolean
		*/
		public function insert() {
			try {
				$query = 'INSERT INTO '. $this->table . '(';
		        $param = array();
		        $values = '';
		        foreach($this->maps as $key => $value){
		            $query .= $value[0] . ', ';
		            $values .= ':' . $value[0] . ', ';
		            $param[':' . $value[0]] = $this->$key;
		        }
		        $query = substr($query, 0, strlen($query) - 2);
		        $values = substr($values, 0, strlen($values) - 2);
		        $query .= ')values(' . $values . ')';
		        $result = $this->conn->prepare($query);
		        return $result->execute($param);
			} catch (PDOException $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception('Wrong SQL Query');
				
			}
		}
		/**
		  * Update record in table
		  *@param  $condition string
		  *@return $param
		*/
		public function update($condition = null){
			try {
				$param = array();
		        $values = '';
		        $query = 'update ' . $this->table . ' set ';
		        foreach($this->maps as $key => $value){
		            if($this->$key !== null && strpos($key, 'id') === false){
		                $query .= $value[0] . '=:' . $value[0] . ',';
		                $param[':' . $value[0]] = $this->$key;
		            }
		        }
		        $query = substr($query, 0, strlen($query) - 1);
		        if($condition){
		            $query .= ' where ' . $condition;
		        }
		        $sth = $this->conn->prepare($query);
		        return $sth->execute($param);
			} catch (PDOException $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception('Wrong SQL Query');
			}
	        
	    }
	    /**
		  * Delete record in table
		  *@param  $condition string
		  *@return $param
		*/
	    public function delete($condition = null) {
	    	try {
	    		$query = 'DELETE FROM ' . $this->table;
		    	if ($condition) {
		    		$query .= ' WHERE ' . $condition;
		    	}
		    	$result = $this->conn->prepare($query);
		    	return $result->execute();
	    	} catch (PDOException $e) {
	    		MyFramework_Log::write($e->getMessage());
	    		throw new Exception('Wrong SQL Query');
	    	}
	    }

	}