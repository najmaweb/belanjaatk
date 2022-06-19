<?php
class Blog extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Blog();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Blog();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getblog($id){
		$obj = new Blog();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function set_active($id,$active){
		$obj = new Blog();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}
	
	function populate(){
		$obj = new Blog();
		$obj->where('active','1')->get();
		return $obj;
	}
}