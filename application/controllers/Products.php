<?php
class Products extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function remove(){
        $params = $this->input->post();
        $sql = "delete from products where id=".$params['id'];
        $this->db->query($sql);
        echo $sql;
    }
    function save(){
        $params = $this->input->post();
        $sql = "insert into products ";
        $sql.= "(category_id,name,image,searchimage,unit,sellingprice,alterprice,description) ";
        $sql.= "values ";
        $sql.= "('".$params['category_id']."','".$params['name']."','".$params['image']."','".$params['searchimage']."','".$params['unit']."','".$params['sellingprice']."','".$params['alterprice']."','".$params['description']."') ";
        $this->db->query($sql);
        echo $this->db->insert_id();
    }
}