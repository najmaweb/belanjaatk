var baseurl = 'http://'+ipaddr+'/teknis/';
var thisdomain = 'http://'+ipaddr+'/teknis/index.php/';

	addsurveysite = function(){
		if($("#navPopSurveySite").is(":visible")){
			$("#navPopSurveySite").fadeOut(200);
		}else{
			$("#navPopSurveySite").fadeIn(300);
		}
		return false;
	}
	
	changestatus = function(status){
		$('#setstatusbutton').html(status);
	}

	createsurveysite = function(survey_id,site_id){
		$('.site').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg"><img src="'+baseurl+'img/aquarius/example_xmini.jpg" class="img-polaroid"/></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+$("#site_address").val()+'</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td><td>'+$('#site_address').val()+'</td><td><a href="#"><span class="icon-pencil"></span></a> <a><span onClick="removesurveysite()" class="icon-remove pointer link_navRemSurveySite"  survey_id='+survey_id+' site_id='+site_id+'></span></a></td></tr>');
		
		$('.link_navRemSurveySite').bind('click',function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(baseurl+"index.php/adm/survey_removesite",{survey_id:'+survey_id+',site_id:site_id});
		});
	}

	survey_save = function(){
		$.post(thisdomain+'adm/survey_update',{id:$('#workplace').attr('survey_id'),client_id:$('#client_id').val(),service_id:1,survey_date:$('#survey_date').val(),pic_name:$('#pic_name').val(),pic_phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),pic_position:$('#pic_position').val(),covering_letter:$('#pengantar').val(),resume:$('#resume').val(),shortresume:$('#shortresume :checked').val()}).done(function(data){}).fail(function(){alert('failed');});
	}
	
	changeformat = function(mydate){
		out = mydate.split("/");
		return out[2]+'-'+out[1]+'-'+out[0];
	}
	
	populatesurveyor = function(data,nama,email){
		$('.surveyor').append('<tr><td><input type="checkbox" name="checkbox"/></td><td><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+nama+'.jpg"><img src="'+baseurl+'media/users/'+nama+'.jpg" class="img-polaroid" width="50" /></a></td><td class="info"><a class="fancybox" rel="group" href="'+baseurl+'img/aquarius/example_full.jpg">'+nama+'</a></td><td>'+email+'</td><td><a><span onClick="removepetugassurvey()" class="icon-remove pointer link_navRemPetugasSurvey"  survey_id='+$('#workplace').attr("survey_id")+' user_id='+data+'></span></a></td></tr>');
		$('.link_navRemPetugasSurvey').bind('click',function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(thisdomain+"adm/survey_removeofficer",{id:data}).done(function(data){}).fail(function(){alert('test');});
            
		});

	}

$(document).ready(function(){
	$(".addSurveyor").click(function(){
		$("#dAddSurveyor").modal("show");
	});

	$("#printsurveypdf").click(function(){
		window.location.href = thisdomain+"adm/printpdf";
	});

    $('#survey_save').click(function(){
		survey_save();
		setTimeout(function(){
			$("#dModal").modal("hide");
			},"1000");
	});
	
	$('.petugasSurvey').click(function(){
		var nama = $(this).attr('username');
		var email = $(this).attr('surveyor_email');
		$.post(thisdomain+"adm/addsurveyofficer",{survey_request_id:$(this).attr('survey_id'),name:nama,email:email}).done(function(data){
			populatesurveyor(data,nama,email);}).fail(function(){
			}).done($("#surveyor_total").text($("#tblsurveyor tr").length));
		$("#dAddSurveyor").modal("hide");
		
	});

    $(".link_navRemPetugasSurvey").click(function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(thisdomain+"adm/survey_removeofficer",{id:$(this).attr('surveyor_id')}).done(function(data){
				}).fail(function(){});
        return false;
    });
    
    $('#setbelumselesai').click(function(){
		$.post(thisdomain+"adm/updatesurveystatus",{id:$('#workplace').attr('survey_id'),status:$(this).attr('status')}).done(function(data){changestatus('Status Belum Selesai <span class="caret"></span>');}).fail(function(){alert('gagal set status belum selesai');});
	});

    $('#setdalamprogress').click(function(){
		$.post(thisdomain+"adm/updatesurveystatus",{id:$('#workplace').attr('survey_id'),status:$(this).attr('status')}).done(function(data){changestatus('Status Dalam Progress <span class="caret"></span>');}).fail(function(){alert('gagal set status dalam proses');});
	});

    $('#setselesai').click(function(){
		$.post(thisdomain+"adm/updatesurveystatus",{id:$('#workplace').attr('survey_id'),status:$(this).attr('status')}).done(function(data){changestatus('Status Selesai <span class="caret"></span>');}).fail(function(){alert('gagal set status status');});
	});
	
	$('.surveyoredit').click(function(){
		//alert($(this).parent().parent().parent().attr('surveyor_id'));
		if($('#editsurveyor').is(":visible")){
			$('#editsurveyor').fadeOut(300);
		}else{
			$('#editsurveyor').fadeIn(300);
			$('#editsurveyor').attr('surveyor_id') = $(this).parent().parent().parent().attr('surveyor_id');
		}
	});
	
	$('#updatesurveyor').click(function(){
		alert($(this).attr('class'));
		$.post(thisdomain+'adm/surveyorupdate',{id:$('#editsurveyor').attr('surveyor_id'),name:$('#surveyorname').val(),phone:$('#surveyorphone').val(),email:$('#surveyoremail').val()}).done(function(data){}).fail(function(){alert('gagal');});
		$('#editsurveyor').fadeOut(300);
	});
});
