$.fn.hideafter = function(options){
	var settings = $.extend({
		timeout:2000,
		nexturl:'null'
	}
	,options);
	mydiv = $(this);
	setTimeout(function(){
		mydiv.modal('hide');
		if(settings.nexturl!='null'){
			window.location.href = settings.nexturl;
		}
	},settings.timeout);
}

$(".btnaddtocart").click(function(){
    console.log("cart saved");
    obj = $(this).stairUp({level:1});
    $.ajax({
        url:"/admin/addtosession",
        data:{
            id:obj.find(".cartproductname").attr("myid") ,
            name:obj.find(".cartproductname").html(),
            productimage:obj.find(".pimage").attr("src"),
            amount:1,
            unit:obj.find(".cartproductname").attr("unitname"),
            sellingprice:obj.find(".cartproductname").attr("mysellingprice"),
            operation:"inc"
        },
        type:'post'
    })
    .done(function(xxx){
        console.log("Operation",xxx);
        $.ajax({
            url:'/home/cart_notify',
            type:'post'
        })
        .done(function(res){
            //alert (res);
            $("#totalcart").html(res);

            $("#confirmationproductname").html(obj.find(".cartproductname").html());
            $("#confirmationproductname").css("color","red");
            $("#myModal").modal().hideafter({timeout:3000});


        })
        .fail()
        })
    .fail(function(err){
        console.log("Err",err);
    });
});