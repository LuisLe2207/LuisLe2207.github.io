<?php 
	class MyFramework_Validator_Required extends MyFramework_Validator_Base 
	{
		public function validate(){
	        if(!isset($this->value) || null == $this->value || trim($this->value) == '')
	            $this->setError($this->config['label'] . ' is required.');
	        if (mb_strlen($this->value) < strlen($this->value)) {
	        	$this->setError('Please enter the "' . $this->config['label'] . '" with half size alphanumeric characters');
	        }
	    }
	}