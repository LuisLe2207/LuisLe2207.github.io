<?php 
	class MyFramework_Session implements SessionHandlerInterface
	{
		private $link;

		/**
		  * Connect to database
		  * @param string $savepath
		  * @param string $sessionName
		  * @return boolean
		*/
		public function open($savePath, $sessionName) {
			try {
				$link = mysqli_connect("localhost", "root", "", "bookstore");
				if ($link) {
					$this->link = $link;
					return true;
				}
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}	
		}

		/** 
		  * Close database
		  * @return boolean
		*/
		public function close() {
			try {
				mysqli_close($this->link);
				return true;
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}
			
		}
		/**
		  * @param string $sessionID read session value with session id input
		  * @return string session data
		*/
		public function read($sessionID) {
			try {
				$query = "SELECT Session_Data FROM session WHERE Session_ID = '".$sessionID."' AND Session_Expires > '".date('Y-m-d H:i:s')."'";
				$result = mysqli_query($this->link, $query);
				if ($row = mysqli_fetch_assoc($result)) {
					return $row['Session_Data'];
				} else {
					return "";
				}
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}
			
		}
		/**
		  * Create session with id and data
		  * @param string $sessionID 
		  * @param string $sessionData
		  * @return boolean 
		*/
		public function write($sessionID, $sessionData) {
			try {
				$expriesDate = date('Y-m-d H:i:s');
				$newExpiresDate = date('Y-m-d H:i:s', strtotime($expriesDate.' + 1hour'));
				$query = "REPLACE INTO session SET Session_ID = '".$sessionID."', Session_Expires = '".$newExpiresDate."', Session_Data = '".$sessionData."'";
				$result = mysqli_query($this->link, $query);
				if ($result) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}
			
		}
		/**
		  * Delete session with input id
		  * @param string $sessionID 
		  * @return boolean 
		*/
		public function destroy($sessionID) {
			try {
				$query = "DELETE FROM session WHERE Session_ID = '".$sessionID."'";
				$result = mysqli_query($this->link, $query);
				if ($result) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}	
		}
		/**
		  * Delete old session data
		  * @param int $maxLifeTime 
		  * @return boolean 
		*/
		public function gc($maxLifeTime) {
			try {
				$query = "DELETE FROM session WHERE ((UNIX_TIMESTAMP(Session_Expires)
			 			  + ".$maxLifeTime.") < ".$maxLifeTime.")";
				$query = mysqli_query($this->link, $query);
				if ($result) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				MyFramework_Log::write($e->getMessage());
				throw new Exception($e->getMessage());
			}
			
		}
	}