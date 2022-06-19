<?php
class Kelas extends DataMapper{
	var $table = "kelases";
//	var $has_many = array('packaging');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Kelas();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Kelas();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getkelas($id){
		$obj = new Kelas();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function set_active($id,$active){
		$obj = new Packaging();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}
	
	function populate($segment=0,$offset=3){
		$obj = new Kelas();
		$obj->get($offset,$segment);
		return $obj;
	}
}
