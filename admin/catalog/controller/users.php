<?php 
    class UsersController extends Controller {
        public function index(){
            $data = array();
            $user = $this->model('user');
            $data['users'] = $user->listall();
            $this->view('user/user',$data);
        }
        public function userView(){
        	$data = array();
        	$id = $_GET['id'];
        	$user = $this->model('user');
        	$data['users'] = $user->get($id);
        	$this->view('user/userView',$data);
        }
        public function userEdit(){
        	$id = $_GET['id'];
        	if (method_post()) {
        		$input = array(
        			'id'		=> $id,
        			'username'	=> $_POST['username'],
        			'password' 	=> $_POST['password'],
        			'name'		=> $_POST['name'],
        			'lname'		=> $_POST['lname']
        		);
        		$users = $this->model('user');
        		$result = $users->edit($input);
        		redirect('users');
        	}
    		$data = array();
    		$user = $this->model('user');
    		$data['users'] = $user->get($id);
        	$this->view('user/userEdit',$data);
        }
        public function userAdd(){
        	if (method_post()) {
        		$input = array(
        			'username'	=> $_POST['username'],
        			'password'	=> md5($_POST['password']),
        			'name'		=> $_POST['name'],
        			'lname'		=> $_POST['lname']
        		);
        		$user = $this->model('user');
        		$result = $user->add($input);
        		redirect('users');
        	}
        	$this->view('user/userAdd');
        }
        public function logout(){
            $this->view('user/logout');
            session_destroy();
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            $this->redirect('home');
        }
        public function userProfile(){
            $id = get('id');
            if (method_post()) {
                $input = array(
                    'id'        => $id,
                    'username'  => $_POST['username'],
                    'password'  => $_POST['password'],
                    'name'      => $_POST['name'],
                    'lname'     => $_POST['lname']
                );
                $users = $this->model('user');
                $result = $users->edit($input);
            }
            $data = array();
            $user = $this->model('user');
            $data['users'] = $user->get($id);
            $this->view('user/userProfile',$data);
        }
    }
?>