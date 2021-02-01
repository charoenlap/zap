<?php 
	class VideoController extends Controller {
	    public function index() {
            $data = array();
            $id = get('id');
            $data['title'] = "zappvariety -  วีดีโอ";
            $data['vdo'] = $this->model('master')->getCat(11);
            $data['menu'] = $this->model('master')->getMenu();
 	    	$this->view('video',$data);
        }
        public function video_detail(){
            $data = array();
            $id = (int)get('id');
            // var_dump($_GET);
            if($id){
                // $data['title'] = "zappvariety - รายละเอียดวีดีโอ";
                $data['content'] = $this->model('master')->get($id);
                $data['related'] = $this->model('master')->getRelated($id);
                $data['topic'] = $this->model('master')->getTopic($id)['title'];
                $data['title'] = "Zappvariety-".$data['topic'];
                $this->view('video_detail',$data);
            }else{
                $this->view('not_found',$data);
            }
        }
	}
?>