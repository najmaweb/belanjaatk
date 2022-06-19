$(document).ready(function(){
	$(".btnsavetroubleshoot").click(function(){
		$.post(thisdomain+'adm/troubleshootadd',{client_id:$("#workplace").attr("client_id"),sales_id:'',pic_name:$("#pic_name").val(),pic_phone_area:$("#pic_phone_area").val(),pic_phone:$("#pic_phone").val(),pic_position:$('#pic_position').val(),pic_email:$('#pic_email').val(),address:$("#address").val(),request_date1:changeformat($("#troubleshoot_date").val()),service_id:$('#service_id').val(),is_paid:$("#is_paid").val(),description:$('#description').val(),username:$("#workplace").attr("username")}).done(function(data){alert(data);}).fail(function(){alert('Tidak bisa menyimpan Troubleshoot, hubungi Developer')});
		window.location.href = thisdomain+'adm/troubleshoots';
	});

	$(".btnconfirmation").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});

});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
