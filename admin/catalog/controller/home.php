<?php 
	class HomeController extends Controller {
	    public function index() {
	    	if(method_post()){
	    		$data = $_POST;
	    		$select = array(
	    			'username' => $data['username'],
	    			'password' => $data['password'],
	    		);
	    		$result = $this->model('user')->check($select);
	    		if($result){
	    			$this->setSession('user_id',$result['result']['id']);
	    			
	    			$this->setSession('user_name',$result['result']['name']);
	    			$this->redirect('content');
	    		}else{
	    			$this->redirect('home&result=fail');
	    		}
	    	}else{
	    		$data = array();
	    		$data['action'] = route('home');
	    		$this->render('home',$data);
	    	}
	    }
	}
?>