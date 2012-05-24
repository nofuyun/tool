<?php
class Cache {

	private $handle;

	function __construct() {
		$this->handle = Doo::cache('php');
		$this->handle->hashing = false;
	}
	
	public function listAll($id) {
		$id = ucfirst($id);
		$values = $this->handle->get($id);
		if (isset($values)) {
			return $values;
		}
		return $this->refresh($id);
	}
	
	public function refresh($id) {
		$id = ucfirst($id);
		Doo::loadModel($id);
		$ar = Doo::db()->find(new $id(), array('asArray' => true));
		foreach ($ar as $row) {
			$values[$row['name']] = $row;
		}
		$this->set($id, $values);
		return $values;
	}
	
	/**
	 * @example Cache::get('City','baise.en');
	 * @param string $id
	 * @param string $name
	 * @return string
	 */
	public function get($id,$name){
		list($key, $field) = explode('.', $name,2);
		$return = $this->handle->get($id);
		if (empty($field)){
			return $return[$key];
		}else{
			return $return[$key][$field];
		}
	}

	public function set($id, $value, $expire = 0) {
		$this->handle->set($id, $value , $expire);
	}
	
}

