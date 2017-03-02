<?php 
	class Admin_Controller_Index extends Admin_Controller_Base 
    {
        public $book;
        public function init(){
            $this->allowAccessAction = array('login');
            parent::init();
            $this->book = new Books;
        }
        // Index Action
		public function index() {
            $this->view->assign('pageTitle', 'Admin');
            $this->view->assign('books', $this->book->getAll());
            $this->view->display('main.tpl');
		}

        // Login Action
        public function login(){
            // Check session of user id existance
            // If exist => user is logged in
            if (isset($_SESSION['MyFramwork_User_ID'])) {
                // Redirect to admin page
                $this->redirect(MyFrameworkBase::$baseUrl);
            } else {
                // Redirect to login page
                $this->view->assign('error', '');
                if (null != MyFramework_Request::post('User')){
                    $user = new User('login');
                    $user->load(MyFramework_Request::post('User'));
                    // Check login 
                    if($user->validate() && $user->login()){
                        // Success => admin page
                        $this->redirect(MyFrameworkBase::$baseUrl);
                        exit;
                    } else {
                        // Show error
                        $this->view->assign('error', 'Wrong username or password.');
                    }
                }
                $this->view->display('login.tpl');
            }
        }
        // Logout Action
        public function logout() {
            if (MyFramework_User::logout()) {
                session_destroy();
                $this->redirect(MyFrameworkBase::$baseUrl . '/../');
            }
        }
        // Insert Action
        public function insert() {
            $this->book->load(MyFramework_Request::post('Book'));
            if ($this->book->validate()) {
                $this->book->insert();
                echo json_encode(array('result' => '1', 'url' => MyFrameworkBase::$baseUrl));
                exit;
            } else {
                echo json_encode(array('result' => '0'));
                exit;
            }
            
        }
        // Insert Action
        public function update() {
            $params = MyFramework_Request::post('Book');
            $book_id = MyFramework_Request::post('Book')['book_id'];
            $params = MyFramework_Request::post('Book');
            $this->book->load($params);
            if ($this->book->validate()) {
                $condition = "book_id = $book_id";
                $this->book->update($condition);
                echo json_encode(array('result' => '1', 'url' => MyFrameworkBase::$baseUrl));
                exit;
            } else {
                echo json_encode(array('result' => '0', 'url' => MyFrameworkBase::$baseUrl));
                exit;
            }
            
        }
        // Delete Action
        public function delete() {
            if (null !== MyFramework_Request::post('book_id')) {
                if (MyFramework_Request::post('book_id') != '') {
                    $book_id = (MyFramework_Request::post('book_id'));
                    $condition = "book_id = $book_id";
                    $this->book->delete($condition);
                    echo json_encode(array('result' => '1', 'url' => MyFrameworkBase::$baseUrl));
                } else {
                    echo json_encode(array('result' => '0', 'url' => MyFrameworkBase::$baseUrl));
                }
            }
        }
        // Get all records
        public function getall() {
            return json_encode($this->book->getAll());
        }
	}