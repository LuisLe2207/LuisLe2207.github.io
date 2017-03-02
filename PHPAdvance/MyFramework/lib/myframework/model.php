<?php
	class MyFramework_Model extends MyFramework_Database 
	{

		public $scenario;
	    private $tableAlias = '';
	    public $errors = array();
	    public $rules;
	    public function __construct($table = null) {
	        $this->rules = $this->rules();
	        parent::__construct($table);
	    }
	     
	    public function __get($name) {
	        return isset($this->$name) ? $this->$name : null;
	    }
	    public function __set($name, $value) {
	        $this->$name = $value;
	    }
	    // return the onject of current class 
	    public static function model() {
	        return new static;
	    }
	    // Get model rules
	    public function rules() {
	        return array();
	    }
	    // Get model laybel 
	    public function getLabel($attr) {
	        return isset($this->maps[$attr]['label']) ? 
	        $this->maps[$attr]['label'] : ucwords(str_replace('_', ' ', $attr));
	    }
	    // Get model error 
	    public function getError($attr) {
	        return isset($this->errors[$attr]) ? $this->errors[$attr] : null;
	    }
	    /** 
	      * Load data into model
	      *@param $data array or object
	    */
		public function load($data) {
	        if($data != null){
	            if(is_array($data)){
	                foreach($data as $key => $value){
	                    $this->$key = trim(htmlentities($value));
	                }
	            } else{
	                $data = get_object_vars($data);
	                foreach($data as $key => $value){
	                    $this->$key = htmlentities($value);
	                }
	            }
	        }
	    }
	    // Validate data when load into model
	    public function validate(){
	        $this->errors = array();
	        if(count($this->rules) > 0){
	            foreach($this->rules as $rule){
	                $attrs = explode(',', array_shift($rule));
	                $validators = explode(',', array_shift($rule));
	                $skipError = isset($rule['allowEmpty']) ? true : false;
	                if(isset($rule['on']))
	                    if($this->scenario != $rule['on'])
	                        continue;
	                    else
	                        $skipError = true;
	                         
	                foreach($validators as $validator){
	                    $validator = 'MyFramework_Validator_' . ucfirst(trim($validator)); 
	                    if(class_exists($validator, true)){
	                        foreach($attrs as $attr){
	                            $attr = trim($attr);
	                            if($skipError)
	                                unset($this->errors[$attr]);
	                            $rule['label'] = $this->getLabel($attr);
	                            $validator = new $validator($attr, $this->$attr, $rule);
	                            if(!$validator->beforeValidator()){
	                                $validator->validate();
	                            }
	                            $this->errors = array_merge($this->errors, $validator->errors);
	                        }
	                    }else{
	                        $this->errors['validator'][] = 'No exists validator type with name "'. $method .'"';
	                    }
	                }
	            }
	        }
	        return count($this->errors) == 0 ? true : false;
	    }
	}