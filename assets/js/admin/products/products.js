$(document).ready(function() {
	console.log('THIS DOMAIN',thisdomain);
	$.ajax({
		url:'/tests/teat',
		type:'post',
		dataType:'json'
	}).done(function(dt){
		$('#productparent').autocomp({
			data:dt,
		});
	}).fail(function(){
		console.log('Tidak dapat menarik json');
	});
	var producttable = $('#example').dataTable( {
		"pagingType": "full_numbers"
	} );
	$('#example tbody').on('click','tr .productedit',function(){
		var thisrow = $(this).parent().parent();
		thisrow.parent().find('tr').removeClass('selected');
		thisrow.addClass('selected');
		console.log('rowid : '+thisrow.attr('rowid'));
		$.ajax({
			url:'/admin/getobj',
			type:'post',
			dataType:'json',
			data:{id:thisrow.attr('rowid')}
		}).done(function(data){
			$('#dProductEdit').attr('objid',data['id']);
			$('#nameedit').val(data['name']);
			$('#productImageEdit').val(data['image']);
			$("#sellingpriceedit").val(data['sellingprice']);
			$("#alterpriceedit").val(data['alterprice']);
			$('#pictureEdit').html('');
			$("#unitedit").val(data['unit']);
			$('#pictureEditsearchresult').html('');
			$('#productImageEditsearchresult').val(data['searchimage']);
			$("#descriptionedit").val(data["description"]);
			$('#activeedit').html('');
			$('#newreleaseedit').html('');
			$('#galleryeedit').html('');
			$('#productparentedit').val(data['category_id']);
			$('#pictureEdit').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/'+data['image']+'" alt="" /></em>');
			$('#pictureEditsearchresult').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/big/'+data['searchimage']+'" alt="" /></em>');
			switch(data['active']){
			case '0':
				$('#activeedit').append('<option value=1>Ya</option>');
				$('#activeedit').append('<option value=0 selected="selected">Tidak</option>');
			break;
			case '1':
				$('#activeedit').append('<option value=1 selected="selected">Ya</option>');
				$('#activeedit').append('<option value=0>Tidak</option>');
			break;
			}
			switch(data['isnewrelease']){
			case '0':
			console.log('not newreleased');
				$('#newreleaseedit').append('<option >Ya</option>');
				$('#newreleaseedit').append('<option selected="selected" >Tidak</option>');
				break;
			case '1':
			console.log('newreleased');
				$('#newreleaseedit').append('<option selected="selected" >Ya</option>');
				$('#newreleaseedit').append('<option >Tidak</option>');
				break;
			}
			switch(data['isgallery']){
			case '0':
			console.log('not gallery');
				$('#galleryeedit').append('<option >Ya</option>');
				$('#galleryeedit').append('<option selected="selected" >Tidak</option>');
				break;
			case '1':
			console.log('gallery');
				$('#galleryeedit').append('<option selected="selected" >Ya</option>');
				$('#galleryeedit').append('<option >Tidak</option>');
				break;
			}
			$('#dProductEdit').modal();
		}).fail(function(){
			console.log('Tidak dapat melakukan edit produk');
		});
	});
	$('#productadd').click(function(){
		$('#dProductAdd').modal();
	});
	$('#example tbody').on('click','tr .productdelete',function(){	
//	$('.productdelete').click(function(){
		var thisrow = $(this).parent().parent();
		thisrow.parent().find('tr').removeClass('selected');
		thisrow.addClass('selected');
		$('#productoremove').text(thisrow.find('.objname').html());
		$('#dConfirmation').modal();
	});
	$('#btnRemove').click(function(){
	console.log("requested ID : "+$("#example").find("tr.selected").attr("rowid"));
		$.ajax({
			url:'/products/remove',
			type:'post',
			data:{id:$("#example").find("tr.selected").attr("rowid")}
		}).done(function(data){
			console.log(data);
			$("#example").find("tr.selected").remove();
			//activeproduct
		}).fail(function(){
			console.log('Tidak dapat menghapus produk');
		});
	});
	$('#btnSave').click(function(){
		
		$.ajax({
			url:'/products/save',
			type:'post',
			data:{name:$('#name').val(),category_id:$('#productparent').val(),type:$("#ctype").val(),unit:$("#unit").val(),sellingprice:$("#sellingprice").val(),alterprice:$("#alterprice").val(),image:$("#productImageAdd").val(),searchimage:$("#productImageAddsearchresult").val(),description:$("#description").val()}
		}).done(function(data){
			console.log(data);
			var newRow = producttable.fnAddData( [
			$('#name').val(),
			$('#isnewrelease :selected').text(),
			$('#isgallery :selected').text(),
			$('#sellingprice').val(),
			$('#alterprice').val(),
			"Ya","<span class='productedit pointer' ><img src='"+"/assets/img/aquarius/ic_edit.png'></span><span class='productdelete pointer' ><img src='"+"/assets/img/aquarius/ic_delete.png'></span>" ]
		  );
		  
				var row = producttable.fnGetNodes(newRow);
				$(row).attr('rowid', data);
                    /*var nTr = tTicket.fnSettings().aoData[newRow[0]].nTr;
                    var nTds = $('td', nTr);
                    nTds.eq(1).addClass('clientname');
                    nTds.eq(1).addClass('pointer');
                    nTds.eq(3).addClass('updatable');
                    nTds.eq(4).addClass('updatable');
                    nTds.eq(4).attr('fieldName', 'duration');
*/


		}).fail(function(){
			console.log('Tidak dapat menyimpan produk');
		});
	});
	$('#btnUpdate').click(function(){
		var _id = $("#example").find("tr.selected").attr("rowid");
		$.ajax({
			url:'/admin/updateobj',
			type:'post',
			data:{id:_id,category_id:$('#productparentedit').val(),name:$('#nameedit').val(),active:$('#activeedit').val(),sellingprice:$("#sellingpriceedit").val(),alterprice:$("#alterpriceedit").val(),image:$('#productImageEdit').val(),searchimage:$("#productImageEditsearchresult").val(),unit:$("#unitedit").val(),description:$("#descriptionedit").val()}
		}).done(function(data){
			console.log('PRODUCT IMAGE',$("#productImageEdit").val());
			 $('#example tbody tr.selected td.objname').html($('#nameedit').val());
			 $('#example tbody tr.selected td.objsellingprice').html($('#sellingpriceedit').val());
			 $('#example tbody tr.selected td.objalterprice').html($('#alterpriceedit').val());
			console.log(data);
		}).fail(function(){
			console.log('Tidak dapat mengupdate produk');
		});
	});
	$("#ctype").change(function(){
		switch($(this).val()){
			case "0":
			$("#dproductparent").hide();
			break;
			case "1":
			$("#dproductparent").show();
			break;
		}
	});
	initimageupload = function(){
	var btnUpload=$('#uploadimage');
	var status=$('#status');
	var myid = $("#example").find("tr.selected").attr("rowid");
	new AjaxUpload(btnUpload, {
		action: '/admin/category_upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese",file);
//				$('#path').val(file);
				$("#productImageEdit").val(file);
				$('#pictureEdit').html('');
			$('#pictureEdit').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/'+file+'" alt="" /></em>');
			}
			else{console.log("error")};
		}
	});
	}

	initimageuploadsearchresult = function(){
	var btnUpload=$('#uploadimagesearchresult');
	var status=$('#statussearchresult');
	//var myid = $("#example").find("tr.selected").attr("rowid");
	new AjaxUpload(btnUpload, {
		action: '/admin/category_upload_big_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			console.log(file,response);
			//alert(response);
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese",file);
//				$('#path').val(file);
				$("#productImageEditsearchresult").val(file);
				$('#pictureEditsearchresult').html('');
			$('#pictureEditsearchresult').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/big/'+file+'" alt="" /></em>');
			}
			else{console.log("error")};
		}
	});
	}


	initimageuploadAdd = function(){
	var btnUpload=$('#uploadimageAdd');
	var status=$('#statusAdd');
	new AjaxUpload(btnUpload, {
		action: '/admin/category_upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese");
//				$('#path').val(file);
				$("#productImageAdd").val(file);
				$('#pictureAdd').html('');
			$('#pictureAdd').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/'+file+'" alt="" /></em>');
			}
			else if(response==="error"){console.log("error")}
			else{
				console.log("unknown weeorr");
				}
		}
	});
	}


	initimageuploadAddsearchresult = function(){
	var btnUpload=$('#uploadimageAddsearchresult');
	var status=$('#statusAddsearchresult');
	new AjaxUpload(btnUpload, {
		action: '/admin/category_upload_big_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese");
//				$('#path').val(file);
				$("#productImageAddsearchresult").val(file);
				$('#pictureAddsearchresult').html('');
			$('#pictureAddsearchresult').append('<em class="overflow-hidden"><img width="200" src="'+'/media/products/big/'+file+'" alt="" /></em>');
			}
			else if(response==="error"){console.log("error")}
			else{
				console.log("unknown weeorr");
				}
		}
	});
	}
	initimageupload();
	initimageuploadsearchresult();
	initimageuploadAdd();
	initimageuploadAddsearchresult();
} );

