<?php 
	class Default_Controller_Base extends MyFramework_Controller 
	{
		public function __construct() {
			parent::__construct();
			$this->view->init($this->getParentDir(dirname(__FILE__)));
			$this->view->assign('resourceUrl', MyFrameworkBase::$resourceUrl);
            $this->view->assign('baseUrl', MyFrameworkBase::$baseUrl);
		}
	}
