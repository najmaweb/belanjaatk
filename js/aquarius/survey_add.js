//var ipaddr = '192.168.0.117';//'192.168.3.245';

var baseurl = 'http://'+ipaddr+'/teknis/index.php/';
var thisdomain = 'http://'+ipaddr+'/teknis/index.php/';

addsurveysite = function(){
	if($("#navPopSurveySite").is(":visible")){
		$("#navPopSurveySite").fadeOut(200);
	}else{
		$("#navPopSurveySite").fadeIn(300);
	}
	return false;
}

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

createsurveysite = function(survey_id,site_id){
	$('.site').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+$("#site_address").val()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$('#site_address').val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removesurveysite()" class="icon-remove pointer link_navRemSurveySite"  survey_id='+survey_id+' site_id='+site_id+'></span></a></td></tr>');
	
	$('.link_navRemSurveySite').bind('click',function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(baseurl+"index.php/adm/survey_removesite",{survey_id:'+survey_id+',site_id:site_id});
	});
}

makealert = function(data){
	alert(data);
	$.post(thisdomain+'adm/addalert',{group:'TS',sender:$('#myheader').attr('username'),description:'request survey baru',url:'adm/survey_edit/'+data}).done(function(data){}).fail(function(){alert('pengiriman alert gagal');});

	$.post(thisdomain+'adm/addmessage',{group:'TS',sender:$('#myheader').attr('username'),description:'Saya mengajukan request survey baru :'+$('#client_id :selected').text()+' untuk tanggal '+ $('#survey_date').val()+', PIC :'+$('#pic_name').val() + ', '+ $('#pic_phone').val()+' ' + $('#pic_email').val()+', Link <a href="'+thisdomain+'adm/survey_edit/'+data+'">di sini</a>'}).done(function(data){}).fail(function(){alert('pengiriman message gagal');});

	setTimeout(function(){
		window.location.href=thisdomain+'adm/surveys';
		},"1000");
}

survey_save = function(){

	$.post(thisdomain+'adm/addsurvey',{client_id:$('#workplace').attr("client_id"),service_id:1,survey_date:changeformat($('#survey_date').val()),pic_name:$('#pic_name').val(),pic_phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),pic_position:$('#pic_position').val(),covering_letter:$('#pengantar').val(),user_name:$('#myheader').attr('username'),address:$('#address').val(),service_id:$('#service_id').val(),longresume:$('#resume').val(),fix_survey_date:changeformat($('#survey_date').val()),user_close:$('#myheader').attr('username')}).done(function(data){makealert(data);}).fail(function(){alert('gagal membuat request survey');});
}

$(document).ready(function(){
    $('#survey_save').click(function(){
	//alert($('#workplace').attr("client_id"));
		survey_save();
		setTimeout(function(){
			$("#dModal").modal("hide");
			},1000);
	});
	
	$('#close_form').click(function(){
		window.location.href = thisdomain+'adm/surveys';
	});

});
