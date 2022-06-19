$(document).ready(function(){
	$("#btnaddsite").click(function(){
		$('#dAddInstallSite').modal("show");
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".toggleinstallsite").click(function(){
		
		if($('#popupinstallsite').is(':visible')){
			$('#popupinstallsite').fadeOut(200);
		}else{
			$('#popupinstallsite').fadeIn(300);
		}
	});

	$('#install_save').click(function(){
		$.post(thisdomain+'adm/installedit',{id:$('#workplace').attr('install_id'),pic_name:$('#pic_name').val(),pic_position:$('#pic_position').val(),pic_phone_area:$('#pic_phone_area').val(),pic_phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),permit:$('#permit :selected').val(),install_date:changeformat($('#install_date').val()),description:$('#description').val()}).done(function(data){}).fail(function(){alert('tidak bisa update install request');});
		setTimeout(function(){$("#dModal").modal("hide");},1000);
	});

	$("#print_pdf").click(function(){
		var pdf = jsPDF('p','in','letter'),
		margin = 0.5;
		pdf.setDrawColor(0,255,0).setLineWidth(1/72).line(margin,margin,margin,11-margin).line(8.5 - margin, margin, 8.5-margin, 11-margin);
		//var string = pdf.output('x');
		//$('iframe').attr('src',string);
		alert("cetak PDF");
	});

	$("#saveinstallsite").click(function(){
		$.post(thisdomain+'adm/installsiteadd',{install_request_id:$('#workplace').attr('install_id'),address:$('#site_address').val(),city:$('#site_city').val(),pic:$('#site_pic_name').val(),pic_position:$('#site_pic_position').val(),phone_area:$('#site_phone_area').val(),phone:$('#site_phone').val(),pic_email:$('#site_email').val(),description:$('#site_description').val()}).done(function(data){appendsite(data);}).fail(function(){alert('tidak bisa menambah site instalasi');});

	});
	
	$(".removesite").click(function(){
		$.post(thisdomain+'adm/install_removesite',{id:$(this).attr('site_id')});
	});
});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

appendsite = function(data){
			$("#site").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#site_address").val()+' - '+$("#site_city").val()+'</td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#site_pic_name").val()+'</a> <span>'+$("#site_phone_area").val()+' - '+$("#site_phone").val()+'</span> <span>'+$("#pic_email").val()+'</span></td><td>'+$("#site_pic_position").val()+'</td><td><a href="'+thisdomain+'adm/install_site/'+data+'"><span class="icon-pencil"></span></a><a><span class="icon-trash pointer link_navRemSurveySite"></span></a></td></tr>');
	}
