$(document).ready(function(){
	$("#adddevice").click(function(){
		$("#dAddDeviceType").modal("show");
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".modalclose").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$("#modal_device_remove").click(function(){
		$(".devices").dataTable().fnDeleteRow(fnGetRow());
		$(".remove_device").bind("click",function(){
			$("#modal_device_name").text($(this).attr("device_name"));
			$("#modal_device_id").text($(this).attr("device_id"));
			$("#modal_device_row").text(fnGetRow());
			$(this).parent().parent().parent().find("tr.row_selected").removeClass("row_selected");
			$(this).parent().parent().addClass("row_selected");
			$("#dconfirmation").modal("show");
		});
	});

	$(".remove_device").click(function(){
		$("#modal_device_name").text($(this).attr("device_name"));
		$("#modal_device_id").text($(this).attr("device_id"));
		$("#modal_device_row").text(fnGetRow());
		$(this).parent().parent().parent().find("tr.row_selected").removeClass("row_selected");
		$(this).parent().parent().addClass("row_selected");
		$("#dconfirmation").modal("show");
	});
	
	$("#save_device_type").click(function(){
		$.post(thisdomain+'adm/devicetypeadd',{name:$("#devicetype_name").val(),description:$("#devicetype_description").val(),createuser:$("#workplace").attr("username")}).done(function(data){
			updaterow(data);
		}).fail(function(){
			alert("Tidal dapat menambahkan Jenis Peralatan, hubungi Developer");
		});
	});
});

updaterow = function(data){
	$(".devices").dataTable().fnAddData(['<input type="checkbox" name="checkbox" value="<?php echo $obj->id;?> style=\'opacity=0\'"/>',data,$("#devicetype_name").val(),$("#devicetype_description").val(),'<span class="icon-pencil"></span><span class="icon-trash"></span>']);
}

fnGetRow = function(){
	return $(".devices").find("tr.row_selected").index();
}
