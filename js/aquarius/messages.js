$(document).ready(function(){
//var ipaddr = 'localhost';
var baseurl = 'http://'+ipaddr+'/teknis/index.php/';
var thisdomain = 'http://'+ipaddr+'/teknis/index.php';

	$('.alert').click(function(){
		$.post(thisdomain+'adm/deactivealert',{id:$(this).attr('alert_id')}).done(function(data){}).fail(function(){});
	});
	
	$('.message').click(function(){
		$.post(thisdomain+'adm/deactivemessage',{id:$(this).attr('message_id')}).done(function(data){}).fail(function(){alert('gagal');});
		$(this).fadeOut(1000);
	});
	
	setInterval(function(){
		$(".date").timeago();
		},2000);
});
