$(document).ready(function(){
	$("#btn_reset_password").click(function(){
		alert("test");
		$.post(thisdomain+'adm/entry_code',{kode:$("#kode").val()}).fail(function(){alert("Tidak dapat mengirimkan email, hubungi Developer");}).done(function(data){alert(data);});
		$("#dModal").modal();
	});
});
