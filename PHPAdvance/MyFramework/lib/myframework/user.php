<?php 
	class MyFramework_User
	{
		public static $info;
		/**
		  * Set User ID
		  *@param $id 
		*/
		public static function setID($id) {
			$_SESSION['MyFramwork_User_ID'] = $id; 
		}
		/** 
		  * Get User ID
		  *@return User ID
		*/
		public static function getID() {
			return $_SESSION['MyFramwork_User_ID'];
		}
		/**
		  * Set User Info
		  *@param $info object
		*/
		public static function setInfo($info) {
			$_SESSION['MyFramework_User_Info'] = $info;
		}
		/** 
		  * Get User Info
		  *@return User Info
		*/
		public static function getInfo() {
			return $_SESSION['MyFramework_User_Info'];
		}
		/** 
		  * Check user is logged in
		  *@return boolean
		*/
		public static function logged() {
			if (isset($_SESSION['MyFramwork_User_ID'])) {
				return true;
			}
			return false;
		}
		/** 
		  * Check user is logout
		  *@return boolean
		*/
		public static function logout() {
			if (isset($_SESSION['MyFramework_User_ID'])) {
				return false;
			}
			return true;
		}
	}