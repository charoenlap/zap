<?php 
	class DetailController extends Controller {
	    public function index() {
	    	$data = array();
			$id = (int)get('id');
			if($id){
				$keywords = '';
				$keyword = '';
				$master = $this->model('master');
				$data['content'] = $master->get($id);
				
				$data['related'] = $master->getRelated($id);
				$data['topic'] = $master->getTopic($id);
				$data['title_cat'] = $master->getTitle($id);
				$data['header_title'] = $data['content']['tags'];
				// var_dump($data['header_title']);
				$data['description'] = mb_strimwidth(strip_tags(html_entity_decode($data['topic']['detail'])), 0, 150, "...");
				// var_dump($data['content']);
				// $keywords = (isset($data['content']['tags'][0]['keywords'])?$data['content']['tags'][0]['keywords']:'');
				// var_dump($data['content']['result']['keyword']);
				$keywords = (isset($data['content']['result']['keyword'])?$data['content']['result']['keyword']:'');
				$data['keywords'] = strip_tags(html_entity_decode($keywords));
				if(empty($data['keywords'])){
					$data_detail = (isset($data['content']['result']['detail'])?$data['content']['result']['detail']:'');
					$detail_convert = str_replace('-','',$data_detail);
					$detail_convert = strip_tags(html_entity_decode($detail_convert));
					$detail_convert = str_replace('"','',$detail_convert);
					$detail_convert = str_replace("'",'',$detail_convert);
					$detail_convert = str_replace("“",'',$detail_convert);
					$detail_convert = str_replace("”",'',$detail_convert);
					$detail_convert = str_replace(".",'',$detail_convert);
					$detail_convert = str_replace(array("\n","\r\n","\r"), '', $detail_convert);
					$arr_detail = explode(' ',$detail_convert);
					for($i=0;$i<=5;$i++){
						if(isset($arr_detail[$i])){
							if(!empty($arr_detail[$i])){
								$keyword .= $arr_detail[$i];
								if($i<5){
									$keyword .= ',';
								}
							}
						}
					}
					$data['keywords'] = $keyword;
				}
				// var_dump($data['content']);
				// var_dump($data['topic']['title']);
				$data['title'] = $data['topic']['title'];
				// $data['title_cat'] = $data['title_cat'];
				// var_dump($data['title_cat']);
				$data['image'] = MURL."img.php?file=2,".$data['content']['img_title'].",700,700";
				$data['url'] = MURL.'index.php?route=detail&id='.$id;
				$data['img'] = $master->contentImg($id);

				// if (isset($_SESSION['views_'.$id])) {
				// 	$content_id = $id;
				// 	$data['views'] = $master->countView($content_id);
				// }


			 	// if (isset($_SESSION['view'])) {
			  //       $_SESSION['view'] = $_SESSION['view']+1;
			  //   }else{
			  //       $_SESSION['view'] = 1;
			  //   }
			  //   echo $_SESSION['view'];

				$data['countview'] = $master->getview($id);
				if(!isset($_SESSION['view_'.$id])){
				   	$countview = $master->updateView($id);
				   	$_SESSION['view_'.$id] = 1;
				}

	 	    	$this->view('detail',$data);
	 	    }else{
	 	    	$this->view('not_found',$data);
	 	    }
	    }
	}
?>