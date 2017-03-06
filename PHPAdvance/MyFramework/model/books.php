<?php 
	class Books extends MyFramework_Model
	{
		 public function __construct($scenario = null) {
	        $this->scenario = $scenario;
	        parent::__construct('book');
	    }
	    // Map fields in table with model's attrs
	    public function maps(){
	        return array(
	            'book_id' => array('book_id'),
	            'book_title' => array('book_title'),
	            'book_author' => array('book_author')
	        );
	    }
	    // Set rules for model attr
	    public function rules(){
	        return array(
	            array('book_title, book_author', 'required'),
	            array('book_title', 'string', 'maxLength' => 150),
	            array('book_author', 'string', 'maxLength' => 50),
	            array('book_title, book_author', 'string', 'minLength' => 2)
	        );
	    }
	    // Set lable for model attr
		public function lables() {
			return array(
				'book_title' => 'Tên sách',
				'book_author' => 'Tên tác giả'
				);
		}
	}