<?php
	require_once('lib/myframework/smarty/Smarty.class.php');
	class MyFramework_View
	{
		private $smarty;
		private $templateCDir;
		private $templateDir;

		/**
		  * Initilize some default param
		  *@param $parentDir string
		*/
		public function init($parentDir) {
			// Check $parentDir
			if (isset($parentDir)) {
				// Add template dir
				$this->templateDir = $parentDir . '/view/template';
				// Add template_c dir
				$this->templateCDir = $parentDir . '/view/template_c';
				// Create if not exist
				if (!file_exists($this->templateDir)) {
					mkdir($this->templateDir);
				}

				if (!file_exists($this->templateCDir)) {
					mkdir($this->templateCDir);
				}
				// Create new Smarty template and set template dir, compile dir
				$this->smarty = new Smarty;
				$this->smarty->setTemplateDir($this->templateDir);
	           	$this->smarty->setCompileDir($this->templateCDir);
			}
		}
		/**
		  * Assign value for smarty
		  *@param $key string
		  *@param $value
		*/
		public function assign($key, $value) {
			try {
				$this->smarty->assign($key, $value);
			} catch (Exception $e) {
				throw new Exception('Missing param');
			}	
		}
		/**
		  * Display template layout
		  *@param $tplFile string Filename
		*/
		public function display($tplFile) {
			try {
				$this->smarty->display($tplFile);
			} catch (Exception $e) {
				throw new Exception('Missing template!');
			}	
		}
	}