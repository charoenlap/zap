<?php  
	class AdvertisingController extends Controller {
		public function index(){
			$data = array();
			$list = $this->model('advertising');
			$data['list'] = $list->list();
			$this->view('advertising/advertising',$data);
		}
		public function delImg(){
	      $data = array();
	      $id=get('id');
	      $ad_id=get('ad_id');
	      $result_del_img = $this->model('advertising')->delImg($id);
	      $this->redirect('advertising/advertisingEdit&id='.$ad_id);
	    }
		public function advertisingAdd(){
	      $data = array();
	      if(method_post()){
	        $insert = array();
	        $data = $_POST;
	        $advertising = $this->model('advertising');
	        $result = $advertising->add($data);
	        if($result['result']=='success'){
	          $ad_id = $result['ad_id'];

	          $files = files('file');
	          if($files){
	            $sub_path = date('Y_m_d');
	            $path = 'uploads/ad/'.$sub_path;
	            if (!file_exists(DOCUMENT_ROOT.$path)) {
	              mkdir(DOCUMENT_ROOT.$path, 0775);
	            }
	            $count_img = 0;
	            foreach($files['tmp_name'] as $key => $val){
	              if(!empty($files['name'][$key])){
	                $img_name = $count_img.'_'.$files['name'][$key];
	                uploadMuntiple($files['tmp_name'][$key],DOCUMENT_ROOT.$path.'/',$img_name);
	                $count_img++;
	                $insert_data = array(
	                  'ad_id' => $ad_id,
	                  'path' => $path.'/'.$img_name,
	                  'name'  => $img_name
	                );
	                $advertising->addImg($insert_data);
	              }
	            }
	          }
	          // $this->redirect('content/contentEdit&id='.$result['content_id']);
	          $this->redirect('advertising');
	        }
	      }else{
	        $data['title'] = 'เพิ่มเนื้อหา';
	        $data['action'] = 'index.php?route=advertising/advertising';
	        $data['language'] = $this->model('language')->get()['result'];

	        $this->view('advertising/form',$data);
	      }
	    }
		public function advertisingEdit(){
	      $data = array();
	      $id = get('id');
	      if(method_post()){
	        $id = post('id');
	        $insert = array();
	        $data = $_POST;
	        $advertising = $this->model('advertising');
	        $result = $advertising->edit($data);
	        if($result['result']=='success'){

	          $files = files('file');
	          if($files){
	            $sub_path = date('Y_m_d');
	            $path = 'uploads/ad/'.$sub_path;
	            if (!file_exists(DOCUMENT_ROOT.$path)) {
	              mkdir(DOCUMENT_ROOT.$path, 0775);
	            }
	            $count_img = 0;
	            foreach($files['tmp_name'] as $key => $val){
	              $img_name = $count_img.'_'.$files['name'][$key];
	              if(!empty($files['name'][$key])){
	                uploadMuntiple($files['tmp_name'][$key],DOCUMENT_ROOT.$path.'/',$img_name);
	                $count_img++;
	                $insert_data = array(
	                  'ad_id' => $id,
	                  'path' => $path.'/'.$img_name,
	                  'name' => $img_name
	                );
	                $advertising->addImg($insert_data);
	              }
	            }
	          }
	          $this->redirect('advertising');
	        }else{
	          $this->redirect('advertising');
	        }
	      }else{
	        $data['title'] = 'แก้ไขเนื้อหา';
	        $data['action'] = 'index.php?route=advertising/advertisingEdit&id='.$id;
	        $data['id'] = $id;
	        $select = array(
	          'id' => $id
	        );

	        $advertising = $this->model('advertising')->get($select)['result'];
	        $data['files'] = $this->model('advertising')->getFiles($select)['result'];

	        $data['advertising'] = array();
	        foreach($advertising as $val){
	          $data['advertising'] = $val;
	        }
	        // $data['language'] = $language;

	        $this->view('advertising/form',$data);
	      }
	  	}
		public function advertisingDel(){
	      $data = array();
	      if(method_get()){
	        $id = (int)get('id');
	        if($id){
	          $result_delete = $this->model('advertising')->del($id);
	          if($result_delete){
	             $this->redirect('advertising');
	          }
	        }
	        // $insert = array();
	        // $data = $_POST;
	        
	        // $result = $content->add($data);
	        if($result['result']=='success'){
	          $this->redirect('advertising');
	        }
	      }else{
	        
	      }
	    }
	}
?>