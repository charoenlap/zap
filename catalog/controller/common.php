<?php 
	class CommonController extends Controller {
	    public function header($data=array()) {
			$data['menu'] = $this->model('master')->getMenu();
	    	$this->render('common/header',$data);
	    }
	    public function footer($data=array()){
			$data['menu'] = $this->model('master')->getMenu();
	    	$this->render('common/footer',$data);
		}
	}
?>