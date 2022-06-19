<?php
class Jsons extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS'); 
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    }
    function index(){
       $myarray = array();
        $res = $this->json->getProducts();

        echo json_encode($res);
    }
    function updateproduct2(){
        header("Access-Control-Allow-Origin: *");
        
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $id = $this->uri->segment(3);
        $name = $this->uri->segment(4);
        $sellingprice = $this->uri->segment(5);
        //$this->json->updateProduct(intval($id),$name,intval($sellingprice));
                $ci = & get_instance();
                $id = $id;
                $name = $name;
                $sellingprice = (int) $sellingprice;
        $sql = 'update products ';
        $sql .= 'set ';
        //$sql .= 'name="'.$name.'",';
        $sql .= 'sellingprice='.$sellingprice.' ';
        $sql .= 'where ';
        $sql .= 'id='.$id.' ';
        $que = $ci->db->query($sql);
        
//       $myarray = array();
  //      $res = $this->json->getProducts();

        echo json_encode($params);

    }
    function updateproduct(){
        header('Access-Control-Allow-Origin: *');
       // header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
       // header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
        
        
        $pars = $this->input->post();
        
        
        
        
        parse_str(file_get_contents("php://input"), $_PUT);
        
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $id = $request->id;
        $name = $request->name;
        $sellingprice = $request->sellingprice;

        
        $sql = 'update products ';
        $sql .= 'set name="'.$name.'",sellingprice="'.$sellingprice.'" ';
        $sql .= 'where ';
        $sql .= 'id='.$id.' ';
        $que = $this->db->query($sql);
        
        
echo "{}";
//        echo json_encode($postdata);
    }
    function update_product(){
            if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
 
 
    //http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $username = $request->username;
 
        if ($username != "") {
            echo "Server returns: " . $username;
        }
        else {
            echo "Empty username parameter!";
        }
    }
    else {
        echo "Not called properly with username parameter!";
    }
    }
    
    
    
    
    function updatebyget(){
        $id = $this->uri->segment(3);
        $name = $this->uri->segment(4);
        $sellingprice = $this->uri->segment(5);
        $sql = 'update products ';
        $sql .= 'set name="'.$name.'",sellingprice="'.$sellingprice.'" ';
        $sql .= 'where ';
        $sql .= 'id='.$id.' ';
        $que = $this->db->query($sql);
       
    }
}