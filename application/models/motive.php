<?php
class Motive extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function populate($id){
		$obj = new Motive();
		$obj->where('motive_id',$id)->get();
		return $obj;
	}
	
	function populatelimit($segment,$offset){
		
		$obj = new Motive();
		$obj->get($offset,$segment);
		return $obj;
	}

	function add($params){
		$obj = new Motive();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Motive();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getmotive($id){
		$obj = new Motive();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function set_active($id,$active){
		$obj = new Motive();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}
	
}