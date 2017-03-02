<?php
	return array(
		// 
		'basepath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'ds' => DIRECTORY_SEPARATOR,
		'resourceFolder' => 'public',
		'name' => 'My Framework',
		'defaultModule' => 'Default',
		'defaultController' => 'Index',
		'defaultAction' => 'index',
		'defaultTemplate' => 'main',
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=bookstore;charset=utf8',
			'emulatePrepare' => true,
			'username' => 'root',
			'pass' => '',
			'charset' => 'utf8'
			),
		'routers' => array(
			'tin-tuc' => 'news'
			),
		);