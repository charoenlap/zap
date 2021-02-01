<?php 
	class ContentModel extends db {
		public function get($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND c.id = '.(int)$data['id'];
			}
			if(isset($data['lang_id'])){
				$id_lang = $this->id_lang();
				$where .= ' AND cd.lang_id='.(int)$id_lang;
			}

			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			INNER JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."users u ON c.user_id = u.id  
			WHERE c.id <> '' ".$where." ORDER BY c.id DESC";
			$result['result'] = $this->query($sql)->rows;

			return $result;
		}
		public function delImg($id){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."files WHERE id=".(int)$id;
			$result_img = $this->query($sql);
			$file = $result_img->row['path'];
			@unlink(DOCUMENT_ROOT.$file);
			$this->delete('files','id='.(int)$id);
		}
		public function delImgCover($id){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."image_title WHERE content_id=".(int)$id;
			$result_img = $this->query($sql);
			$file = $result_img->row['path'];
			@unlink(DOCUMENT_ROOT.$file);
			$this->delete('image_title','content_id='.(int)$id);
		}
		public function getFiles($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND f.content_id = '.(int)$data['id'];
				$sql = "SELECT * FROM ".PREFIX."files f WHERE f.content_id <> '' ".$where;
				$result['result'] = $this->query($sql)->rows;
			}
			return $result;
		}
		public function getFilesTitle($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND t.content_id = '.(int)$data['id'];
				$sql = "SELECT * FROM ".PREFIX."image_title t WHERE t.content_id <> '' ".$where;
				$result['result'] = $this->query($sql)->rows;
			}
			return $result;
		}
		public function add($data=array()){
			$result = array();
			if(is_array($data)){
				$date = date('Y-m-d H:i:s');
				$insert_content = array(
					'user_id' => $_SESSION['user_id'],
					'date_create' => $date,
					'link'	=> $data['link']
				);
				$content_id = $this->insert('content',$insert_content);
				foreach($data['title'] as $key => $val){
					$title = $val;
					$detail = (isset($data['detail'][$key])?$data['detail'][$key]:'');
					$keyword = (isset($data['keyword'][$key])?$data['keyword'][$key]:'');

					$detail = $this->escape(htmlspecialchars($detail, ENT_QUOTES));
					$detail = iconv(mb_detect_encoding($detail, mb_detect_order(), true), "UTF-8", $detail);

					$keyword = $this->escape(htmlspecialchars($keyword, ENT_QUOTES));
					$keyword = iconv(mb_detect_encoding($keyword, mb_detect_order(), true), "UTF-8", $keyword);
					
					$title = $this->escape(htmlspecialchars($title, ENT_QUOTES));
					$title = iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);

					if($keyword==''){
						$data_detail = (isset($data['detail'][$key])?$data['detail'][$key]:'');
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
								$keyword .= $arr_detail[$i];
								if($i<5){
									$keyword .= ',';
								}
							}
						}
					}
					$update_detail = array(
						'title' => $this->escape($val),
						'detail' => $detail,
						'keyword'	=> $keyword
					);

					$insert_detail = array(
						'content_id' => $content_id,
						'lang_id' => $key,
						'title' => $title,
						'detail' => $detail,
						'keyword'	=> $keyword
					);
					$content_id_detail = $this->insert('content_detail',$insert_detail);
				}
				$result = array(
					'result' => 'success',
					'content_id' => $content_id
				);
			}else{
				$result = array(
					'result' => 'fail'
				);
			}
			return $result;
		}
		public function addImg($data = array()){
			$result = array();
			$content_id = $data['content_id'];
			$insert_detail = array(
				'path' => $data['path'],
				'name' => $data['name'],
				'content_id'=> $data['content_id']
			);
			$content_img_id = $this->insert('files',$insert_detail);
			return $content_img_id;
		}
		public function addImgTitle($data = array()){
			$result = array();
			$content_id = (int)$data['content_id'];
			$insert_detail = array(
				'path' => $data['path'],
				'name' => $data['name'],
				'content_id'=> $data['content_id']
			);
			$sql = "SELECT * FROM m_image_title WHERE content_id =".$content_id;
			$check = $this->query($sql);
			if ($check->num_rows==0) {
				$content_img_id = $this->insert('image_title',$insert_detail);
			}else{
				@unlink(DOCUMENT_ROOT.$check->row['path']);
				$content_img_id = $this->update('image_title',$insert_detail,'content_id='.$content_id);
			}
			return $content_img_id;
		}
		public function editImgTitle($data = array()){
			$result = array();
			$content_id = $data['content_id'];
			$insert_detail = array(
				'path' => $data['path'],
				'name' => $data['name']
			);
			$content_img_id = $this->update('image_title',$insert_detail,'content_id='.$content_id);
			return $content_img_id;
		}
		public function edit($data=array()){
			$result = array();
			if(is_array($data)){
				if(isset($data['id'])){
					$content_id = (int)$data['id'];
					$date = date('Y-m-d H:i:s');
					$update_content = array(
						// 'user_id' => $_SESSION['user_id'],
						'date_create' => $date,
						'link'	=> $data['link']
					);
					$result_content = $this->update('content',$update_content,"id=".$content_id);
					foreach($data['title'] as $key => $val){
						$title = $val;
						$detail = (isset($data['detail'][$key])?$data['detail'][$key]:'');
						$keyword = (isset($data['keyword'][$key])?$data['keyword'][$key]:'');

						$detail = $this->escape(htmlspecialchars($detail, ENT_QUOTES));
						$detail = iconv(mb_detect_encoding($detail, mb_detect_order(), true), "UTF-8", $detail);

						$keyword = $this->escape(htmlspecialchars($keyword, ENT_QUOTES));
						$keyword = iconv(mb_detect_encoding($keyword, mb_detect_order(), true), "UTF-8", $keyword);
						
						$title = $this->escape(htmlspecialchars($title, ENT_QUOTES));
						$title = iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);

						if($keyword==''){
							$data_detail = (isset($data['detail'][$key])?$data['detail'][$key]:'');
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
									$keyword .= $arr_detail[$i];
									if($i<5){
										$keyword .= ',';
									}
								}
							}
						}

						$update_detail = array(
							'title' => $this->escape($val),
							'detail' => $detail,
							'keyword'	=> $keyword
						);
						$where = "lang_id = ".$key." AND content_id = ".$content_id;
						$result_content_detail = $this->update('content_detail',$update_detail,$where);
					}
					$result = array(
						'result' => 'success',
						'content_id' => $content_id
					);
				}
			}else{
				$result = array(
					'result' => 'fail'
				);
			}
			return $result;
		}
		public function del($id){
			$result = array();
			$id = (int)$id;
			if($id){
				$this->delete('content',"id=".(int)$id);
				$this->delete('content_detail',"content_id=".(int)$id);
				$result_img_title = $this->query('SELECT * FROM m_image_title WHERE content_id = '.$id);
				foreach($result_img_title->rows as $val){
					@unlink(DOCUMENT_ROOT.$val['path']);
				}
				$this->delete('image_title',"content_id=".(int)$id);
				$result_files = $this->query('SELECT * FROM m_files WHERE content_id = '.$id);
				foreach($result_files->rows as $val){
					@unlink(DOCUMENT_ROOT.$val['path']);
				}
				$this->delete('files',"content_id=".(int)$id);
				$this->delete('content_tags',"content_id=".(int)$id);
				$result = array(
					'result' => 'success'
				);
			}else{
				$result = array(
					'result' => 'fail'
				);
			}
			return $result;
		}
		public function id_lang($id_lang = 0){
			$return = $id_lang;
			if($id_lang==0){
				$return = DEFAULT_LANGUAGE;
			}
			return $return;
		}
	}
?>