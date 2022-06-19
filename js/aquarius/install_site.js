$(document).ready(function(){
	initimageupload();
	
	$(".btn_addrouter").click(function(){
		$("#dAddRouter").modal("show");
	});

	$(".btn_addapwifi").click(function(){
		$("#dAddAPWifi").modal("show");
	});

	$(".btn_addinstallimage").click(function(){
		$("#dAddInstallImage").modal("show");
	});
	
	$(".btn_addwirelessradio").click(function(){
		$("#dAddWirelessRadio").modal("show");
	});
	
	$("#btn_addba").click(function(){
		$("#dAddBeritaAcara").modal("show");
	});
	
	$(".installsite_save").click(function(){
		$.post(thisdomain+'adm/install_updatesite',{id:$("#workplace").attr("install_site_id"),address:$('#address').val(),city:$('#city').val(),pic:$('#pic').val(),pic_position:$('#pic_position').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),pic_email:$('#pic_email').val(),description:$('#description').val(),user_name:$("#workplace").attr("user_name")}).done(function(data){}).fail(function(){alert("Tidak dapat mengupdate site instalasi, hubungi Developer");});
		$("#dModal").modal("show");
		setTimeout(function(){
			$("#dModal").modal("hide");
			},1000);
	});
	
	$(".removeinstallimage").click(function(){
		$.post(thisdomain+'adm/installimageremove',{id:$(this).parent().parent().parent().attr("image_id")});
		$(this).parent().parent().parent().fadeOut();
	});
	
	$("#savewirelessradio").click(function(){
		$.post(thisdomain+'adm/wirelessradioadd',{install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_wireless_radio").val(),macboard:$("#macboard_wireless_radio").val(),ip_radio:$("#ip_radio_wireless_radio").val(),ap_id:$("#ap_id_wireless_radio").val(),ip_ap:$("#ip_ap_wireless_radio").val(),polarization:$("#polarization_wireless_radio").val(),signal:$("#signal_wireless_radio").val(),quality:$("#quality_wireless_radio").val(),freqwency:$("#freqwency_wireless_radio").val(),throughput_udp:$("#troughput_udp_wireless_radio").val(),throughput_tcp:$("#troughput_tcp_wireless_radio").val(),essid:$("#essid_wireless_radio").val(),user:$("#user_wireless_radio").val(),password:$("#password_wireless_radio").val(),pc_card_type:$("#pc_card_type_wireless_radio").val(),pc_card_mac_address:$("#pc_card_mac_address_wireless_radio").val(),antenna_type:$("#antenna_type_wireless_radio").val(),antenna_location:$("#antenna_location_wireless_radio").val()}).done(function(data){appendwirelessradio(data);}).fail(function(){alert("tidak bisa menambah wireless radio, hubungi developer");});
	});
	
	$(".remove_wireless_radio").click(function(){
		$.post(thisdomain+'adm/wirelessradioremove',{id:$(this).attr("wireless_radio_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wireless_radio").html('Total : '+count);	
		});	
		
	});
	
	$("#saverouter").click(function(){
		$.post(thisdomain+'adm/routeradd',{install_site_id:$('#workplace').attr('install_site_id'),tipe:$('#tipe_router').val(),macboard:$("#macboard_router").val(),ip_public:$('#ip_public_router').val(),ip_private:$('#ip_private_router').val(),user:$('#user_router').val(),password:$('#password_router').val(),location:$('#location_router').val()}).done(function(data){
			$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
				$("#total_router").html('Total : '+count);	
			});
			
			appendrouter(data);
		});
		
	});
	
	$("#saveba").click(function(){
		$.post(thisdomain+'adm/baadd',{install_site_id:$("#workplace").attr("install_site_id"),createuser:$("#workplace").attr("user_name"),name:$("#nameba").val(),path:$("#pathba").val(),description:$("#descriptionba").val()}).done(function(data){appendba(data)}).fail(function(){alert("tidak dapat menambah BA, hubungi developer");});
	});
	
	$("#saveimage").click(function(){
		$.post(thisdomain+'adm/installimageadd',{install_site_id:$("#workplace").attr("install_site_id"),user_name:$("#workplace").attr("user_name"),name:$("#name_image").val(),path:$("#path_image").val(),description:$("#description_image").val()}).done(function(data){appendimage(data);});
	});
	
	$("#savewifi").click(function(){
		$.post(thisdomain+'adm/wifiadd',{install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_apwifi").val(),macboard:$("#macboard_apwifi").val(),ip_address:$("#ip_address_apwifi").val(),essid:$("#essid_apwifi").val(),security_key:$("#security_key_apwifi").val(),user:$("#user_apwifi").val(),password:$("#password_apwifi").val(),location:$("#location_apwifi").val(),owner:$("#owner_apwifi").val(),user_name:$("#workplace").attr("user_name")}).done(function(data){appendwifi(data);}).fail(function(){alert("Gagal menyimpan AP WIFI");});
	});
	
	$(".remove_ba").click(function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);	
		});	
		
	});
	
	$(".remove_router").click(function(){
		$.post(thisdomain+'adm/routerremove',{id:$(this).attr("router_id")}).done(function(data){}).fail(function(){alert("Gagal bisa menghapus router, hubungi Developer");});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
				$("#total_router").html('Total : '+count);	
			});	
		});
	
	$(".remove_wifi").click(function(){
		$.post(thisdomain+'adm/wifiremove',{id:$(this).attr("wifi_id")});
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".closemodalparent2").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$(".row_remove").click(function(){
		$(this).parent().parent().parent().fadeOut(200);
	});
});

appendwirelessradio = function(data){
	$("#wirelessradio").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#tipe_wireless_radio").val()+'</td><td class="info"><a>Macboard: '+$("#macboard_wireless_radio").val()+'</a> <span>IP Radio : '+$("#ip_radio_wireless_radio").val()+'</span> <span>'+$("#freqwency_wireless_radio").val()+'</span></td><td>'+$("#essid_wireless_radio").val()+'</td><td><a><span class="icon-trash pointer remove_wireless_radio" wireless_radio_id='+data+' ></span></a></td></tr>');
	
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wireless_radio").html('Total : '+count);	
	});	

	$(".remove_wireless_radio").bind("click",function(){
		$.post(thisdomain+'adm/wirelessradioremove',{id:$(this).attr("wireless_radio_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wireless_radio").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
	});
}

appendba = function(data){
	$("#ba").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#nameba").val()+'</td><td class="info"><a>'+$("#pathba").val()+'</a> <span></span> <span></span></td><td>'+$("#descriptionba").val()+'</td><td><a><span class="icon-trash row_remove remove_ba" ba_id='+data+'></span></a></td></tr>');
	
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_ba").html('Total : '+count);	
	});	
	$(".remove_ba").bind("click",function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
		});
}
appendrouter = function(data){
	$("#router").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#tipe_router").val()+'</td><td class="info"><a>'+$("#macboard_router").val()+'</a> <span>'+$("#ip_public_router").val()+'</span> <span>'+$("#ip_private_router").val()+'</span></td><td>'+$("#location_router").val()+'</td><td><a><span class="icon-trash row_remove remove_router" router_id='+data+'></span></a></td></tr>');
	
	$(".remove_router").bind("click",function(){
		$.post(thisdomain+'adm/routerremove',{id:$(this).attr("router_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_router").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
	});
}

appendwifi = function(data){
	$("#ap_wifi").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#tipe_apwifi").val()+'</td><td class="info"><a>'+$("#macboard_apwifi").val()+'</a> <span>'+$("#ip_address_apwifi").val()+'</span> <span>'+$("#essid_apwifi").val()+'</span></td><td>'+$("#location_apwifi").val()+'</td><td><a><span class="icon-trash row_remove remove_wifi" wifi_id="+data+" ></span></a></td></tr>');
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ap_wifi',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wifi").html('Total : '+count);	
	});	
	$(".remove_wifi").bind("click",function(){
		$.post(thisdomain+'adm/wifiremove',{id:$(this).attr("wifi_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ap_wifi',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wifi").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
		});
}

appendimage = function(data){
	$("#install_image").append('<tr image_id='+data+' image_path='+$('#path_image').val()+'><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+thisdomain+'media/installs/'+$('#path_image').val()+'"><img src="'+thisdomain+'media/installs/'+$('#path_image').val()+'" class="img-polaroid" width=50 height=38 /></a></td><td class="info"><a>'+$('#name_image').val()+'</a> <span>'+$('#path_image').val()+'</span> <span>'+$('#path_description').val()+'</span></td><td>'+$('#description_image').val()+'</td><td><a><span class="icon-trash removeinstallimage" ></span></a></td></tr>');
}

initimageupload = function(){
	var btnUpload=$('#uploadinstallimage');
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
				$('#path_image').val(file);
			}
		}

	});
}


