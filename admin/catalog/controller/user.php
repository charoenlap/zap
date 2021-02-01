<?php 
	class UserController extends Controller {
	    public function index() {
	    	$data = array();
	    	$data['list_user'] = $this->listall(1);
	    	$this->view('user/user',$data);
	    }
	    public function listall($type=0) {
	    	$user = $this->model('user');
	    	$result = $user->listall();
	    	return $this->json($result,$type);
	    }
	    public function add(){

	    }
	    public function userEdit(){
	    	$this->view('user/userEdit');
	    }
	    public function userView(){
	    	$this->view('user/userView');
	    }
	    public function delete(){
	    	
	    }
	    public function checkUser(){
	    	$result = false;
	    	$user_id = $this->getSession('user_id');
	    	$user_name = $this->getSession('user_name');
	    	if(!empty($user_id) AND !empty($user_name)){
	    		$result = true;
	    	}
	    	if(!$result){
	    		$this->redirect('home');
	    	}
	    }
	}
?>