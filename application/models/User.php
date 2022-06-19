<?php
class User extends CI_Model{
	var $has_one = array('group');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new User();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new User();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getuser($id){
		$obj = new User();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function populate(){
		$sql = "select id,username,createdate from users ";
		$ci = & get_instance();
		$q = $ci->db->query($sql);
		return $q->result();
	}	
}
