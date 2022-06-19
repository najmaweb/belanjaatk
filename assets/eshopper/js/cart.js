$.fn.applydecimal = function(options){
    var settings = $.extend({
        pointchar:"."
    },options),
    that = $(this),
    rawval = that.html();
    str = '';
    c = 0;
    for(x=rawval.length-1;x>=0;x--){
        if(((c) % 3)===0&&c>0){
            str=','+str;
        }
        str=rawval[x]+str;
        c = c +1;
        console.log("str:"+x+":",str);
    }
    that.html(str);
    return that;
}
$.fn.addCurrencySymbol = function(options){
    var settings = $.extend({
        cSymbol:'Rp'
    },options);
    that = $(this);
    that.html(settings.cSymbol+" "+that.html());
    return that;
}
$(".cart_quantity_down").click(function(){
    console.log("cart quantity down clicked");
    tr = $(this).stairUp({level:3});
    prevquantity = tr.find(".cart_quantity_input").val();
    if(prevquantity>1){
        price = parseInt(tr.find(".cprice").attr("sellprice"));
        console.log("cart_quantity_up clicked");
        tot = 1*tr.find(".cart_total_price").attr("totprice")-1*price;
        tr.find(".cart_total_price").attr("totprice",1*tr.find(".cart_total_price").attr("totprice")-1*price) ;
        sellprice = tr.find(".cprice").attr("sellprice");
        myid = tr.attr("cartid");
        tr.find(".cart_total_price").html(tot).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        tr.find(".cart_quantity_input").val(1*prevquantity-1);
        prc = parseInt($("#subtotal").attr("oritotal"));
        prc-= sellprice;
        total = Math.floor(prc*1.1);

        $("#subtotal").attr("oritotal",prc);
        $("#subtotal").html(prc).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        $("#fvat").html(prc*0.1).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        $("#ftotal").html(total).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        addtocart(myid,sellprice,"dec");
    }
});
$(".cart_quantity_up").click(function(){
    tr = $(this).stairUp({level:3});
    price = parseInt(tr.find(".cprice").attr("sellprice"));
    oriprice = parseInt(tr.find(".cprice").attr("oriprice"));
    quantity = (tr.find(".cart_quantity_input").val()*1)+1;
    console.log(quantity);
    finalprice = (oriprice*quantity);
    sellprice = tr.find(".cprice").attr("sellprice");
    myid = tr.attr("cartid");
    //console.log(finalprice);
    //console.log("cart_quantity_up clicked");
    console.log("Myid",myid);
    console.log("Sellprice",sellprice);
    tr.find(".cart_total_price").attr("totprice",1*tr.find(".cart_total_price").attr("totprice")+1*price) ;
    tot = tr.find(".cart_total_price").attr("totprice");
    tr.find(".cart_total_price").html(finalprice).applydecimal().addCurrencySymbol();
    prevquantity = tr.find(".cart_quantity_input").val();
    tr.find(".cart_quantity_input").val(1+1*prevquantity);
    prc = 0;
    $("#totalcart tbody tr").each(function(x,y){
        prc += parseInt($(this).find(".totprice").attr("totprice"));
    })
    total = Math.floor(prc*1.1)
    $("#subtotal").attr("oritotal",prc);
    $("#subtotal").addClass("number").addClass("cart_total_price");
    $("#subtotal").html(prc).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
    $("#fvat").html(prc*0.1).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
    $("#ftotal").html(total).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
    addtocart(myid,sellprice,"inc");
});
$(".cart_quantity_delete").click(function(){
    r = $(this).stairUp({level:2});
    myid = r.attr("cartid");
    myname = r.find(".cartname").html();
    myquantity = r.find(".cart_quantity_input").val();
    myprice = r.find(".cprice").attr("sellprice");
    myimg = r.find(".img").attr("src");
    $.ajax({
        url:'/home/deletecart',
        data:{id:myid,name:myname,amount:myquantity,sellingprice:myprice,productimage:myimg},
        type:'post'
    })
    .done(function(res){
        subtotal = $("#subtotal").attr("oritotal");
        rowtotal = r.find(".cart_total_price").attr("totprice");
        subtotal = subtotal - rowtotal;
        $("#subtotal").attr("oritotal",subtotal);
        $("#subtotal").html(subtotal).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        prc = parseInt($("#subtotal").attr("oritotal"));
        total = Math.floor(prc*1.1)
        $("#fvat").html(prc*0.1).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        $("#ftotal").html(total).applydecimal().addCurrencySymbol().addClass("number").addClass("cart_total_price");
        r.remove();
    })
    .fail(function(err){
        alert(err);
        console.log("Err remove",err);
    });
});
addtocart = function(commodity_id,commodity_sellingprice,saveoperation){
    console.log("cart saved");
    $.ajax({
        url:"/admin/addtosession",
        data:{
            id:commodity_id ,
            amount:1,
            sellingprice:commodity_sellingprice,
            unit:"buah",
            operation:saveoperation
        },
        type:'post'
    })
    .done(function(res){
        console.log("Addtocart result",res);
    })
    .fail(function(err){
        alert("Addtocart Err"+err);
    });
};