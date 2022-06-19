$("#btnsaveorder").click(function(){
    $.ajax({
        url:"/home/saveorder",
        data:{member_id:'1',
            username:$('#username').val(),
            destinationname:$('#dstname').val(),
            address:$('#dstaddress').val(),
            city:$('#dstcity').val(),
            telp:$('#dsttelp').val(),
            mobilephone:'',
            email:$('#email').val(),
            description:''},
        type:"post"
    })
    .done(function(_checkout_id){
        $("#tdetails tbody tr").each(function(){
            that = $(this);
            _product_id = that.attr("myid");
            _productname = that.find(".productname").html();
            _sellprice = that.find(".cart_price").attr("sellprice");
            _amount = that.find(".cart_quantity_input").val();
            _total = that.find(".cart_total").attr("rawprice");
            $.ajax({
                url:'/home/saveorderdetail',
                data:{
                    checkout_id:_checkout_id,
                    product_id:_product_id,
                    productname:_productname,
                    sellprice:_sellprice,
                    amount:_amount,
                    total:_total,
                    productimage:''
                },
                type:'post'
            })
            .done(function(detailres){
                console.log(detailres);
                console.log("Email of cust",$("#email").val());
                $.ajax({
                    url:'/home/sendcustomermail',
                    type:'post',
                    data:{
                        name:$('#dstname').val(),
                        email:$('#email').val(),
                        message:'pembelian barang',
                        orderid:_checkout_id
                    }
                })
                .done(function(res){
                    console.log("res"+res);
                    window.location.href = "/home/checkoutfinished";
                })
                .fail(function(err){
                    console.log("Error Customer Mail",err);
                });
            })
            .fail(function(err){
                console.log("Err Save Order Detail",err);
            });
        });
    })
    .fail(function(err){
        console.log("Err Save Order",err);
    });
});
$(".cart_quantity_down").click(function(){
    
    console.log("cart quantity down clicked");
    prevquantity = tr.find(".cart_quantity_input").val();
    if(prevquantity>1){
        tr = $(this).stairUp({level:3});
        price = parseInt(tr.find(".cprice").attr("sellprice"));
        console.log("cart_quantity_up clicked");
        tr.find(".cart_total_price").attr("totprice",1*tr.find(".cart_total_price").attr("totprice")-1*price) ;
        tot = tr.find(".cart_total_price").attr("rawprice");
        tr.find(".cart_total_price").html(tot);
        tr.find(".cart_quantity_input").val(1*prevquantity-1);
    }
});
$(".cart_quantity_up").click(function(){
    tr = $(this).stairUp({level:3});
    price = parseInt(tr.find(".cprice").attr("sellprice"));
    console.log("cart_quantity_up clicked");
    tr.find(".cart_total_price").attr("totprice",1*tr.find(".cart_total_price").attr("totprice")+1*price) ;
    tot = tr.find(".cart_total_price").attr("totprice");
    tr.find(".cart_total_price").html(tot);
    prevquantity = tr.find(".cart_quantity_input").val();
    tr.find(".cart_quantity_input").val(1+1*prevquantity);
});