<?php 
	class TagsModel extends db {
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

			$sql = "SELECT *,c.id AS id FROM ".PREFIX."tags c INNER JOIN ".PREFIX."tags_detail cd ON c.id = cd.tags_id WHERE c.id <> '' ".$where;
			$result['result'] = $this->query($sql)->rows;
			return $result;
		}
		public function add($data=array()){
			$result = array();
			if(is_array($data)){
				$date = date('Y-m-d H:i:s');
				$insert_tags = array(
					'user_id' => 0,
					'date_create' => $date
				);
				$tags_id = $this->insert('tags',$insert_tags);
				foreach($data['title'] as $key => $val){
					$insert_detail = array(
						'tags_id' => $tags_id,
						'lang_id' => $key,
						'title' => $val
					);
					$tags_id_detail = $this->insert('tags_detail',$insert_detail);
				}
				$result = array(
					'result' => 'success',
					'tags_id' => $tags_id
				);
			}else{
				$result = array(
					'result' => 'fail'
				);
			}
			return $result;
		}
		public function edit($data=array()){
			$result = array();
			if(is_array($data)){
				if(isset($data['id'])){
					$tags_id = (int)$data['id'];
					$date = date('Y-m-d H:i:s');
					$update_tags = array(
						// 'user_id' => 0,
						'date_create' => $date
					);
					$result_tags = $this->update('tags',$update_tags,"id=".$tags_id);
					foreach($data['title'] as $key => $val){
						$update_detail = array(
							'title' => $val
						);
						$where = "lang_id = ".$key." AND tags_id = ".$tags_id;
						$result_tags_detail = $this->update('tags_detail',$update_detail,$where);
					}
					$result = array(
						'result' => 'success',
						'tags_id' => $tags_id
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
			if($id){
				$this->delete('tags',"id=".(int)$id);
				$this->delete('tags_detail',"tags_id=".(int)$id);
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
		public function getChecked($id){
			$result = array();
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content_tags c WHERE content_id = ".(int)$id;
			$result['result'] = $this->query($sql)->rows;
			return $result;
		}
		public function addTags($data = array(),$id=0){
			$result = array();
			if(is_array($data)){
				if($id){
					$this->delete('content_tags','content_id='.(int)$id);
					foreach($data as $val){
						$insert = array(
							'content_id' => $id,
							'tags_id' => $val
						);
						$this->insert('content_tags',$insert);
					}
				}
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