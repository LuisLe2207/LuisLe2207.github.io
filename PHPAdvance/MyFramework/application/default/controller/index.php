<?php 
	class Default_Controller_Index extends Default_Controller_Base {

		public function index() { 
			$this->view->display('main.tpl');
		}

		public function error($param = null) {

		}
	}