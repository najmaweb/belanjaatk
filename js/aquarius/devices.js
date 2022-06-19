$(document).ready(function(){
	$('#adddevice').click(function(){
		$("#dAddDevice").modal();
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});

	var oTable = $('.devices').dataTable();
	oTable.on("click",".editdevice",function(){
		$("#editdevicetype_id").val($(this).attr("devicetype_id"));
		$("#editdevice_id").val($(this).attr("device_id"));
		$("#editdevice_name").val($(this).attr("device_name"));
		$("#editdevice_satuan").val($(this).attr("device_satuan"));
		$("#editdevice_description").val($(this).attr("device_description"));
		$("#dEditDevice").modal();
		});

	$("#editsave_device").click(function(){
		$.post(thisdomain+'adm/deviceupdate',{id:$('#editdevice_id').val(),devicetype_id:$('#editdevicetype_id').val(),name:$('#editdevice_name').val(),satuan:$('#editdevice_satuan').val(),description:$('#editdevice_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){
			/*
			var $rowNode = $('#myTable').find('tbody tr:eq(0)').get(0);
			var data = table.fnGetData($rowNode);
			*/
			
			var nodes = oTable.fnGetNodes();
			var row = null;
			jQuery.each(nodes,function(key,val){
				
				if(jQuery(val).attr("device_id") == $("#editdevice_id").val()){
					oTable.fnUpdate(['<input type="checkbox" name="checkbox" value="'+$("#editdevice_id").val()+'"/>',$('#editdevice_name').val(),$('#editdevicetype_id :selected').text(),$('#editdevice_description').val(),'<span class="icon-pencil editdevice"  device_name="'+$("#editdevice_name").val()+'" device_id="'+$("#editdevice_id").val()+'" devicetype_id="'+$("#editdevicetype_id").val()+'"device_satuan="'+$("#editdevice_satuan").val()+'" device_description="'+$("#editdevice_description").val()+'"></span><span class="remove_device icon-trash" device_name="'+$("#editdevice_name").val()+'" device_id="'+$("#editdevice_id").val()+'"></span>'],key);
				}
			});
		});
	});

	$(".link_device").click(function(){
		$("#adddevicepopup").fadeOut(200);
	});
	
	$(".modalclose").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$("#modal_device_remove").click(function(){
		var device_id = $("#modal_device_id").text();
		var mytable = $(".devices").dataTable();
		var selected = fnGetSelected();

		
		$.post(thisdomain+'adm/deviceremove',{id:$("#modal_device_id").text()}).done(function(data){
					mytable.fnDeleteRow(selected);
					$(".remove_device").bind("click",function(e){
						if($(this).parent().parent().hasClass('row_selected')){
							$(this).parent().parent().removeClass('row_selected');
						}
						else{
							$(".devices").find("tr.row_selected").removeClass("row_selected");
							$(this).parent().parent().addClass("row_selected");
						}
						$("#modal_device_name").text($(this).attr("device_name"));
						$("#modal_device_id").text($(this).attr("device_id"));
						$("#dconfirmation").modal("show");
					});


			}).fail(function(){alert("Tidak dapat menghapus perlatan, hubungi Developer");});
	});
	
	
	
	/* Add a click handler to the rows - this could be used as a callback */
	
	$(".remove_device").click(function(e){
		if($(this).parent().parent().hasClass('row_selected')){
			$(this).parent().parent().removeClass('row_selected');
		}
		else{
			$(".devices").find("tr.row_selected").removeClass("row_selected");
			$(this).parent().parent().addClass("row_selected");
		}
			
		$("#modal_device_name").text($(this).attr("device_name"));
		$("#modal_device_id").text($(this).attr("device_id"));
		$("#dconfirmation").modal("show");
	});
	
	$("#save_device").click(function(){
		$.post(thisdomain+'adm/devicesave',{devicetype_id:$('#devicetype_id').val(),name:$('#device_name').val(),satuan:$('#device_satuan').val(),description:$('#device_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){
		$(".devices").dataTable().fnAddData(["<input type='checkbox' name='checkbox' />",$('#device_name').val(),$('#device_satuan').val(),$('#device_description').val(),"<span class='icon-pencil'></span><span class='remove_device icon-trash' device_name='"+$('#device_name').val()+"' device_id='"+data+"'></span>"]);
					$(".remove_device").bind("click",function(e){
						if($(this).parent().parent().hasClass('row_selected')){
							$(this).parent().parent().removeClass('row_selected');
						}
						else{
							$(".devices").find("tr.row_selected").removeClass("row_selected");
							$(this).parent().parent().addClass("row_selected");
						}
						$("#modal_device_name").text($(this).attr("device_name"));
						$("#modal_device_id").text($(this).attr("device_id"));
						$("#dconfirmation").modal("show");
					});

		}).fail(function(){alert('gagal');});
	});
	
	
});

editdevice = function(device_id,devicetype,name,satuan,description){
	$("#devicetype_id").val(devicetype);
	$("#device_name").val(name);
	$("#device_satuan").val(satuan);
	$("#device_description").val(description);
	$("#save_device").toggleClass("edit_device");
	//$("#save_device").addClass("edit_device");
	//$("#save_device").removeClass("save_device");
		$("#myModalLabel").text("Edit Peralatan "+device_id);
	$(".edit_device").bind("click",function(){
		//$(this).removeClass("edit_device");
		//$(this).addClass("save_device");
		$.post(thisdomain+'adm/deviceupdate',{id:device_id,devicetype_id:$('#devicetype_id').val(),name:$('#device_name').val(),satuan:$('#device_satuan').val(),description:$('#device_description').val(),user_name:$('#workplace').attr('username')}).done(function(data){alert(data);});
	});
		$("#dAddDevice").modal();
	}

populaterow = function(device_id,name,satuan,description){
	$("#tSortable").append('<tr><td><input type="checkbox" name="checkbox" value="'+device_id+'"/></td><td>'+name+'</td><td>'+satuan+'</td><td>'+description+'</td><td><span class="icon-pencil"></span><span class="icon-trash"></span></td></tr>');
}

function fnGetSelected()
{
    return $(".devices").find('tr.row_selected').index();
}

