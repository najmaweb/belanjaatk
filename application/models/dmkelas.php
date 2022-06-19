<?php
class Dmkelas extends DataMapper{
	var $table = "kelases";
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Dmkelas();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Dmkelas();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getkelas($id){
		$obj = new Dmkelas();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function populate($segment=0,$offset=3){
		$obj = new Dmkelas();
		$obj->get($offset,$segment);
		return $obj;
	}
}
