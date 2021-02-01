<?php 
	class ContactController extends Controller {
	    public function index() {
	    	$data = array();
			if(method_post()){
				$data = $_POST;
				$result = $this->model('master')->contact($data);
				$this->redirect('contact&result=success');
			}else{
				$data['title'] = "zappvariety - ติดต่อเรา";
				$data['action'] = route('contact');
				$data['result'] = get('result');
				$this->view('contact',$data);
			}
	    }
	}
?>