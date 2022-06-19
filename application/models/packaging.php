<?php
class Packaging extends DataMapper{
//	var $has_one = array('kelas');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Packaging();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Packaging();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getpackaging($id){
		$obj = new Packaging();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function set_active($id,$active){
		$obj = new Packaging();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}
	
	function populate($segment=0,$offset=3){
		$obj = new Packaging();
		$obj->where('active','1')->get($offset,$segment);
		return $obj;
	}
}