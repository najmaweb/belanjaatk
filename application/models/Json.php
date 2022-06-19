<?php
class Json extends CI_Model{
    function getProducts(){
        $sql = 'select * from products';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res;
    }
    function saveProduct($name,$sellingprice){
        $sql = 'insert into products ';
        $sql .= '(name,sellingprice)';
        $sql .= 'values ';
        $sql .= '("'.$name.'","'.$sellingprice.'")';
        $que = $ci->db->query($sql);
        $res = $que->result();
        return $res;
    }
    function updateProduct($id,$name,$sellingprice){
        $ci = & get_instance();
        $sql = 'update products ';
        $sql .= 'set name="'.$name.'",sellingprice="'.$sellingprice.'" ';
        $sql .= 'where ';
        $sql .= 'id='.$id.' ';
        $que = $ci->db->query($sql);
    }
}