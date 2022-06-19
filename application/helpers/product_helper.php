<?php 
function getproducts($page=1,$items=4,$name=""){
	$ci = & get_instance();
	$query = "select id,name,image from products where name like '%".$name."%' limit ".$page.",".$items."";
	echo $query;
	$result = $ci->db->query($query);
	$rows = $result->result();
	$out = array();
	foreach($rows as $row){
		array_push($out,array("image"=>$row->image,"name"=>$row->name));
	}
	return $out;
}
function getproduct($id){
	$ci = & get_instance();
	$query = "select a.id,a.name,a.image,a.description,a.sellingprice,b.name category from products a left outer join categories b on b.id=a.category_id where a.id=".$id." ";
	$result = $ci->db->query($query);
	$row = $result->result()[0];
	return $row;
}
function gettotalitem(){
	$ci = & get_instance();
	$query = "select count(id) total from products";
	$result = $ci->db->query($query);
	$out =	$result->result()[0];
	return $out->total;
}
function gettotalpage(){
	return floor(gettotalitem()/8);
}
function result($page=1,$items=4,$name=""){
	$ci = & get_instance();
	$query = "select id,name,image,searchimage,description from products where name like '%".urldecode($name)."%' ";//limit ".$page.",".$items."";
	$result = $ci->db->query($query);
	return $result->result();
}
?>