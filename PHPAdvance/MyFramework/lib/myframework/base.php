<?php
	class MyFrameworkBase
	{
		public static $module;
		public static $controller;
		public static $action;
		public static $param;
		public static $config;
		public static $baseUrl;
		public static $resourceUrl;

		/**
		  *@param 
		*/
		public function __construct($config) {
			MyFrameworkBase::$config = $config;
			MyFrameworkBase::$baseUrl = $this->getBaseUrl();
			MyFrameworkBase::$resourceUrl = MyFrameworkBase::$baseUrl . '/' . MyFrameworkBase::$config['resourceFolder'];
			spl_autoload_register('self::autoLoad');
		}
		/**
		  * Get current module url
		  *@param url string
		*/
		public function getBaseUrl() {
			$currentPath = $_SERVER['PHP_SELF'];
			$pathInfo = pathinfo($currentPath);
			$hostName = $_SERVER['HTTP_HOST'];
			$protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https://' ? 'https://' : 'http://';
			return $protocol . $hostName . ($pathInfo['dirname'] != '/' ? $pathInfo['dirname'] : '');
		}
		/**
		  * Auto import class
		  *@param $class string
		*/
		public function autoLoad($class) {
			$file = strtolower(str_replace('_', MyFrameworkBase::$config['ds'], $class) . '.php');
			if (file_exists('application' . MyFrameworkBase::$config['ds'] . $file)) {
				include_once 'application' . MyFrameworkBase::$config['ds'] . $file;
			} elseif (file_exists('lib' . MyFrameworkBase::$config['ds'] . $file)) {
				include_once 'lib' . MyFrameworkBase::$config['ds'] . $file;
			} elseif (file_exists('model' . MyFrameworkBase::$config['ds'] . $file)) {
				include_once 'model' . MyFrameworkBase::$config['ds'] . $file;
			} elseif (file_exists($file)) {
				include_once $file;
			}
		}
		// Get current module, controller, action
		public function run() {
			$module = MyFrameworkBase::$config['defaultModule'];
			$controller = MyFrameworkBase::$config['defaultController'];
			$action = MyFrameworkBase::$config['defaultAction'];
			$param = array();
			if (isset($_GET['router'])) {
				$routers = strtolower(rtrim($_GET['router'], '/\\'));
				unset($_GET['router']);
				foreach (MyFrameworkBase::$config['routers'] as $key => $value) {
					$key = str_replace('/', '\/', $key);
					if (preg_match('/^' . $key . '/', $routers, $match)) {
						$routers = str_replace($match[0], $value, $routers);
						break;
					}
					if ($routers == $value) {
						$routers = 'index/error';
						$param['code'] = '404';
						$param['message'] = 'Request not found!';
						break;
					}
				}
				$routers = explode('/', $routers);
				if ($routers[0] != '' && is_dir('application'
				 . MyFrameworkBase::$config['ds']
				 . str_replace('-', '', $routers[0]))) {
					$module = str_replace('-', '', $routers[0]);
					array_shift($routers);
				}
				if (isset($routers[0])) {
					$filePath = 'application' 
					. MyFrameworkBase::$config['ds'] 
					. strtolower($module) 
					. MyFrameworkBase::$config['ds'] 
					. 'controller' 
					. MyFrameworkBase::$config['ds'] 
					. str_replace('-','',$routers[0]) . '.php';
					if (file_exists($filePath)) {
						$controller = str_replace('-', '', $routers[0]);
						array_shift($routers);
					}
				}
				if (isset($routers[0])) {
					$class = ucfirst($module) . '_Controller_' . ucfirst($controller);
					if (method_exists($class, str_replace('-', '', $routers[0])) || $routers[0] == 'error') {
						$action = str_replace('-', '', $routers[0]);
						array_shift($routers);
					}
				}
				if (isset($routers[0])) {
					$param = $routers;
				}
			}
			MyFrameworkBase::$module = $module;
			MyFrameworkBase::$controller = $controller;
			MyFrameworkBase::$action = $action;
			MyFrameworkBase::$param = $param;
			if ($module != MyFrameworkBase::$config['defaultModule']) {
				MyFrameworkBase::$baseUrl .= '/' . $module; 
			}
			$class = ucfirst($module) . '_Controller_' . ucfirst($controller);
			$controller = new $class();
			if (method_exists($controller, 'init')) {
				$controller->init();
			}
			$controller->$action($param);
		}

		public static function app($config) {
			return new self($config);
		}
	}