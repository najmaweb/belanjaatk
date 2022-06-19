<?php
class Websetting extends CI_Model{
	var $has_one = array('group');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Websetting();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Websetting();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getuser($id){
		$obj = new Websetting();
		$obj->where('id',$id)->get();
		return $obj;
	}
	function populate(){
		$ci = & get_instance();
		$sql = "select id,webtitle,headertype,shownewproducts,showfrontarticles,isdefault,createuser,createdate from websettings ";
		$qry = $ci->db->query($sql);
		return $qry->result();
	}	
	function getdefault(){
		$ci = & get_instance();
		$sql = "select id,webtitle,headertype,shownewproducts,showfrontarticles,isdefault,createuser,createdate from websettings where isdefault='1'";
		$qry = $ci->db->query($sql);
		return $qry->result();
	}	
}
