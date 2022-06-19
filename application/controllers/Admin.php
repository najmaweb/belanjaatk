<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("purchaseorder");
	}
    function login(){
        $this->load->view("admin/login");
    }
    function login_handler(){
        $params = $this->input->post();
        if(loginsuccess($params["user"],$params["password"])){
            redirect(base_url()."admin/products");
        }else{
            redirect(base_url()."admin/login");
        }
	}
	function logout(){
		redirect("/admin/login");
	}
    function products(){
        $data['objs'] = $this->product->populate();
		$data['categories'] = $this->category->populate();
        $this->load->view("admin/products/products",$data);
    }
	function category_upload_big_tmp(){
		//$this->check_login();
		$uploaddir = './media/products/big/';
		$file = $uploaddir . basename($_FILES['uploadfile']['name']);

		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
			echo "success";
		} else {
			echo "error";
		}
	}	
	function category_upload_tmp(){
		//$this->check_login();
		$uploaddir = './media/products/';
		$file = $uploaddir . basename($_FILES['uploadfile']['name']);

		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
			echo "success";
		} else {
			echo "error";
		}
	}
	function saveexetendedimage(){
		$keys = array();$vals = array();
		$params = $this->input->post();
		foreach($params as $key=>$val){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$sql = "insert into product_images ";
		$sql.= "(".implode(",",$keys).")";
		$sql.= "values ";
		$sql.= "('".implode("','",$vals)."')";
		$que = $this->db->query($sql);
		echo $this->db->insert_id();
	}
	function getobj(){
		$params = $this->input->post();
		$objs = $this->product->getproduct($params['id']);
		foreach($objs as $obj){
			echo '{"id":"'.$obj->id.'","name":"'.$obj->name.'","image":"'.$obj->image.'","searchimage":"'.$obj->searchimage.'","isgallery":"'.$obj->isgallery.'","isnewrelease":"'.$obj->isnewrelease.'","istop":"'.$obj->isnewrelease.'","sellingprice":"'.$obj->sellingprice.'","alterprice":"'.$obj->alterprice.'","active":"'.$obj->active.'","category_id":"'.$obj->category_id.'","unit":"'.$obj->unit.'","description":"'.$obj->description.'"}';
		}
	}
	function updateobj(){
		$params = $this->input->post();
		echo $this->product->updateproduct($params);
	}		
	function websetting(){
		check_login();
		$objs = $this->websetting->populate();
		$data = array('objs'=>$objs);
		$this->load->view('admin/websetting',$data);
	}  
	function users(){
		check_login();
		$objs = $this->user->populate();
		$data = array('objs'=>$objs);
		$this->load->view('admin/users/users',$data);
	}

	function user_add(){
		check_login();
		$this->load->view('admin/user_add');
	}

	function user_edit(){
		check_login();
		$id = $this->uri->segment(3);
		$data = array('obj'=>User::getuser($id));
		$this->load->view('admin/user_edit',$data);
	}

	function user_edit_handler(){
		check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			user::edit($params);
		}
		redirect('admin/users');
	}

	function user_handler(){
		check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			user::add($params);
		}
		redirect('admin/users');
	}

	function user_remove(){
		check_login();
		$params = $this->input->post();
		$obj = new User();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}

	function user_upload_tmp(){
		check_login();
		$uploaddir = './media/users/';
		$file = $uploaddir . basename($_FILES['uploadfile']['name']);

		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
			echo "success";
		} else {
			echo "error";
		}
	}  
	function addtosession(){
		$params = $this->input->post();
		$found = false;
		if(isset($_SESSION["cart"])){
			foreach($_SESSION["cart"] as $key=>$val){
				if($val["id"]===$params["id"]){
					$found = true;
					if(trim($params["operation"])==="inc"){
						$_SESSION["cart"][$key]["amount"]+=1;
					}else{
						$_SESSION["cart"][$key]["amount"]-=1;
					}
					$_SESSION["cart"][$key]["sellingprice"]+=$val["sellingprice"];
				}
			}
			if(!$found){
				array_push($_SESSION["cart"],array('id'=>$params["id"],'name'=>$params["name"],'amount'=>$params["amount"],'sellingprice'=>$params["sellingprice"],'unit'=>$params['unit'],'productimage'=>$params["productimage"]));
			}
		}
		else
		{
			$_SESSION["cart"] = array(array('id'=>$params["id"],'name'=>$params["name"],'amount'=>$params["amount"],'sellingprice'=>$params["sellingprice"],'unit'=>$params['unit'],'productimage'=>$params["productimage"]));
		}
		echo $params['operation'];
	}
	function getsession(){
		if(isset($_SESSION["cart"])){
			$carts = $_SESSION["cart"];
			print_r($carts);
		}else{
			echo "ora ono";
		}
	}
	function showcart(){
		if(isset($_SESSION["cart"])){
			$carts = $_SESSION["cart"];
			foreach($carts as $cart){
				echo "id ".$cart["id"]."<br />";
				echo "name ".$cart["name"]."<br />";
				echo "amount ".$cart["amount"]."<br />";
				echo "price ".$cart["sellingprice"]."<br />";
				echo "Unit ".$cart["unit"]."<br />";
			}
		}else{
			echo "ora ono";
		}		
	}
	function resetsession(){
		session_destroy();
	}
	function orders(){
		$id = $this->uri->segment(3);
		$data = array("objs"=>$this->purchaseorder->getdetailbyorderid($id),"cust"=>$this->purchaseorder->getbyid($id));
		$this->load->view("admin/orders/orders",$data);
	}
	function product_edit(){
		$id = $this->uri->segment(3);
		$sql = "select id,img,description from product_images where product_id=".$id;
		$que = $this->db->query($sql);
		$data["objs"] = $que->result();
		$this->load->view("admin/products/edit",$data);
	}
}