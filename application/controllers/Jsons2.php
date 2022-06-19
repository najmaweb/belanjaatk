<?php
class Jsons2 extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('json');
    }
    function index(){
        
        $params = $this->input->post();
        $this->json->updateProduct($params['id'],$params['name'],$params['sellingprice']);
    }
    function updateproduct(){
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: X-Requested-With, content-type, X-Token, x-token');

        $params = $this->input->post();
        $this->json->updateProduct($params['id'],$params['name'],$params['sellingprice']);
        $arr = array();
        echo json_decode($arr);
    }
}