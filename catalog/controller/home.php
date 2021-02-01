<?php 
	class HomeController extends Controller {
	    public function index() {
	    	$data = array();
			$data['title'] = "Zappvariety - Home";
			$data['lasted'] = $this->model('master')->getLated();

			$menu = $data['menu'] = $this->model('master')->getMenu();
			$data['menu'] = $menu;
			foreach($menu AS $val){
				$id=$val['id'];
				$where = array(
					'where' => " LIMIT 1,12"
				);
				$data['content_'.$id] = $this->model('master')->getCat($id,$where);
				$data['content_topic_'.$id] = $this->model('master')->getTitle($id)['title'];

				// getone
				$data['content_one_'.$id] = $this->model('master')->getOne($id);

				// content 2 limit 2
				$wherelimit2 = array(
					'where' => " LIMIT 1,2"
				);
				$data['content_limit2_'.$id] = $this->model('master')->getcatlimit2($id,$wherelimit2);

				$wherelimit3 = array(
					'where' => " LIMIT 0,3"
				);
				$data['content_limit3_'.$id] = $this->model('master')->getcatlimit3($id,$wherelimit3);
			}
			

			$data['related'] = $this->model('master')->getCat(11);
			// $data['related'] = $this->model('master')->getRelated($id);
			$data['advertising_1'] = $this->model('master')->getad(1);
			$data['advertising_2'] = $this->model('master')->getad(5);
			$data['advertising_3'] = $this->model('master')->getad(6);
			$data['advertising_once'] = $this->model('master')->getadOnce();
 	    	$this->view('home',$data);
	    }
	}
?>