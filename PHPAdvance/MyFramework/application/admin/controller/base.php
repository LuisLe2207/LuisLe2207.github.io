<?php 
	class Admin_Controller_Base extends MyFramework_Controller 
	{
		public $allowAccessAction = array();
		public function __construct() {
			parent::__construct();
			$this->view->init($this->getParentDir(dirname(__FILE__)));
			$this->view->assign('resourceUrl', MyFrameworkBase::$resourceUrl);
            $this->view->assign('baseUrl', MyFrameworkBase::$baseUrl);
		}

		public function init() {
			session_start();
			$this->authentication();
		}
		/**
		  * Check user is logged in or not
		  *@return boolean
		*/
		private function authentication() {
			if (in_array(MyFrameworkBase::$action, $this->allowAccessAction)) {
				return true;
			}
			// If user is logged in
			if (MyFrameWork_User::logged()) {
				// If user is an admin
				if ($this->authorization()) {
					return true;
				} else {
					// If user is a customer
					$this->redirect(MyFrameworkBase::$baseUrl . '/../');
				}
			} else {
				// If user is logout
				$this->redirect(MyFrameworkBase::$baseUrl . '/login');
				return false;
			}
		} 
		/**
		  * Check user is admin or customer
		  *@return boolean
		*/
		private function authorization() {
			$user = User::model()->get('id = :id', array(':id' => MyFrameWork_User::getID()));
			if ($user->role == 1) {
				return true;
			}
			return false;
		}
	}
