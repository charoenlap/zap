<?php  
	class AdvertisingModel extends db {
		public function list($data = array()){
			$sql = "SELECT * FROM m_advertising WHERE del = 0";
			$result['result'] = $this->query($sql)->rows;
			
			return $result;
		}
		public function get($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND id = '.(int)$data['id'];
			}

			$sql = "SELECT * FROM ".PREFIX."advertising WHERE id <> '' ".$where;
			$result['result'] = $this->query($sql)->rows;

			return $result;
		}
		public function delImg($id){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."files_ad WHERE id=".(int)$id;
			$result_img = $this->query($sql);
			$file = $result_img->row['path'];
			@unlink($file);
			$this->delete('files_ad','id='.(int)$id);
		}
		public function getFiles($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND f.ad_id = '.(int)$data['id'];
				$sql = "SELECT * FROM ".PREFIX."files_ad f WHERE f.ad_id <> '' ".$where;
				$result['result'] = $this->query($sql)->rows;
			}
			return $result;
		}
		public function add($data = array()){
			$result = array();
			if(is_array($data)){
				$date = date('Y-m-d H:i:s');
				$insert_ad = array(
					'user_id' => $_SESSION['user_id'],
					'name'		=> $data['name'],
					'link'		=> $data['link'],
					'date_add'	=> date('Y-m-d H:i;s'),
					'del'		=> 0
				);
				$ad_id = $this->insert('advertising',$insert_ad);

				$result = array(
					'result' => 'success',
					'ad_id' => $ad_id
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
			$ad_id = $data['ad_id'];
			$insert_detail = array(
				'path' => $data['path'],
				'name' => $data['name'],
				'ad_id'=> $data['ad_id']
			);
			$content_img_id = $this->insert('files_ad',$insert_detail);
			return $content_img_id;
		}
		public function edit($data=array()){
			$result = array();
			if(is_array($data)){
				if(isset($data['id'])){
					$ad_id = (int)$data['id'];
					$date = date('Y-m-d H:i:s');
					$update_advertising = array(
						'user_id' 	=> $_SESSION['user_id'],
						'name'		=> $data['name'],
 						'date_add' 	=> $date,
						'link'		=> $data['link']
					);
					$result_advertising = $this->update('advertising',$update_advertising,"id=".$ad_id);

					$result = array(
						'result' => 'success',
						'id' => $ad_id
					);
				}
			}else{
				$result = array(
					'result' => 'fail'
				);
			}
			return $result;
		}
		public  function del($id){
			$data = array(
				'del'	=> 1,
			);
			if ($id) {
				$this->update('advertising',$data,'id='.(int)$id);
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
	}
?>