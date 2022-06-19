//var ipaddr = '192.168.0.117';
var baseurl = 'http://'+ipaddr+'/teknis/index.php/';
//var thisdomain = 'http://'+ipaddr+'/teknis/index.php/';

//BEGIN OF SURVEY SITE
surveysite_save = function(){
	$.post(thisdomain+'adm/surveysite_update',{id:$('#workplace').attr('survey_site_id'),address:$('#address').val(),city:$('#city').val(),pic:$('#pic').val(),pic_position:$('#pic_position').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),pic_email:$('#pic_email').val(),location_s:$('#location_s').val(),location_e:$('#location_e').val(),bearing:$('#bearing').val(),amsl:$('#amsl').val(),agl:$('#agl').val(),description:$('#description').val()}).fail(function(){alert('gagal');}).done(function(data){});

}
//BTS DISTANCE
addbtsdistance =function(){
        if($("#navPopBTSDistance").is(":visible")){
            $("#navPopBTSDistance").fadeOut(200);
        }else{
            $("#navPopBTSDistance").fadeIn(300);
        }
        return false;
}

createsurveybtsdistance = function(id,los){
	$('.btsdistance').append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+los+'</td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#bts_id :selected").text()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$('#bts_distance').val()+'</td><td><a><span onClick="removesurveysite()" class="icon-remove pointer btsdistance_remove"  btsdistance_id='+id+'></span></a></td></tr>');
	
	$('.btsdistance_remove').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/btsdistance_remove",{btsdistance_id:$(this).attr('btsdistance_id')}).done(function(data){}).fail(function(data){alert('gagal menghapus jarak bts');});
	});
}
//END OF BTS DISTANCE

//BEGIN OF MATERIAL
addsurveymaterial = function(){
	if($("#navPopSurveyMaterial").is(":visible")){
		$("#navPopSurveyMaterial").fadeOut(200);
	}else{
		$("#navPopSurveyMaterial").fadeIn(300);
	}
	return false;
}

createsurveymaterial = function(id){
	$('.material').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg"><img src="'+thisdomain+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#material_name").val()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$("#material_amount").val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removesurveysite()" class="icon-remove pointer material_remove"  material_id='+id+' site_id=1></span></a></td></tr>');
	
	$('.material_remove').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/material_remove",{material_id:$(this).attr('material_id')}).done(function(data){}).fail(function(){alert('gagal remove material');});
	});
}

insertsurveymaterial = function(){
	$.post(thisdomain+'index.php/adm/addsurveymaterial',{survey_site_id:$('#saveSurveyMaterial').attr('survey_site_id'),material_name:$('#material_name').val(),material_amount:$('#material_amount').val()}).done(function(data){createsurveymaterial(data);}).fail(function(){alert('fail');});
	addsurveymaterial();
	
}
//END OF MATERIAL
//BEGIN OF DEVICE

createsurveydevice = function(id){
	$('.device').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg"><img src="'+thisdomain+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#device_name :selected").text()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$('#device_amount').val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removesurveysite()" class="icon-remove pointer device_remove"  device_id='+id+' site_id=1></span></a></td></tr>');
	
	$('.device_remove').bind('click',function(){
		$(this).parent().parent().parent().remove();
		$.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){}).fail(function(){alert('gagal remove peralatan');});
		update_devicecount($("#total_device"),$(".device tbody tr"));
	});
}

insertsurveydevice = function(){
	$.post(thisdomain+'adm/addsurveydevice',{survey_site_id:$('#saveSurveyMaterial').attr('survey_site_id'),device_name:$('#device_name').val(),amount:$('#device_amount').val()}).fail(function(){alert('gagal menambah peralatan');}).done(function(data){createsurveydevice(data);});
	addsurveydevice();	
}

addsurveydevice = function(){
        if($("#navPopSurveyDevice").is(":visible")){
            $("#navPopSurveyDevice").fadeOut(200);
        }else{
            $("#navPopSurveyDevice").fadeIn(300);
        }
        return false;
	}
//END OF DEVICE
//BEGIN OF IMAGE
addsurveyimage = function(){
        if($("#navPopSurveyImage").is(":visible")){
            $("#navPopSurveyImage").fadeOut(200);
        }else{
            $("#navPopSurveyImage").fadeIn(300);
        }
        return false;
	}
//END OF IMAGE
//BEGIN OF CABANGKLIEN

createsurveyotherclient = function(id){
	$('.otherclient').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg"><img src="'+thisdomain+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+thisdomain+'img/aquarius/example_full.jpg">'+$("#client_id :selected").text()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$("#distance").val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span class="icon-remove pointer otherclient_remove" ></span></a></td></tr>');
	
	$('.otherclient_remove').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/survey_removeotherclent",{id:id}).done(function(data){}).fail(function(){alert('gagal menghapus pelanggan lain');});
	});
}

addotherclient = function(){
	
}

populate_image = function(image_id,path,nama,user_name){
	$('.gambar').append("<tr image_id="+image_id+" image_path="+path+"><td><input type='checkbox' name='checkbox'/></td><td><a class='fancybox' rel='group' href='"+thisdomain+"media/surveys/"+path+"'><img src='"+thisdomain+"media/surveys/"+path+"' class='img-polaroid' width=50 height=38 /></a></td><td class='info'><a class='fancybox' rel='group' href='"+thisdomain+"img/aquarius/example_full.jpg'>"+nama+"</a> <span>"+path+"</span> <span>"+Date.now()+"</span></td><td>"+user_name+"</td><td><a><span class='icon-remove removesurveyimage'></span></a></td></tr>");
	$('.removesurveyimage').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		removesurveyimage($(this).parent().parent().parent().attr('image_id'));
		$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+path});
	});
}

saveotherclient = function(){
	$.post(thisdomain+'adm/addotherclient',{survey_site_id:$('#saveSurveyMaterial').attr('survey_site_id'),client_id:$('#client_id').val(),distance:$('#distance').val()}).fail(function(){alert('gagal menyimpan pelanggan lain');}).done(function(data){createsurveyotherclient(data);});
	addotherclient();	
	
}
//END OF CABANGKLIEN

initimageupload = function(){
	var btnUpload=$('#uploadsurveyimage');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: thisdomain+'adm/upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			// extension is not allowed 
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('#path').val(file);
			}
		}

	});
}

	removesurveyimage = function(image_id){
		$.post(thisdomain+'adm/surveyimage_remove',{id:image_id}).done(function(data){}).fail(function(){alert('gagal remove image');});
	}


$(document).ready(function(){
	initimageupload();
	
	//inisialisasi device
	$("#device_name").html("");
		$.getJSON(thisdomain+'devices/getdevice/1',function(data){
			$.each(data,function(x,y){
				//alert(x);
				filldeviceopt(x,y);
			});
			$(deviceopt).appendTo("#device_name");
		});
	
	//end of inisialisasi device
	
    $('.addbtsdistance').click(function(){
		$("#dAddBTSDistance").modal("show");
		//addbtsdistance();
	});
    
    $(".btn_addsurveyimage").click(function(){
		$("#dAddSurveyImage").modal("show");
	});
    
    $('.btsdistance_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/btsdistance_remove",{btsdistance_id:$(this).attr('btsdistance_id')}).done(function(data){}).fail(function(data){alert('gagal menghapus BTS');});
        return false;
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".device_remove").click(function(){
		$(this).parent().parent().parent().remove();
        $.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){}).fail(function(){alert('gagal');});
		update_devicecount($("#total_device"),$(".device tbody tr"));
	});
    
    $('#losnlosselect').change(function(){
		$('.losap').toggle();
	});
	
	$(".material_remove").click(function(){
		//$(this).parent().parent().parent().fadeOut(200);
		$(this).parent().parent().parent().remove();
		$.post(thisdomain+"adm/material_remove",{material_id:$(this).attr('material_id')}).done(function(data){
//			alert($("#tsurveymaterial > tbody > tr").length);
//			update_devicecount($("#total_material"),$("#tsurveymaterial > tbody > tr"));
			$("#total_material").html($("#tsurveymaterial tbody tr:last").index()+1);
			})
	});
    
	$('#surveysite_save').click(function(){
		surveysite_save();
		setTimeout(function(){
			$('#dModal').modal('hide');
			},1000);
	});
	
	$('#add_surveyimage').click(function(){
		addsurveyimage();
	});
	
	$(".btnadddevice").click(function(){
		$("#dAddDevice").modal("show");
	});
	
	$('.removesurveyimage').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		removesurveyimage($(this).parent().parent().parent().attr('image_id'));
		$.post(thisdomain+'adm/remove_image_path',{path:'./media/surveys/'+$(this).parent().parent().parent().attr('image_path')});
	});
	
	$('#saveBTSDistance').click(function(){
		$.post(thisdomain+'adm/addbtsdistance',{survey_site_id:$('#workplace').attr('survey_site_id'),btstower_id:$('#bts_id').val(),los:$('#losnlosselect :selected').val(),distance:$('#bts_distance').val(),ap:$('#apselect :selected').val(),description:$("#bts_description").val()}).done(function(data){createsurveybtsdistance(data,($('#losnlosselect :selected').val()==='1')?'LOS':'NLOS');}).fail(function(){alert('gagal menyimpan bts');});
	});
	
	$("#saveSiteDistance").click(function(){
		$.post(thisdomain+'adm/surveysitedistanceadd',{survey_site_id:$("#workspace").attr("survey_site_id"),username:$("#workspace").attr("username"),address:$("#site_id :selected").text(),distance:$("#site_distance").val(),description:$("#site_description").val()}).done(function(data){alert(data);}).fail(function(){alert("Tidak bisa menyimpan jarak site, hubungi Developer");});
	});
	
	$('#savesurveyimage').click(function(){
		$.post(thisdomain+'adm/surveysite_saveimage',{survey_site_id:$('#workplace').attr('survey_site_id'),name:$('#name').val(),path:$('#path').val(),user_name:$('#workplace').attr('user_name')}).done(function(data){populate_image(data,$('#path').val(),$('#name').val(),$('#workplace').attr('user_name'));}).fail(function(){alert('gagal insert image');});
	});
	
	$("#savesurveymaterial").click(function(){
		$.post(thisdomain+'adm/addsurveymaterial',{survey_site_id:$('#workplace').attr('survey_site_id'),material_type:$("#material_type :selected").text(),name:$('#material_name :selected').text(),material_amount:$('#material_amount').val()}).done(function(data){
			//createsurveymaterial(data);
				$('.material').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a>'+$('#material_type :selected').text()+'</a></td><td class="info"><a>'+$("#material_name :selected").text()+'</a></td><td>'+$("#material_amount").val()+'</td><td><a><span onClick="removesurveysite()" class="icon-remove pointer material_remove"  material_id='+data+' site_id=1></span></a></td></tr>');

			$(".material_remove").bind("click",function(){
		$.post(thisdomain+"adm/material_remove",{material_id:data}).done(function(data){
			update_devicecount($("#total_material"),$(".material tbody tr"));
			});				
				});
				
			update_devicecount($("#total_material"),$(".material tbody tr"));
			}).fail(function(){alert('fail');});
	});
	
	$("#savesurveydevice").click(function(){
		$.post(thisdomain+'adm/addsurveydevice',{survey_site_id:$('#workplace').attr('survey_site_id'),name:$('#device_name :selected').text(),device_id:$('#device_name').val(),amount:$('#device_amount').val()}).done(function(data){			
			$(".device").append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a>'+$("#device_type :selected").text()+'</a></td><td class="info">'+$("#device_name :selected").text()+'</a></td><td>'+$("#device_amount").val()+'</td><td><a><span class="icon-remove device_remove" device_id='+data+' ></span></a></td></tr>');
			update_devicecount($("#total_device"),$(".device tbody tr"));
			$('.device_remove').bind('click',function(){
				$(this).parent().parent().parent().remove();
				$.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){
					update_devicecount($("#total_device"),$(".device tbody tr"));
					}).fail(function(){alert('gagal');});
			});
		});
	});
	
	$(".addMaterial").click(function(){
		$("#dAddMaterial").modal("show");
	});
	
	$(".addSite").click(function(){
		$("#dAddSiteDistance").modal("show");
	});
	var deviceopt;
	$("#device_type").change(function(){
		$("#device_name").html("");
		filldevice($(this).val());
	});
	
	filldeviceopt = function(x,y){
		//alert(x);
		deviceopt+="<option value="+x+">"+y+"</option>";
	}
	
	filldevice = function(devicetype){
		//alert("xxx");
		$("#device_name").html("");
		deviceopt = "";
		$.getJSON(thisdomain+'devices/getdevice/'+devicetype,function(data){
			$.each(data,function(x,y){
				//alert(x);
				filldeviceopt(x,y);
			});
			$(deviceopt).appendTo("#device_name");
		});
	}
	

/////////////////////////
	var materialopt;
	$("#material_type").change(function(){
		$("#material_name").html("");

		fillmaterial($(this).val());
	});
	
	fillmaterialopt = function(x,y){
		//alert(x);
		materialopt+="<option value="+x+">"+y+"</option>";
	}
	
	fillmaterial = function(materialtype){
		//alert("xxx");
		$("#material_name").html("");
		materialopt = "";
		$.getJSON(thisdomain+'materials/getmaterial/'+materialtype,function(data){
			$.each(data,function(x,y){
				fillmaterialopt(x,y);
			});
			$(materialopt).appendTo("#material_name");
		});
	}

/////////////////////////


	update_devicecount = function(myselector,mytable){
		myselector.html(mytable.length);	
	}
	
});
