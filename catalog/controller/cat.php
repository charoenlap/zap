<?php 
	class CatController extends Controller {
	    public function index() {
	    	$data = array();
	    	$id = get('id');
			$data['title'] = "zappvariety";
			$topic = $this->model('master')->getTitle($id);
			$data['topic'] = (isset($topic['title'])?$topic['title']:'');
			$data['cat'] = $this->model('master')->getCat($id);
			$data['vdo'] = $this->model('master')->getCat(11);

			// ad
			if ($id) {
				$data['adcat'] = $this->model('master')->getadCat($id);
			}
 	    	$this->view('cat',$data);
	    }
	    public function test(){
	    	$url = 'index.php?route=cat&id=2&text=111';
	    	echo route1($url);
	    }
	}
?>