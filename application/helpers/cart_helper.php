<?php
function get_cart(){

}
function get_subtotal(){
    if(isset($_SESSION["cart"])){
    $carts = $_SESSION["cart"];
    $tot = 0;
    foreach($carts as $cart){
        $tot+= $cart["sellingprice"];
    }}else{
        $tot = 0;
    }
    return $tot;
}
function get_total(){
    if(isset($_SESSION["cart"])){
    $carts = $_SESSION["cart"];
    $tot = 0;
    foreach($carts as $cart){
        $tot+= $cart["sellingprice"];
    }}else{
        $tot = 0;
    }
    return $tot*1.1;
}
function get_shipping(){
    return number_format(0,2);
}
function get_vat(){
    if(isset($_SESSION["cart"])){
    $carts = $_SESSION["cart"];
    $tot = 0;
    foreach($carts as $cart){
        $tot+= $cart["sellingprice"];
    }}else{
        $tot = 0;
    }
    return $tot*0.1;
}
