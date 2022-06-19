$(document).ready(function(){
	
	$(".addsurveysite").click(function(){
		$("#dAddSite").modal("show");
	});
	
	$(".closemodal").click(function(){
		$("#dAddSite").modal("hide");
	});
	
	$(".remove_site").click(function(){
		$.post(thisdomain+'adm/survey_removesite',{site_id:$(this).attr('site_id')}).done(function(data){}).fail(function(){alert('gagal')});
		$(this).parent().parent().parent().fadeOut(1000);
		
	});
	surveyTable = $("#survey_site").dataTable();
	$('#savesurveysite').click(function(){
		$.post(thisdomain+'adm/survey_addsite',{survey_request_id:$('#workplace').attr('survey_id'),address:$('#site_address').val(),city:$('#site_city').val(),phone_area:$('#site_phone_area').val(),phone:$('#site_phone').val(),pic_email:$('#site_email').val(),pic:$('#site_pic').val(),pic_position:$('#site_pic_position :selected').text(),description:$("#site_description").val()}).done(function(data){
			populaterow(data);
			$("#surveysite_total").text($("#surveysite tbody tr").length);
			});
	});

	$('.survey_save').click(function(){
		$.post(thisdomain+'adm/surveyedit',{id:$('#workplace').attr('survey_id'),pic_name:$('#pic_name').val(),pic_phone_area:$('#pic_phone_area').val(),pic_phone:$('#pic_phone').val(),pic_email:$('#pic_email').val(),pic_position:$('#pic_position').val(),address:$('#address').val(),longresume:$('#longresume').val(),fix_survey_date:changeformat($('#survey_date').val())}).done(function(data){}).fail(function(){alert('gagal');});
		$("#dModal").modal("show");
		setTimeout(function(){
			$("#dModal").modal("hide");
			},1000);
	});
});

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

populaterow = function(data){
	$("#surveysite").append('<tr><td><input type="checkbox" name="checkbox"/></td><td>'+$("#site_address").val()+' '+$("#site_city").val()+'</td><td class="info"><a>'+$("#site_pic").val()+'</a><span>'+$("#site_email").val()+'</span></td><td>'+$("#site_phone_area").val()+' '+$("#site_phone").val()+'</td><td><a title="Hapus"><span class="icon-trash pointer remove_site" site_id="'+data+'"></a></td></tr>');
	$(".remove_site").bind('click',function(){
		removesite($(this).attr('site_id'));
		$(this).parent().parent().parent().fadeOut(1000);	
	});
}

removesite = function(id){
		$.post(thisdomain+'adm/survey_removesite',{site_id:id}).done(function(data){}).fail(function(){alert('gagal')});
}
