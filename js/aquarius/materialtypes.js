$(document).ready(function(){
	$("#addmaterial").click(function(){
		$("#dAddMaterialType").modal("show");
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".modalclose").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$("#modal_material_remove").click(function(){
		$(".materials").dataTable().fnDeleteRow(fnGetRow());
		$(".remove_material").bind("click",function(){
			$("#modal_material_name").text($(this).attr("material_name"));
			$("#modal_material_id").text($(this).attr("material_id"));
			$("#modal_material_row").text(fnGetRow());
			$(this).parent().parent().parent().find("tr.row_selected").removeClass("row_selected");
			$(this).parent().parent().addClass("row_selected");
			$("#dconfirmation").modal("show");
		});
	});

	$(".remove_material").click(function(){
		$("#modal_material_name").text($(this).attr("material_name"));
		$("#modal_material_id").text($(this).attr("material_id"));
		$("#modal_material_row").text(fnGetRow());
		$(this).parent().parent().parent().find("tr.row_selected").removeClass("row_selected");
		$(this).parent().parent().addClass("row_selected");
		$("#dconfirmation").modal("show");
	});
	
	$("#save_material_type").click(function(){
		$.post(thisdomain+'adm/materialtypeadd',{name:$("#materialtype_name").val(),description:$("#materialtype_description").val(),createuser:$("#workplace").attr("username")}).done(function(data){
			updaterow(data);
		}).fail(function(){
			alert("Tidal dapat menambahkan Jenis Peralatan, hubungi Developer");
		});
	});
});

updaterow = function(data){
	$(".materials").dataTable().fnAddData(['<input type="checkbox" name="checkbox" value="<?php echo $obj->id;?> style=\'opacity=0\'"/>',data,$("#materialtype_name").val(),$("#materialtype_description").val(),'<span class="icon-pencil"></span><span class="icon-trash"></span>']);
}

fnGetRow = function(){
	return $(".materials").find("tr.row_selected").index();
}
