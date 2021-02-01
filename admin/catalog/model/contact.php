<?php 
	class ContactModel extends db {
		public function get($data = array()){
			$result = array();
			$where = '';
			if(isset($data['id'])){
				$where .= ' AND c.id = '.(int)$data['id'];
			}
			$sql = "SELECT * FROM ".PREFIX."contact c WHERE c.id <> '' ".$where." ORDER BY c.id ASC";
			$result['result'] = $this->query($sql)->rows;

			return $result;
		}
	}
?>