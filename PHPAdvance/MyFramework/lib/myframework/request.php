<?php 
	class MyFramework_Request
	{
		/**
		  * Get param from request method: GET
		  *@param $name string
		  *@return 
		*/
		public static function get($name) {
			return isset($_GET[$name]) ? $_GET[$name] : null;
		}
		/**
		  * Get param from request method: POST
		  *@param $name string
		  *@return 
		*/
		public static function post($name) {
			return isset($_POST[$name]) ? $_POST[$name] : null;
		}
	}