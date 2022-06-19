<?php
class Product extends CI_Model{
	var $has_many = array(
		'member'=>array('class'=>'category','other_field'=>'category'),
		'category'=>array('class'=>'category','other_field'=>'member')
	);
	function __construct(){
		parent::__construct();
	}
		
	function getamount(){
		$ci = & get_instance();
		$sql = "select id,name from products ";
		$qry = $ci->db->query($sql);
		return $qry->num_rows;
	}
	
	function getnewreleases(){
		$ci = & get_instance();
		$sql = "select id,name from products ";
		$sql.= "where isnewrelease='1'";
		$qry = $ci->db->query($sql);
		return $qry->result();
	}

/*
 * from admin
 * */

	function populate($category_id="",$segment=NULL,$offset=NULL){
		$ci = & get_instance();
		if( !is_null($segment)){
			$limit = "limit $segment, $offset ";
		}else{
			$limit = "";
		}
		if($category_id===""){
			$sql = "select id,name,image,searchimage,unit,case when sellingprice is null then 0 else sellingprice end sellingprice,category_id,isnewrelease,isgallery,alterprice,active from products $limit";
		}else{
			$sql = "select id,name,image,searchimage,unit,case when sellingprice is null then 0 else sellingprice end sellingprice,category_id,isnewrelease,isgallery,alterprice,active from products where category_id='$category_id' $limit ";
		}
		$qry = $ci->db->query($sql);
		return array('result'=>$qry->result(),'num_rows'=>$qry->num_rows());
	}
	function getcount($category_id){
		$sql = "select count(id) cnt from products where category_id=".$category_id."";
		$ci = & get_instance();
		$res = $ci->db->query($sql);
		$rows = $res->result()[0]->cnt;
		$pages = floor($rows/9);
		return $pages;
	}
	function populatelimit($segment,$offset){
		$ci = & get_instance();
		$sql = "select id,name from products ";
		$sql.= "limit $segment,$offset";
		$qry = $ci->db->query($sql);
		return $qry->result();
	}

	function add($params){
		$obj = new Product();
		foreach($params as $key=>$val){
			if($key!='save'){
				$obj->$key = $val;
			}
		}
		$obj->save();
	}
	
	function edit($params){
		$obj = new Product();
		unset($params['save']);
		$obj->where('id',$params['id'])->update($params);
	}
	
	function getproduct($id = ""){
		$sql = "select id,name,image,searchimage,category_id,istop,isgallery,isnewrelease,isproduct,ctype,unit,sellingprice,alterprice,description,author,active,createdate from products ";
		if($id!=""){
			$sql.="where id='$id'";
		}
		$ci = & get_instance();
		$q = $ci->db->query($sql);
		return $q->result();
	}
	function updateproduct($params){
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"$key='$val'");
			$str = implode(",",$arr);
		}
		$sql = "update products set $str ";
		$sql.= "where id='".$params['id']."'";
		$ci = & get_instance();
		$q = $ci->db->query($sql);
		return $sql;
	}
	function set_active($id,$active){
		$obj = new Product();
		$obj->where('id',$id)->update(array('active'=>'0'));
	}

}
