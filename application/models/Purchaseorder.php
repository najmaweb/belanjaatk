<?php
class Purchaseorder extends CI_Model{
    function getbyid($id){
        $ci = & get_instance();
        $sql = "select id,username,destinationname,email,address,city from checkouts ";
        $sql.= "where id=".$id;
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
    function getdetailbyorderid($id){
        $ci = & get_instance();
        $sql = "select productname,sellprice,amount,total from checkoutdetails ";
        $sql.= "where checkout_id=".$id;
        $que = $ci->db->query($sql);
        return $que->result();
    }
}