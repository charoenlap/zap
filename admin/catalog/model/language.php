<?php 
	class LanguageModel extends db {
		public function get($data = array()){
			$result = array();
			$active = (isset($data['active'])?$data['active']:0);
			$sql = "SELECT * FROM ".PREFIX."language WHERE active = ".(int)$active;
			$result['result'] = $this->query($sql)->rows;

			return $result;
		}
	}
?>