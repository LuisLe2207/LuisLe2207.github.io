<?php 
	class User extends MyFramework_Model
	{
		public function __construct($scenario = null) {
			$this->scenario = $scenario;
			parent::__construct('users');
		}
		/**
		  * Check login
		  *@return boolean
		*/
		public function login() {
			if (isset($this->username) && isset($this->password)) {
				$user = $this->get('username = :username', array(':username' => $this->username));
				if ($user && isset($user->username) && isset($user->password)) {
					MyFramework_User::setID($user->id);
					MyFramework_User::setInfo($user);
					return true;
				}
			}
			return false;
		}
		// Map fields in table with model's attrs
		public function maps() {
			return array(
				'user_id' => array('user_id'),
				'username' => array('username'),
				'password' => array('password'),
				'roles' => array('roles')
				);
		}
		// Set rules for model attr
		public function rules() {
			return array(
				array('username, password', 'required')
				);
		}
		// Set lable for model attr
		public function lables() {
			return array(
				'username' => 'Tên đăng nhập',
				'password' => 'Mật khẩu'
				);
		}
	}