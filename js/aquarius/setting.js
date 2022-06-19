$(document).ready(function(){
	$('#user_save').click(function(){
		$.post(thisdomain+'adm/userupdate',{id:$('#workplace').attr('user_id'),email:$('#email').val(),phone:$('#phone').val(),dob:changeformat($('#dob').val())}).done(function(data){}).fail(function(){alert('gagal edit user');});
		hideNotification();
	});
	
	$('#changepassword').click(function(){
		$("#dModal").modal();
		$.post(thisdomain+'adm/change_password',{email:$("#workplace").attr("useremail"),oldpassword:$("#oldpassword").val(),password:$('#password').val()});
		hideNotification();
	});
});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

hideNotification = function(){
	setTimeout(function(){
		$('#dModal').modal('hide');
		},"2000");
}
