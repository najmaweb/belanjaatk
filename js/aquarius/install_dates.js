//var ipaddr = '192.168.0.117';
var baseurl = 'http://'+ipaddr+'/teknis/index.php/';
var thisdomain = 'http://'+ipaddr+'/teknis/index.php/';
$(document).ready(function(){
	$('#install_date_save').click(function(){
		$.post(thisdomain+'adm/addinstalldate',{install_request_id:$(this).attr('install_request_id'),schedule_date:changeformat($('#schedule_date').val()),reason:$('#reason').val(),username:$('#workplace').attr('username')}).done(function(data){alert(data)}).fail(function(){alert('gagal');});
		$.post(thisdomain+'adm/addmessage',{group:'sales',sender:$('#workplace').attr('username'),description:'koreksi tanggal instalasi <a href="http://teknis/adm/installs">Lihat Link</a>'}).done(function(data){}).fail(function(){alert('alert gagal');});
		$.post(thisdomain+'adm/addalert',{group:'sales',sender:$('#workplace').attr('username'),description:'koreksi tanggal instalasi <a href="http://teknis/adm/installs">Lihat Link</a>'}).done(function(data){}).fail(function(){alert('alert gagal');});
		
	});
});
changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
