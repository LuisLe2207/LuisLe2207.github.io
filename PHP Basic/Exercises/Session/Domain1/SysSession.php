<?php

class SysSession implements SessionHandlerInterface
{
	private $link;

	/**
	  * Connect to database
	  * @param string $savepath
	  * @param string $sessionName
	  * @return boolean
	*/
	public function open($savePath, $sessionName) {
		$link = mysqli_connect("localhost", "root", "", "sessionDB");
		if ($link) {
			$this->link = $link;
			return true;
		} else {
			return false;
		}
	}

	/** 
	  * Close database
	  * @return boolean
	*/
	public function close() {
		mysqli_close($this->link);
		return true;
	}
	/**
	  * @param string $sessionID read session value with session id input
	  * @return string session data
	*/
	public function read($sessionID) {
		$query = "SELECT Session_Data FROM Sessions WHERE Session_ID = '".$sessionID."' AND Session_Expires > '".date('Y-m-d H:i:s')."'";
		$result = mysqli_query($this->link, $query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['Session_Data'];
		} else {
			return "";
		}
	}
	/**
	  * Create session with id and data
	  * @param string $sessionID 
	  * @param string $sessionData
	  * @return boolean 
	*/
	public function write($sessionID, $sessionData) {
		$expriesDate = date('Y-m-d H:i:s');
		$newExpiresDate = date('Y-m-d H:i:s', strtotime($expriesDate.' + 1hour'));
		$query = "REPLACE INTO Sessions SET Session_ID = '".$sessionID."', Session_Expires = '".$newExpiresDate."', Session_Data = '".$sessionData."'";
		$result = mysqli_query($this->link, $query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	/**
	  * Delete session with input id
	  * @param string $sessionID 
	  * @return boolean 
	*/
	public function destroy($sessionID) {
		$query = "DELETE FROM Sessions WHERE Session_ID = '".$sessionID."'";
		$result = mysqli_query($this->link, $query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	/**
	  * Delete old session data
	  * @param int $maxLifeTime 
	  * @return boolean 
	*/
	public function gc($maxLifeTime) {
		$query = "DELETE FROM Sessions WHERE ((UNIX_TIMESTAMP(Session_Expires)
		 + ".$maxLifeTime.") < ".$maxLifeTime.")";
		$query = mysqli_query($this->link, $query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
}

$handler = new SysSession();
session_set_save_handler($handler, true);