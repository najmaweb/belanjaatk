var pelangganopt = "";
var btsopt = "";
var backboneopt = "";
var datacenteropt = "";


changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}

$(document).ready(function(){
	
	
	$('#maintenance_add_save').click(function(){
		if($("#maintenance_date").val()==""){
			$("#dWarning").modal("show");
			setTimeout(function(){
				$("#dWarning").modal("hide");
				},1000);
		}else{
			$.post(thisdomain+'adm/addmaintenance',{client_id:$('#nameofmtype').val(),maintenance_type:$('#maintenance_type').val(),maintenance_date:changeformat($('#maintenance_date').val()),description:$('#description').val(),nameofmtype:$('#nameofmtype').val()}).done(function(data){}).fail(function(){alert('fail');});
			$.post(thisdomain+'adm/addalert',{group:'TS',sender:$('.workplace').attr('username'),description:'request maintenance baru',url:'adm/maintenances'}).done(function(data){}).fail(function(){alert('alert gagal');});
			$.post(thisdomain+'adm/addmessage',{group:'TS',sender:$('.workplace').attr('username'),description:'request maintenance baru'}).done(function(data){}).fail(function(){alert('alert gagal');});
			$("#dModal").modal("show");
			setTimeout(function(){
				$("#dModal").modal("hide");
				},1000);
		}
	});
	
	fillbackboneopt = function(x,y){
		backboneopt+="<option value="+x+">"+y+"</option>";
	}

	fillpelangganopt = function(x,y){
		pelangganopt+="<option value="+x+">"+y+"</option>";
	}

	filldatacenteropt = function(x,y){
		datacenteropt+="<option value="+x+">"+y+"</option>";
	}

	fillbtsopt = function(x,y){
		btsopt+="<option value="+x+">"+y+"</option>";
	}

	fillbackbone = function(){
		$.getJSON(thisdomain+'backbones/get',function(data){
			$.each(data,function(x,y){
				fillbackboneopt(x,y);
			});
			$(backboneopt).appendTo("#nameofmtype");
		});
	}

	fillpelanggan = function(){
		$.getJSON(thisdomain+'clients/get',function(data){
			$.each(data,function(x,y){
				fillpelangganopt(x,y);
			});
			$(pelangganopt).appendTo("#nameofmtype");
		});
	}

	filldatacenter = function(){
		$.getJSON(thisdomain+'adm/get_datacenters',function(data){
			$.each(data,function(x,y){
				filldatacenteropt(x,y);
			});
			$(datacenteropt).appendTo("#nameofmtype");
		});
	}
	fillbts = function(){
		$.getJSON(thisdomain+'btses/get',function(data){
			$.each(data,function(x,y){
				fillbtsopt(x,y);
			});
			$(btsopt).appendTo("#nameofmtype");
		});
	}
	switch($('#maintenance_type').val()){
		case 'pelanggan':
			fillpelanggan();
		break;
		case 'datacenter':
			filldatacenter();
		break;
		case 'backbone':
			fillbackbone();
		break;
		case 'bts':
			fillbts();
		break;
	}	
	
	$('#maintenance_type').change(function(){
		$('#nameofmtype').html("");
		switch($(this).val()){
			case 'pelanggan':
				fillpelanggan();
			break;
			case 'datacenter':
				filldatacenter();
			break;
			case 'backbone':
				fillbackbone();
			break;
			case 'bts':
				fillbts();
			break;
		}
	});	
});
