$(document).ready(function(){
	$(".btnsavetroubleshoot").click(function(){
		$.post(thisdomain+'adm/troubleshootedit',{id:$("#workplace").attr("troubleshoot_id"),client_id:$("#workplace").attr("client_id"),sales_id:'',pic_name:$("#pic_name").val(),pic_phone_area:$("#pic_phone_area").val(),pic_phone:$("#pic_phone").val(),pic_position:$("#pic_position").val(),pic_email:$("#pic_email").val(),address:$("#address").val(),request_date1:changeformat($("#troubleshoot_date").val()),service_id:$('#service_id').val(),is_paid:$("#is_paid").val(),description:$('#description').val(),username:$("#workplace").attr("username")}).done(function(data){
			confirmation();
			}).fail(function(){alert('Tidak bisa menyunting Troubleshoot, hubungi Developer')});
		
	});
	
	$(".btnaddsite").click(function(){
		$("#dAddSite").modal("show");;
	});
	
	$(".btnRemoveTroubleshootSite").click(function(){
		$.post(thisdomain+'adm/troubleshootremovesite',{id:$(this).attr("site_id")}).done(function(data){}).fail(function(){alert('Tidak dapat menghapus Site, hubungi Developer');});
		$(this).parent().parent().parent().fadeOut(300);
		});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$("#savetroublesite").click(function(){
		$.post(thisdomain+"adm/troublesiteadd",{troubleshoot_request_id:$('#workplace').attr('troubleshoot_id'),address:$('#site_address').val(),city:$('#site_city').val(),pic_name:$('#site_pic').val(),pic_position:$('#site_pic_position').val(),pic_phone_area:$('#site_phone_area').val(),pic_phone:$('#site_phone').val(),pic_email:$('#site_email').val(),createuser:$('#workplace').attr('username')}).done(function(data){
			populaterow(data);
			});
	});
	
	$(".datetimepicker").datetimepicker({
		step:10,
		onChangeDateTime: function(a,b){
			//alert(b.val());
			start = $('#troubleshoot_date2').val();
			end   = $('#troubleshoot_date').val();
			result = start - end;
			alert(result);
			//alert($('#troubleshoot_date2').val()-$('#troubleshoot_date').val());
			}
	});
	
});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

confirmation = function(){
	$("#dModal").modal("show");
	setTimeout(function(){
		$("#dModal").modal("hide");
		},1000);
}

populaterow = function(data){
	$("#site").append('<tr><td><input type="checkbox" name="checkbox"/></td><td class="info"><a>'+$("#site_address").val()+'</a><span>'+$("#site_city").val()+'</span></td><td class="info"><a>'+$("#site_pic").val()+'</a><span>'+$("#site_pic_position").val()+'</span><span>'+$("#site_phone_area").val()+' - '+$("#site_phone").val()+'</span></td><td>'+$("#site_email").val()+'</td><td><a href="'+thisdomain+'index.php/adm/troubleshoot_site/'+data+'"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer btnRemoveTroubleshootSite" troubleshoot_id='+$("#workplace").attr("troubleshoot_id")+' site_id='+data+' ></span></a></td></tr>');
	$(".btnRemoveTroubleshootSite").bind("click",function(){
		alert(data);	
		$.post(thisdomain+'adm/troubleshootremovesite',{id:data}).done(function(data){}).fail(function(){alert('Tidak dapat menghapus, hubungi Developer')});
		$(this).parent().parent().parent().fadeOut(300);
		});
}
