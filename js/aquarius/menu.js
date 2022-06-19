	$(document).ready(function(){
		setInterval(get_alert,3000);	
	});
	
	get_alert = function(){
		$.post(thisdomain+'adm/get_alerts').done(function(data){
			if(data==='false'){
				window.location.href = thisdomain+'adm/login';
				}
			$('.notification').text(data);
			}).fail(function(){
//window.location.href = thisdomain+'adm/logout'
});
		
	}
