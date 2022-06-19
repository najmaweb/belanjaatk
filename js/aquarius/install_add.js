//var ipaddr = '192.168.0.117';//'192.168.3.245';

var baseurl = 'http://'+ipaddr+'/teknis/index.php/';
var thisdomain = 'http://'+ipaddr+'/teknis/index.php/';

$(document).ready(function(){
	$('.install_save').click(function(){
//alert(changeformat($('#pic_install_date').val()));
		$.post(thisdomain+'adm/addinstall',{client_id:$('#workplace').attr('client_id'),install_date:changeformat($('#install_date').val()),pic_name:$('#pic_name').val(),pic_phone_area:$('#pic_phone_area').val(),pic_phone:$('#pic_phone').val(),pic_position:$('#pic_position').val(),pic_email:$('#pic_email').val(),permit:$('#permit').val(),description:$('#description').val()}).done(function(data){copysites(data)}).fail(function(){alert('fail');});
		$.post(thisdomain+'adm/addalert',{group:'TS',sender:$('#myheader').attr('username'),description:'request instalasi baru',url:'adm/installs'}).done(function(data){}).fail(function(){alert('alert gagal');});
		$.post(thisdomain+'adm/addmessage',{group:'TS',sender:$('#myheader').attr('username'),description:'request instalasi baru'}).done(function(data){}).fail(function(){alert('alert gagal');});
		setTimeout(function(){
			$("#dModal").modal('hide');
			window.location.href = thisdomain+'adm/installs';
			},1000);
	});
	
	$(".btncloseinstallsitepopup").click(function(){
		$("#popupinstallsite").fadeOut(200);
	});
	
	$('#cancel_install_save').click(function(){
		$('#dconfirmation').modal('hide');
	});
	
});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

copysites = function(install_id){
	//alert($('#workplace').attr('survey_id'));
	$.post(thisdomain+'adm/surveysitestoinstallsitescopy',{survey_id:$('#workplace').attr('survey_id'),install_request_id:install_id}).done(function(data){}).fail(function(){;});
}
