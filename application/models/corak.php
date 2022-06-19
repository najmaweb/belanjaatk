<?php
class Corak extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function populate($id){
		$obj = new Corak();
		$obj->where('category_id',$id)->get();
		return $obj;
	}
	
	function getcorak($id){
		$obj = new Corak();
		$obj->where('id',$id)->get();
		return $obj;
	}

	
	function populatelimit($segment,$offset){
		
		$obj = new Corak();
		$obj->get($offset,$segment);
		return $obj;
	}

	function add($params){
		$obj = new Corak();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Corak();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function set_active($id,$active){
		$obj = new Corak();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}
}
