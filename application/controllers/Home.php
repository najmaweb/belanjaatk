<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function category(){
		$urisegment = $this->uri->segment(3);
		$arr = explode("-",$urisegment);
		$id = $arr[0];
		
		if ($this->uri->total_segments()===5){
			$category = $id;//$this->uri->segment(3);
			$segment = $this->uri->segment(4);
			$offset = $this->uri->segment(5);
		}else{
			$category = $id;$segment = 0;$offset = 9;
			$startpagination = 1;
			$endpagination = 5;
		}
		$products = $this->product->populate($category,$segment,$offset);
		$numrows = $this->product->getcount($category);
		if((intval($segment)/9)>1){
			$startpagination = (intval($segment)/9)-1;
			$endpagination = (intval($segment)/9)+3;
		}elseif((intval($segment)/9)===1){
			$startpagination = 1;
			$endpagination = 5;
		}
		if((intval($segment)/9)>=($numrows-3)){
			$startpagination = (intval($segment)/9)-1;
			$endpagination = (intval($segment)/9)+3;
			$endpagination = $numrows;
		}
		$websetting = $this->websetting->getdefault();
		if(intval($segment)===4){
			$startpagination = $startpagination+1;
			$endpagination = $endpagination+1;
		}
		$data = array(
			'products'=>$products["result"],
			'num_rows'=>$numrows,
			'websetting'=>$websetting,
			'page'=>$segment,
			'id'=>$id,
			'startpagination'=>$startpagination,
			'endpagination'=>$endpagination,
			'title'=>'Belanjaatk'
		);
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";		
		$this->load->view("front/shop",$data);
	}
	function deletecart(){
		$params = $this->input->post();
		foreach($_SESSION['cart'] as $key=>$val){
			if($val["id"]==$params['id']){
				unset($_SESSION['cart'][$key]);
			}
		}
	}
	function tesdeletecart(){
		foreach($_SESSION['cart'] as $key=>$val){
			if($val["id"]=='5'){
				unset($_SESSION['cart'][$key]);
			}
		}
	}
	function login_(){
		$this->load->view("login");
	}
	function logout(){
		$this->auth->log_out();
	}
	function register(){
		$this->load->view("register");
	}
	function rawwithpagination(){
		$this->load->helper("product");
		$page = $this->uri->segment(3);
		$items = 4;
		$segment1 = ($page-1)*$items*2+1;
		$segment2 = $page*$items*2+1;
		$data["row1"] = getproducts($segment1,$items);
		$data["row2"] = getproducts($segment2,$items);
		$data["maxpagin"] = 5;
		$data["totalpage"] = gettotalpage();
		$this->load->view("rawwithpagination",$data);
	}
	function cari(){
		$this->load->helper("product");
		$page = $this->uri->segment(4);
		$name = $this->uri->segment(3);
		$items = 4;
		$segment1 = ($page-1)*$items*2+1;
		$segment2 = $page*$items*2+1;
		$data["row1"] = getproducts($segment1,$items,$name);
		$data["row2"] = getproducts($segment2,$items,$name);
		$data["totalpage"] = gettotalpage();
		$this->load->view("rawwithpagination",$data);
	}
	function createuser(){
		$name = $_POST["name"];
		$password = $_POST["password"];
		$email = $_POST["email"];

		$this->load->library("Auth");
		
		echo $this->auth->create_custom_user($name, $password, $email,"umum") ;
	}
	function about(){
		$data["title"] = "Cara Belanja";
		$this->load->view('home/about',$data);
	}
	function carabelanja(){
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data["title"] = "Cara Belanja";
		$this->load->view("front/carabelanja",$data);
	}
	function cart(){
		if(isset($_SESSION["cart"])){
			$carts = $_SESSION["cart"];
		}else{
			$carts = array();
		}			
		$data["carts"] = $carts;	
		$data["sub_total"] = get_subtotal();
		$data["total"] = get_total();
		$data["vat"] = get_vat();
		$data["shipping"] = get_shipping();
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data["title"] = "Cart";
		$this->load->view("front/cart",$data);
	}
	function cart_notify(){
		$to_show = "total";
		$tot = 0;
		if(isset($_SESSION["cart"])){
			foreach($_SESSION["cart"] as $cart){
				$tot+=$cart["sellingprice"];
			}
			switch ($to_show){
				case "total":
				echo number_format($tot);
				break;
				case "count":
				echo count($_SESSION["cart"]);
				break;
			}
		}else{
			echo "";
		}
	}
	function checkout(){
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data['memberemail']=(isset($_SESSION["memberemail"]))?$_SESSION["memberemail"]:"";
		
		if(isset($_SESSION["cart"])){
			$carts = $_SESSION["cart"];
		}else{
			$carts = array();
		}			
		$data["carts"] = $carts;
		$data["title"] = "Checkout";
		if(isset($_SESSION["membername"])){
			$this->load->view("front/checkout",$data);
		}else{
			$this->load->view("front/checkoutnewuser",$data);
		};
	}
	function contact(){
		$product = new Category();
		$product->where('ctype','1')->get();
		$websetting = new Websetting();
		$websetting->where("isdefault","1")->get();
		$data = array(
			'products'=>$product,
			'websetting'=>$websetting
		);
		$data["title"] = "Kontak";
		$this->load->view('contact',$data);
	}
	function contactus(){
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data['memberemail']=(isset($_SESSION["memberemail"]))?$_SESSION["memberemail"]:"";
		
		if(isset($_SESSION["cart"])){
			$carts = $_SESSION["cart"];
		}else{
			$carts = array();
		}			
		$data["carts"] = $carts;
		$data["title"] = "Kontak Kami";
		$this->load->view("front/contact-us",$data);
	}	
	function index_old(){
		$products = $this->product->populate();
		$websetting = $this->websetting->getdefault();
		$data = array(
			'products'=>$products,
			'websetting'=>$websetting
		);
		$data["title"] = "Belanja ATK";
		$this->load->view('front/front',$data);
	}
	function login(){
		$data = array(
				'islogged'=>(isset($_SESSION["membername"]))?true:false,
				'username'=>(isset($_SESSION["membername"]))?$_SESSION["membername"]:'',
			);
		$data["title"] = "Belanja ATK";
		if(!isset($_SESSION["membername"])){
			$this->load->view("front/login",$data);
		}else{
			redirect ("/");
		}
	}
	function getproducts(){
		$segment = $this->uri->segment(4);
		$offset = $this->uri->segment(3);
		$products = new Category();
		$products->where('ctype','1')->get($segment,$offset);
		$arr = array();
		foreach($products as $product){
			array_push($arr,'{"name":"'.$product->name.'","sellingprice":"'.$product->sellingprice.'","alterprice":"'.$product->alterprice.'","image":"'.$product->image.'"}');
		}
		echo '['.implode(",",$arr).']';
	}
	function getnewrelease(){
		$products = new Category();
		$products->where('ctype','1')->get();
		$arr = array();
		foreach($products as $product){
			array_push($arr,'{"name":"'.$product->name.'","sellingprice":"'.$product->sellingprice.'","image":"'.$product->image.'"}');
		}
		echo '['.implode(",",$arr).']';		
	}
	function getvideo(){
		 $path = base_url() . 'media/tvc.mp4';
		 if (file_exists($path)){
			$size=filesize($path);
			$fm=@fopen($path,'rb');
			if(!$fm) {
			// You can also redirect here
				header ("HTTP/1.0 404 Not Found");
				die();
			}
			 $begin=0;
			 $end=$size;
			 if(isset($_SERVER['HTTP_RANGE'])) {
			 if(preg_match('/bytes=\h*(\d+)-(\d*)[\D.*]?/i',   
			 $_SERVER['HTTP_RANGE'],$matches)){
			 $begin=intval($matches[0]);
			 if(!empty($matches[1])) {
			 $end=intval($matches[1]);
			 }
		 }
		 }
		 if($begin>0||$end<$size)
		 header('HTTP/1.0 206 Partial Content');
		 else
		 header('HTTP/1.0 200 OK');
		 header("Content-Type: video/mp4");
		 header('Accept-Ranges: bytes');
		 header('Content-Length:'.($end-$begin));
		 header("Content-Disposition: inline;");
		 header("Content-Range: bytes $begin-$end/$size");
		 header("Content-Transfer-Encoding: binary\n");
		 header('Connection: close');
		 $cur=$begin;
		 fseek($fm,$begin,0);
		 while(!feof($fm)&&$cur<$end&&(connection_status()==0))
		 { print fread($fm,min(1024*16,$end-$cur));
		 $cur+=1024*16;
		 usleep(1000);
		 }
		 die();
		 }
 
	}
	function products(){
		$data["title"] = "Poduk-produk";
		$this->load->view('front/product');
	}
	function productdetails(){
		$id = $this->uri->segment(3);
		$obj = getproduct($id);
		$data = array("obj"=>$obj);
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data['memberemail']=(isset($_SESSION["memberemail"]))?$_SESSION["memberemail"]:"";
		$data["title"] = "Detail Produk";
		$this->load->view('front/product-details',$data);
	}	
	function sendmail(){
		$params = $this->input->post();
		$text = '';
		$text.= 'Anda mendapat email dari ' . $params["name"] . ' ';
		$text.= ' (' . $params["email"] . ') <br />';
		$text.= 'Isi email : <br/> ' . $params["message"] . ' ';
		
		$mailconfig['protocol'] = "smtp";
		$mailconfig['smtp_host'] = "mail.belanjaatk.co.id";
		$mailconfig['smtp_port'] = "25";
		$mailconfig['charset'] = "utf-8";
		$mailconfig['mailtype'] = "html";
		$mailconfig['newline'] = "\r\n";
		$this->email->initialize($mailconfig);
		$this->email->from('surya_kawitan@belanjaatk.co.id', 'Admin belanjaatk');
		$this->email->to('surya_kawitan@belanjaatk.co.id');		
		$this->email->bcc('pw.prayitno@gmail.com');

		$this->email->cc('surya_kawitan@yahoo.com');

		$this->email->bcc(array('pw.prayitno@yahoo.co.id','pw.prayitno@gmail.com'));
		$this->email->attach("./media/products/1.jpg");

		$this->email->subject('[belanjaatk.co.id] Email dari Visitor');
		$this->email->message($text);
		$this->email->send();		
		header("Location:http://belanjaatk.co.id/home/thankyou");		
	}
	function signin(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		if($this->auth->log_in($username,$password)!==false){
			redirect(base_url());
		}else{
			echo "password salah";
		}
	}
	function do_upload(){
		$config['upload_path'] = './media/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "Silakan memilih file yang hendak diupload";
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			echo "sukses";
			redirect("http://belanjaatk.co.id/home/contact");
		}	
	}
	function index(){
		$urisegment = $this->uri->segment(3);
		$arr = explode("-",$urisegment);
		$id = $arr[0];
		if ($this->uri->total_segments()===5){
			$category = $this->uri->segment(3);
			$segment = $this->uri->segment(4);
			$offset = $this->uri->segment(5);
		}else{
			$category = 2;$segment = 0;$offset = 9;
			$startpagination = 1;
			$id=2;
			$endpagination = 5;
		}
		$products = $this->product->populate($category,$segment,$offset);
		$numrows = $this->product->getcount($category);
		if((intval($segment)/9)>1){
			$startpagination = (intval($segment)/9)-1;
			$endpagination = (intval($segment)/9)+3;
		}elseif((intval($segment)/9)===1){
			$startpagination = 1;
			$endpagination = 5;
		}
		if((intval($segment)/9)>=($numrows-3)){
			$startpagination = (intval($segment)/9)-1;
			$endpagination = (intval($segment)/9)+3;
		}
		
		$websetting = $this->websetting->getdefault();
		if(intval($segment)===4){
			$startpagination = $startpagination+1;
			$endpagination = $endpagination+1;
		}
		$data = array(
			'products'=>$products["result"],
			'num_rows'=>$numrows,
			'websetting'=>$websetting,
			'page'=>$segment,
			'id'=>$id,
			'startpagination'=>$startpagination,
			'endpagination'=>$endpagination,
			'islogged'=>(isset($_SESSION["membername"]))?true:false,
			'username'=>(isset($_SESSION["membername"]))?$_SESSION["membername"]:'',
		);
		$data["title"] = "Belanja ATK";
		$this->load->view("front/shop",$data);
	}
	function thankyou(){
		$data["title"] = "Belanja ATK";
		$this->load->view("thankyou");
	}
	function uploadhandler(){
	$uploaddir = './media/';
	$file = $uploaddir . basename($_FILES['uploadfile']['name']);
	if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)){
		echo "success";
	}else{
		echo "error";
	}
	
	}
	function mailsender(){
		$params = $this->input->post();
		$text = '';
		$text.= 'Isi email : <br/> ' . $params["mailcontent"] . ' ';
		
		$mailconfig['protocol'] = "smtp";
		$mailconfig['smtp_host'] = "mail.belanjaatk.co.id";
		$mailconfig['smtp_port'] = "25";
		$mailconfig['charset'] = "utf-8";
		$mailconfig['mailtype'] = "html";
		$mailconfig['newline'] = "\r\n";
		$this->email->initialize($mailconfig);
		$this->email->from('surya_kawitan@belanjaatk.co.id', 'Admin belanjaatk');
		$this->email->to('surya_kawitan@belanjaatk.co.id');		
		$this->email->bcc('puji@padi.net.id');
		$this->email->bcc(array('pw.prayitno@yahoo.co.id','pw.prayitno@gmail.com'));
		$this->email->attach("./media/".$params["filename"]);

		$this->email->subject('[belanjaatk.co.id] Email dari Visitor');
		$this->email->message($text);
		$this->email->send();		
		echo $text;
		//header("Location:http://belanjaatk.co.id/home/thankyou");		
	}
	function result(){
		$this->load->helper("product");
		$data['objs'] = result(1,4,$this->uri->segment(3));
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$data["title"] = "Hasil Pencarian";
		$this->load->view("front/blog",$data);
	}
	function signuphandler(){
		$this->load->helper('string');
		$params = $this->input->post();
		$username = $params["signupname"] ;
		$email = $params["signupemail"] ;
		$password =  $params["signuppassword"] ;
		$salt = random_string('alnum',32);
		$password = sha1($password.$salt);
		$sql = "insert into members ";
		$sql.= "(nname,email,password,salt) ";
		$sql.= "values ";
		$sql.= "('".$username."','".$email."','".$password."','".$salt."')";
		$this->db->query($sql);
		redirect("/");
	}
	function sign_in(){
		$params = $this->input->post();
		if(isset($params["loginemail"])){
		$email = $params["loginemail"] ;
		$password =  $params["loginpassword"] ;
		$sql = "select nname,email,salt,password from members ";
		$sql.= "where email = '" . $email . "'";
		$res = $this->db->query($sql);
		if($res->num_rows()>0){
			$row = $res->result()[0];
			if(sha1($password.$row->salt)===$row->password){
				$_SESSION["membername"]= $row->nname;
				$_SESSION["memberemail"]= $row->email;
				redirect("/home");
			}else{
				echo "tidak sukses";
			}
		}else{
			echo "email tidak dikenali";
		}}else{
			redirect("/home/login");
		}
	}
	function emailtidakdikenali(){
		$data['islogged']=(isset($_SESSION["membername"]))?true:false;
		$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
		$this->load->view("front/emailtidakdikenali",$data);
	}
	function showsession(){
		echo date("d M Y",strtotime("+2 day"));
		$obj = $_SESSION["cart"];
		print_r($obj);
		foreach($obj as $cart){
			echo $cart["name"]. " " . $cart["amount"]. " " . $cart["sellingprice"].  "<br />";
		}
	}
	function saveorder(){
		$params = $this->input->post();
		$sql = "insert into checkouts ";
		$sql.= "(username,destinationname,address,city,email) ";
		$sql.= "values";
		$sql.= "('".$params['username']."',";
		$sql.= "'".$params['destinationname']."',";
		$sql.= "'".$params['address']."',";
		$sql.= "'".$params['city']."',";
		$sql.= "'".$params['email']."') ";
		$que = $this->db->query($sql);
		echo $this->db->insert_id();
	}
	function saveorderdetail(){
		$params = $this->input->post();
		$sql = "insert into checkoutdetails ";
		$sql.= "(checkout_id,product_id,productname,sellprice,amount,total) ";
		$sql.= "values";
		$sql.= "('".$params['checkout_id']."',";
		$sql.= "'".$params['product_id']."',";
		$sql.= "'".$params['productname']."',";
		$sql.= "'".$params['sellprice']."',";
		$sql.= "'".$params['amount']."',";
		$sql.= "'".$params['total']."') ";
		$que = $this->db->query($sql);
		echo $sql;
	}
	function sendcustomermail(){
		$params = $this->input->post();
		$text = 'Dear, ' . $params["name"] . '';
		$text.= ' (' . $params["email"] . ') <br />';
		$text.= 'Detail Order Pembelian anda adalah sebagai berikut : ';
//		$text.= 'Isi email : <br/> ' . $params["message"] . '<br /> ';
		$text.= $this->receipt();
		$text.= "</br>";
		$text.= "ID Pemesanan anda adalah " . $params["orderid"] . "<br />";
		$_SESSION["orderid"] = $params["orderid"];
		$text.= "Silakan melakukan transfer pembayaran ke <br />";
		$text.= "Bank Mandiri no rek. 142-00-2403063-6<br />";
		$text.= "Paling lambat 2 hari setelah pemesanan (".date("d M Y",strtotime("+2 day")).")<br />";
		
		$text.= "atas nama cv Surya Kawitan <br />";
//		$text.= "Tautan aplikasi: http://belanjaatk.co.id/admin/orders/".$params["orderid"];
		$mailconfig['protocol'] = "smtp";
		$mailconfig['smtp_host'] = "mail.belanjaatk.co.id";
		$mailconfig['smtp_port'] = "25";
		$mailconfig['charset'] = "utf-8";
		$mailconfig['mailtype'] = "html";
		$mailconfig['newline'] = "\r\n";
		$this->email->initialize($mailconfig);
		$this->email->from('surya_kawitan@belanjaatk.co.id', 'Admin belanjaatk');
		$this->email->to($params["email"]);		
		$this->email->bcc('pw.prayitno@gmail.com');
		$this->email->cc('surya_kawitan@yahoo.com');
		$this->email->bcc(array('pw.prayitno@yahoo.co.id','pw.prayitno@gmail.com'));
		$this->email->attach("./media/logo.png");
		$this->email->subject('[belanjaatk.co.id] Order Pembelian');
		$this->email->message($text);
		$this->email->send();
		echo $params["email"];
	}
	function checkoutfinished(){
		if(isset($_SESSION['cart'])){
			$data["detailorder"] = $this->receipt();
			$data["orderid"] = (isset($_SESSION["orderid"])?$_SESSION["orderid"]:"");
			$data["title"] = "Check Out selesai";
			unset($_SESSION["orderid"]);
			foreach($_SESSION['cart'] as $key=>$val){
				unset($_SESSION['cart'][$key]);
			}
			$data['islogged']=(isset($_SESSION["membername"]))?true:false;
			$data['username']=(isset($_SESSION["membername"]))?$_SESSION["membername"]:"";
			$this->load->view("front/checkoutfinished",$data);
		}else{
			redirect("/");
		}
	}
	function getcarts(){
		foreach($_SESSION["cart"] as $key=>$val){
			echo $key . " and <br />";
			foreach($val as $a=>$b){
				echo $a . " and " . $b . "<br />";
			}
		}
	}
	function receipt(){
		$text = "<table>";
		$text.= "<thead>";
		$text.= "<tr>";
		$text.= "<th>No</th><th>Item</th><th>Jumlah</th><th>Harga</th>";
		$text.= "</tr>";
		$text.= "</thead>";
		$text.= "<tbody>";
		$amount = 0;$sellingprice=0;
		foreach($_SESSION["cart"] as $key=>$item){
			$no = $key+1;
			$text.= "<tr>";
			$text.= "<td>" . $no . ".</td>";
			$text.= "<td>" . $item["name"] . "</td>";
			$text.= "<td>" . $item["amount"] . "</td>";
			$text.= "<td style='text-align:right'>Rp. " . number_format($item["sellingprice"]) . "</td>";
			$text.= "</tr>";
			$amount+=$item["amount"];
			$sellingprice+=$item["sellingprice"];
		}
		$text.= "</tbody>";
		$text.= "<tfoot>";
		$text.= "<tr>";
		$text.= "<td colspan=3 style='border-top:1px solid black'>Sub Total</td><td style='text-align:right;border-top:1px solid black'>Rp. ".number_format($sellingprice)."</td>";
		$text.= "</tr>";
		$text.= "<tr>";
		$text.= "<td colspan=3>PPn</td><td style='text-align:right'>Rp. ".number_format($sellingprice*0.1)."</td>";
		$text.= "</tr>";
		$text.= "<tr>";
		$text.= "<td colspan=3>Total</td><td style='text-align:right;border-bottom:1px solid black'>Rp. ".number_format($sellingprice*1.1)."</td>";
		$text.= "</tr>";
		$text.= "</tfoot>";
		$text.="</table>";
		return $text;
	}
}