<?php 
	class MasterModel extends db {
		public function getMenu($data=array()){
			$result = array();
			$result = $this->query("SELECT * FROM ".PREFIX."tags t LEFT JOIN ".PREFIX."tags_detail td ON t.id = td.tags_id WHERE active = 0 AND lang_id = ".DEFAULT_LANGUAGE)->rows;
			return $result;
		}
		public function getTitle($id){
			$result = array();
			$result = $this->query("SELECT * FROM ".PREFIX."tags t LEFT JOIN ".PREFIX."tags_detail td ON t.id = td.tags_id WHERE active = 0 AND lang_id = ".DEFAULT_LANGUAGE." AND t.id = ".(int)$id)->row;
			return $result;
		}
		public function getTopic($id){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."content t LEFT JOIN ".PREFIX."content_detail td ON t.id = td.content_id WHERE active = 0 AND lang_id = ".DEFAULT_LANGUAGE." AND t.id = ".(int)$id;
			$result = $this->query($sql)->row;
			return $result;
		}
		// public function findCat($id){
		// 	$result = array();
		// 	$sql = "SELECT * FROM ".PREFIX."content t LEFT JOIN ".PREFIX."content_detail td ON t.id = td.content_id WHERE active = 0 AND lang_id = ".DEFAULT_LANGUAGE." AND t.id = ".(int)$id;
		// 	$result = $this->query($sql)->row;
		// 	return $result;
		// }
		public function getRelated($id,$data=array()){
			$result = array();
			$result_tags = $this->query("SELECT * FROM ".PREFIX."content_tags ct 
				WHERE 
				ct.content_id = ".$id." 
				ORDER BY id ASC 
				LIMIT 0,1")->row;
			$tags_id = 0;
			if(isset($result_tags['tags_id'])){
				$tags_id = $result_tags['tags_id'];
			}
			if($tags_id){
				$content = $this->query("SELECT *,c.id AS id FROM ".PREFIX."content_tags ct 
					LEFT JOIN ".PREFIX."content c ON ct.content_id = c.id 
					LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
					WHERE 
					ct.tags_id = ".$tags_id." 
					AND lang_id = ".DEFAULT_LANGUAGE." 
					AND c.id<>'".$id."'
					 ORDER BY ct.id ASC LIMIT 0,5")->rows;
				foreach($content as $val){
					$id = $val['content_id'];
					$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
					$result_img = $this->query($sql_img)->row;

					// / get image title
					$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
					$result_img_title = $this->query($sql_img_title)->row;

					$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
					LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
					LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
					WHERE 
					content_id = ".$id."
					AND lang_id = ".DEFAULT_LANGUAGE;
					$result_tags = $this->query($sql_tags)->rows;

					$result[] = array( 
						'result' 	=> $val,
						'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
						'id'		=> $id,
						'tags'		=> $result_tags,
						'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					);
				}
			}
			return $result;
		}
		public function getLated($data=array()){
			$result = array();
			$content = $this->query("SELECT *,c.id AS id FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."content c ON ct.content_id = c.id 
				LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
				WHERE 
				lang_id = ".DEFAULT_LANGUAGE." 
				 ORDER BY ct.id ASC LIMIT 0,4")->rows;
			foreach($content as $val){
				$id = $val['content_id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;

				$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result[] = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function getCat($id,$data=array()){
			$result = array();
			$where = '';
			if(isset($data['where'])){
				$where .= $data['where'];
			}
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."content_tags ct ON ct.content_id = c.id 
			WHERE active = 0 
			AND cd.lang_id = ".DEFAULT_LANGUAGE." 
			AND ct.tags_id = ".(int)$id." ORDER BY c.id DESC".$where;
			$result_news = $this->query($sql)->rows;
			foreach($result_news as $val){
				$id = $val['id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;
				
				// get image title
				$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
				$result_img_title = $this->query($sql_img_title)->row;

				$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result[] = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function getOne($id,$data=array()){
			$result = array();
			$where = '';
			if(isset($data['where'])){
				$where .= "";
			}
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."content_tags ct ON ct.content_id = c.id 
			WHERE active = 0 
			AND cd.lang_id = ".DEFAULT_LANGUAGE." 
			AND ct.tags_id = ".(int)$id.$where." ORDER BY c.id DESC LIMIT 0,1";
			$result_news = $this->query($sql)->rows;
			foreach($result_news as $val){
				$id = $val['id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;
				
				// get image title
				$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
				$result_img_title = $this->query($sql_img_title)->row;

				$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result[] = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function getcatlimit2($id,$data=array()){
			$result = array();
			$where = '';
			if(isset($data['where'])){
				$where .= $data['where'];
			}
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."content_tags ct ON ct.content_id = c.id 
			WHERE active = 0 
			AND cd.lang_id = ".DEFAULT_LANGUAGE." 
			AND ct.tags_id = ".(int)$id." ORDER BY c.id DESC".$where;
			$result_news = $this->query($sql)->rows;
			foreach($result_news as $val){
				$id = $val['id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;
				
				// get image title
				$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
				$result_img_title = $this->query($sql_img_title)->row;

				$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result[] = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function getcatlimit3($id,$data=array()){
			$result = array();
			$where = '';
			if(isset($data['where'])){
				$where .= $data['where'];
			}
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."content_tags ct ON ct.content_id = c.id 
			WHERE active = 0 
			AND cd.lang_id = ".DEFAULT_LANGUAGE." 
			AND ct.tags_id = ".(int)$id." ORDER BY c.id DESC".$where;
			$result_news = $this->query($sql)->rows;
			foreach($result_news as $val){
				$id = $val['id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;
				
				// get image title
				$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
				$result_img_title = $this->query($sql_img_title)->row;

				$sql_tags = "SELECT * FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result[] = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function get($id){
			$result = array();
			$sql = "SELECT *,c.id AS id FROM ".PREFIX."content c 
			LEFT JOIN ".PREFIX."content_detail cd ON c.id = cd.content_id 
			LEFT JOIN ".PREFIX."content_tags ct ON ct.content_id = c.id 
			WHERE active = 0 
			AND cd.lang_id = ".DEFAULT_LANGUAGE." 
			AND c.id = ".(int)$id;
			$result_news = $this->query($sql)->rows;
			foreach($result_news as $val){
				$id = $val['id'];
				$sql_img = "SELECT * FROM ".PREFIX."files WHERE content_id = ".$id." LIMIT 0,1";
				$result_img = $this->query($sql_img)->row;

				// get image title
				$sql_img_title = "SELECT * FROM ".PREFIX."image_title WHERE content_id = ".$id." LIMIT 0,1";
				$result_img_title = $this->query($sql_img_title)->row;

				$sql_tags = "SELECT *,td.title AS cat_title  FROM ".PREFIX."content_tags ct 
				LEFT JOIN ".PREFIX."tags t ON ct.tags_id = t.id 
				LEFT JOIN ".PREFIX."tags_detail td ON td.id = t.id  
				WHERE 
				content_id = ".$id."
				AND lang_id = ".DEFAULT_LANGUAGE;
				$result_tags = $this->query($sql_tags)->rows;

				$result = array(
					'result' 	=> $val,
					'cover'		=> (isset($result_img['path'])?$result_img['path']:''),
					'img_title'	=> (isset($result_img_title['path'])?$result_img_title['path']:''),
					'id'		=> $id,
					'tags'		=> $result_tags
				);
			}
			return $result;
		}
		public function contact($data=array()){
			$result = array();
			$insert = array(
				'name' 		=> $this->escape($data['name']),
				'lname' 	=> $this->escape($data['lname']),
				'email' 	=> $this->escape($data['email']),
				'phone' 	=> $this->escape($data['phone']),
				'topic' 	=> $this->escape($data['topic']),
				'detail' 	=> $this->escape($data['detail']),
				'date_create' => date('Y-m-d H:i:s')
			);
			$result = $this->insert('contact',$insert);
			return $result;
		}
		public function contentImg($id){
			$sql = "SELECT * FROM ".PREFIX."files WHERE content_id=".$id;
			$result = $this->query($sql)->rows;
			return $result;
		}
		public function getad($id,$data=array()){
			$result = array();
			// $sql = "SELECT * FROM ".PREFIX."advertising WHERE id = 1";
			$result = $this->query("SELECT * FROM ".PREFIX."advertising a LEFT JOIN ".PREFIX."files_ad f ON a.id = f.ad_id WHERE a.id =".$id)->rows;
			// $result = $this->query($sql)->rows;
			
			return $result;
		}
		public function getadonce($data=array()){
			$result = array();
			$result = $this->query("SELECT * FROM ".PREFIX."advertising a LEFT JOIN ".PREFIX."files_ad f ON a.id = f.ad_id WHERE a.id = 1 LIMIT 0,1")->rows;
			return $result;
		}
		public function updateView($id,$data=array()){
			$result = array();
			$result_select = $this->query("SELECT * FROM ".PREFIX."views WHERE content_id =".$id)->rows;
			foreach ($result_select as $key => $value) {
				$content_id = $value['content_id'];
				$count = $value['count'];
			}
			if (empty($content_id)) {
				$insert = array(
					'content_id' 	=> $id,
					'count'			=> 1
				);
				$result_insert = $this->insert('views',$insert);
			}else{
				$update = array(
					'count' => $count+1,
				);
				$result_update = $this->update('views',$update,'content_id ='.$content_id);
			}
			return $result;
		}
		public function getview($id){
			$result = array();
			$result = $this->query("SELECT * FROM ".PREFIX."views WHERE content_id =".$id)->row;
			return $result;
		}
		public function getadCat($id){
			$result = array();
			$result = $this->query("SELECT * FROM ".PREFIX."advertising a LEFT JOIN ".PREFIX."files_ad f ON a.id = f.ad_id WHERE tag_id =".$id)->row;
			return $result;
		}
	}
?>