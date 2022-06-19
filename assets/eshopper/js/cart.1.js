$.fn.applydecimal = function(options){
    var settings = $.extend({
        pointchar:"."
    },options);
    that = $(this);
    rawval = $(this).html();
    str = '';
    for(x=rawval.length-1;x>=0;x--){
        ur = (x+1)%3;
        //alert(x+' : '+ur);
        str=rawval[x]+str;
        if(((x) % 3)===0){
            //alert(x.toString() +" : "+ rawval[x].toString());
            str=','+str;
        }
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
        tr.find(".cart_total_price").html(tot).applydecimal();
        tr.find(".cart_quantity_input").val(1*prevquantity-1);
        prc = parseInt($("#subtotal").attr("oritotal"));
        prc-= sellprice;
        $("#subtotal").attr("oritotal",prc);
        $("#subtotal").html(prc).applydecimal();
        $("#fsubtotal").html(prc).applydecimal().addCurrencySymbol();
        $("#fvat").html(prc*0.1).applydecimal().addCurrencySymbol();
        $("#ftotal").html(prc*1.1).applydecimal().addCurrencySymbol();
    }
});
$(".cart_quantity_up").click(function(){
    tr = $(this).stairUp({level:3});
    price = parseInt(tr.find(".cprice").attr("sellprice"));
    oriprice = parseInt(tr.find(".cprice").attr("oriprice"));
    quantity = (tr.find(".cart_quantity_input").val()*1)+1;
    alert(quantity);
    finalprice = (oriprice*quantity);
    alert(finalprice);
    console.log("cart_quantity_up clicked");
    tr.find(".cart_total_price").attr("totprice",1*tr.find(".cart_total_price").attr("totprice")+1*price) ;
    tot = tr.find(".cart_total_price").attr("totprice");
    tr.find(".cart_total_price").html(finalprice).applydecimal();
    prevquantity = tr.find(".cart_quantity_input").val();
    tr.find(".cart_quantity_input").val(1+1*prevquantity);
    prc = 0;
    $("#totalcart tbody tr").each(function(x,y){
        prc += parseInt($(this).find(".cart_total_price").attr("totprice"));
    })
    $("#subtotal").attr("oritotal",prc);
    $("#subtotal").html(prc).applydecimal();
    $("#fsubtotal").html(prc).applydecimal().addCurrencySymbol();
    $("#fvat").html(prc*0.1).applydecimal().addCurrencySymbol();
    $("#ftotal").html(prc*1.1).applydecimal().addCurrencySymbol();
});
$(".cart_quantity_delete").click(function(){
    r = $(this).stairUp({level:2});
    myid = r.find(".cartid").html();
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
        $("#subtotal").html(subtotal).applydecimal().addCurrencySymbol();
        r.remove();
    })
    .fail(function(err){
        alert(err);
        console.log("Err remove",err);
    });
});
