<?php
class Category extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function populate(){		
		$sql = "select id,name from categories ";
		$ci = & get_instance();
		$query = $ci->db->query($sql);		
		return $query->result();
	}
	function getarray(){
		$sql = "select id,name from categories ";
		$ci = & get_instance();
		$query = $ci->db->query($sql);
		$arr = array();
		foreach($query->result() as $result){
			$arr[$result->id] = $result->name;
		}
		return $arr;
	}
}
