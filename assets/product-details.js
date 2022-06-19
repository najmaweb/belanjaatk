console.log("test product-deltail");
$(".btnaddtocart").click(function(){
    console.log("cart saved");
    obj = $(this).stairUp({level:1});
    $.ajax({
        url:"/admin/addtosession",
        data:{
            id:obj.find(".cartproductname").attr("myid") ,
            name:obj.find(".cartproductname").html(),
            amount:1,
            sellingprice:obj.find(".cartproductname").attr("mysellingprice")
        },
        type:'post'
    });
});