<?php 
	class UserModel extends db {
		public function listall($data = array()){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."users";
			$result = $this->query($sql)->rows;
			return $result;
		}
		public function check($data=array()){
			$result = array();
			$username = $this->escape($data['username']);
			$password = md5($this->escape($data['password']));
			$sql = "SELECT * FROM ".PREFIX."users WHERE username = '".$username."' AND password='".$password."' LIMIT 0,1";
			$result_user = $this->query($sql);
			if($result_user->num_rows){
				$result = array(
					'result' => $result_user->row
				);
			}else{
				$result = false;
			}
			return $result;
		}
		public function get($id){
			$result = array();
			$sql = "SELECT * FROM ".PREFIX."users WHERE del = 0 AND id =".$id;
			$result = $this->query($sql)->row;
			return $result;
		}
		public function edit($data=array()){
			$result = array();
			$update = array(
				'username'	=> $data['username'],
				'password'	=> $data['password'],
				'name'		=> $data['name'],
				'lname'		=> $data['lname']
			);
			$result_update = $this->update('users',$update,'id='.$data['id']);

			return $result;
		}
		public function add($data=array()){
			$result = array();
			$data_insert = array(
				'username' 	=> $data['username'],
				'password'	=> $data['password'],
				'name'		=> $data['name'],
				'lname'		=> $data['lname'],
				'create'	=> date('Y-m-d H:i:s'),
			); 
			$result_insert = $this->insert('users',$data_insert);

			return $result;
		}
	}
?>