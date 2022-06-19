$(document).ready(function(){
	$('#addmaterial').click(function(){
		$("#dAddmaterial").modal("show");
        /*if($("#addmaterialpopup").is(":visible")){
            $("#addmaterialpopup").fadeOut(200);
        }else{
            $("#addmaterialpopup").fadeIn(300);
        }*/
	});
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});

	$(".link_material").click(function(){
		$("#addmaterialpopup").fadeOut(200);
	});
	
	$(".modalclose").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$("#modal_material_remove").click(function(){
		var material_id = $("#modal_material_id").text();
		var mytable = $(".materials").dataTable();
		var selected = fnGetSelected();

		
		$.post(thisdomain+'adm/materialremove',{id:$("#modal_material_id").text()}).done(function(data){
					mytable.fnDeleteRow(selected);
					$(".remove_material").bind("click",function(e){
						if($(this).parent().parent().hasClass('row_selected')){
							$(this).parent().parent().removeClass('row_selected');
						}
						else{
							$(".materials").find("tr.row_selected").removeClass("row_selected");
							$(this).parent().parent().addClass("row_selected");
						}
						$("#modal_material_name").text($(this).attr("material_name"));
						$("#modal_material_id").text($(this).attr("material_id"));
						$("#dconfirmation").modal("show");
					});


			}).fail(function(){alert("Tidak dapat menghapus perlatan, hubungi Developer");});
	});
	
	
	
	/* Add a click handler to the rows - this could be used as a callback */
	
	$(".remove_material").click(function(e){
		if($(this).parent().parent().hasClass('row_selected')){
			$(this).parent().parent().removeClass('row_selected');
		}
		else{
			$(".materials").find("tr.row_selected").removeClass("row_selected");
			$(this).parent().parent().addClass("row_selected");
		}
			
		$("#modal_material_name").text($(this).attr("material_name"));
		$("#modal_material_id").text($(this).attr("material_id"));
		$("#dconfirmation").modal("show");
	});
	
	$("#save_material").click(function(){
		$.post(thisdomain+'adm/materialsave',{name:$('#material_name').val(),satuan:$('#material_satuan').val(),description:$('#material_description').val(),materialtype_id:$("#editmaterialtype_id").val(),user_name:$('#workplace').attr('username')}).done(function(data){
$(".materials").dataTable().fnAddData(["<input type='checkbox' name='checkbox' />",$('#material_name').val(),$('#material_satuan').val(),$('#material_description').val(),"<span class='icon-pencil'></span><span class='remove_material icon-trash' material_name='"+$('#material_name').val()+"' material_id='"+data+"'></span>"]);
					$(".remove_material").bind("click",function(e){
						if($(this).parent().parent().hasClass('row_selected')){
							$(this).parent().parent().removeClass('row_selected');
						}
						else{
							$(".materials").find("tr.row_selected").removeClass("row_selected");
							$(this).parent().parent().addClass("row_selected");
						}
						$("#modal_material_name").text($(this).attr("material_name"));
						$("#modal_material_id").text($(this).attr("material_id"));
						$("#dconfirmation").modal("show");
					});

}).fail(function(){alert('gagal');});
	});
});

populaterow = function(material_id,name,satuan,description){
	$("#tSortable").append('<tr><td><input type="checkbox" name="checkbox" value="'+material_id+'"/></td><td>'+name+'</td><td>'+satuan+'</td><td>'+description+'</td><td><span class="icon-pencil"></span><span class="icon-trash"></span></td></tr>');
}

function fnGetSelected()
{
    return $(".materials").find('tr.row_selected').index();
}
