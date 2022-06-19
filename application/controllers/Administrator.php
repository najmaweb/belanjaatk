<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        redirect("/administrator/products");
    }
    function products(){
        $par = $this->uri->segment(3);
        switch($par){
            case "index":
                $data = array("objs"=>$this->product->getproduct());
                $this->load->view("administrator/products/index",$data);
                break;
            case "add":
                $data = array("title"=>"Belanjaatk | Administrator, penambahan produk",
                    "categories"=>$this->category->getarray()
                );
                $this->load->view("administrator/products/add",$data);
            break;
            case "edit":
                $data = array(
                    "obj"=>$this->product->getproduct($par),
                    "title"=>"Belanjaatk | Administrator, penyuntingan produk",
                    "categories"=>array(
                                            "1"=>"Perlengkapan Kantor",
                                            "2"=>"Alat Tulis & Kertas",
                                            "3"=>"Toner & Cartridge",
                                            "4"=>"Perlengkapan Rumah Tangga",
                                            "5"=>"Aksesoris Komputer",
                                            "6"=>"Furniture Kantor",
                                        )
                );
                $this->load->view("administrator/products/edit",$data);
            break;
            case "remove":
            break;
            default:
                $data['objs'] = $this->product->populate("",1,10)["result"];
                $this->load->view("administrator/products/products",$data);
            break;
        }
    }
    function handler(){

    }
}