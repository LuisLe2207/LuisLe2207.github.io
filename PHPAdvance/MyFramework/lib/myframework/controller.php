<?php
	class MyFramework_Controller 
	{
		public $view;
		public function __construct() {

			// Declare session DB class
			$handler = new MyFramework_Session();
			session_set_save_handler($handler, true);

			// Decalre Write Log class
			$this->log = new MyFramework_Log();

			$this->view = new MyFramework_View;
		}
		/**
		  * Get parent directory
		  *@param $url string
		  *@return string parent path 
		*/
		public function getParentDir($url) {
			$urlArray = explode("\\", $url);
			array_pop($urlArray);
			return implode('\\', $urlArray);
		}
		/**
		  * Redirect to page
		  *@param $url string
		*/
		public function redirect($url) {
			header('location:' . $url);
		}
	}