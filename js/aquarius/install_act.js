$(document).ready(function(){
	$('#correct_date').click(function(){
		window.location.href = thisdomain+'adm/install_dates';
	});
	
	$('#fix_install_date').click(function(){
		alert('x');
		$.post(thisdomain+'adm/closeinstalldate',{install_request_id:$('#workplace').attr('install_id'),fix_install_date:changeformat($('#install_date').val()),sender:$('#workplace').attr('username')}).done(function(data){}).fail(function(){alert('gagal simpan');});
		$.post(thisdomain+'adm/addmessage',{group:'sales',sender:$('#workplace').attr('username'),description:'Tanggal install sudah fix <a href="http://teknis/adm/surveys">Lihat Link</a>'}).done(function(data){}).fail(function(){alert('alert gagal');});
		$.post(thisdomain+'adm/addalert',{group:'sales',sender:$('#workplace').attr('username'),description:'Tanggal install sudah fix <a href="http://teknis/adm/surveys">Lihat Link</a>',url:'adm/surveys'}).done(function(data){}).fail(function(){alert('alert gagal');});
	});

    
    $('#setbelumselesai').click(function(){
		$.post(thisdomain+"adm/updateinstallstatus",{id:$('#workplace').attr('install_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('gaga');});
	});

    $('#setdalamprogress').click(function(){
		$.post(thisdomain+"adm/updateinstallstatus",{id:$('#workplace').attr('install_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('gaga');});
	});

    $('#setselesai').click(function(){
		$.post(thisdomain+"adm/updateinstallstatus",{id:$('#workplace').attr('install_id'),status:$(this).attr('status')}).done(function(data){}).fail(function(){alert('gaga');});
	});
});

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
