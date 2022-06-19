(function($){
    $.ajax({
        url:'/home/cart_notify',
        type:'post'
    })
    .done(function(res){
        //alert (res);
        $("#totalcart").html(res);
    })
    .fail()
    console.log("test cart-notifie");
}(jQuery))