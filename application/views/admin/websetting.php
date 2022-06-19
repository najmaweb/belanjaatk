<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Administrasi</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/headers/header1.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_responsive.css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <!-- CSS Theme -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/najma.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/css/jquery.dataTables.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
			<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Konfirmasi</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								Data telah tersimpan
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			<div id="dAddWebsetting" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Penambahan Websetting</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span4">WebTitle:</div>
									<div class="span8">
										<input id="webtitle" name="webtitle"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Is Default:</div>
									<div class="span8">
										<select id=isdefault></select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnSave">Simpan</button>
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>

			<div id="dEditWebsetting" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" objid=''>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Edit Web Setting</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span4">Title:</div>
									<div class="span8">
										<input id="inp_edit_webtitle" name="inp_edit_webtitle"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Header type:</div>
									<div class="span8">
										<select id="inp_edit_isheadertype">
											<option value="1">Slider</option>
											<option value="0">Static</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Show new product:</div>
									<div class="span8">
										<select id="inp_edit_isshownewproducts">
											<option value="1">Ya</option>
											<option value="0">Tidak</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Default:</div>
									<div class="span8">
										<select id="inp_edit_isdefault">
											<option value="1">Ya</option>
											<option value="0">Tidak</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnUpdate">Simpan</button>
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnCloseUpdate">Tutup</button>
				</div>
			</div>

<?php $this->load->view('admin/header')?>

<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">Administrasi</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="">Admin</a> <span class="divider">/</span></li>
            <li class="active">Web Setting</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">
	<div class="row-fluid">
        <!-- Default Tables styles -->


		<div class="row-fluid">
		<div class="navigasi" id="useradd"><img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" id="btnblogadd"></div>
		<!-- end of added by pu		-->
        	<div class="span12">
	            <div class="headline table-sorting"><h3>Web Admin</h3></div>
                <table class="table" id="tblwebsetting">
                    <thead>
                        <tr class="info">
                            <th>Title</th>
                            <th>Header Type</th>
                            <th>Tampilkan New Product</th>
                            <th>Default</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($objs as $obj){?>
                        <tr class="success" rowid="<?php echo $obj->id;?>">
                            <td class="colwebtitle"><?php echo $obj->webtitle;?></td>
                            <td class="colisheadertype"><?php echo ($obj->headertype=="1")?"Slider":"Static";?></td>
							<td class="colisshownewproducts"><?php echo ($obj->shownewproducts=="1")?"Ya":"Tidak";?></td>
                            <td class="colisdefault"><?php echo ($obj->isdefault=="1")?"Ya":"Tidak";?></td>
                            <td><span class="useredit pointer"><img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png"></span>
                            <span class="userremove pointer"><img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png"></span>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div><!--/row-fluid-->
	</div><!--/row-fluid-->
    <!--//Default Tables styles -->
</div><!--/container-->
<!--=== End Content Part ===-->

<?php $this->load->view('admin/footer')?>

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        $("#tblwebsetting").dataTable();
    });
</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
<![endif]-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29166220-1']);
  _gaq.push(['_setDomainName', 'htmlstream.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    $(".userremove").click(function(){
        thisrow = $(this).parent().parent();
        $.ajax({
            url:'<?php echo base_url();?>admin/user_remove',
            type:'post',
            data:{id:thisrow.attr('rowid')}
        }).done(function(){
            thisrow.hide();
        });
    });
    $('#useradd').click(function(){
        $('#dAddWebsetting').modal();
    });
    $('.useredit').click(function(){
        thisrow = $(this).parent().parent();
        $("#tblwebsetting").find("tr").removeClass("selected");
        thisrow.addClass("selected");
        $.ajax({
            url:'<?php echo base_url();?>websettings/websetting_getRow',
            type:'post',
            dataType:'json',
            data:{id:thisrow.attr('rowid')}
        }).done(function(data){
            $('#inp_edit_webtitle').val(data['webtitle']);
            $('#inp_edit_isdefault').val(data['isdefault']);
            $('#inp_edit_isheadertype').children().each(function(){
				if($(this).val()==data["headertype"]){
					$(this).attr("selected","selected");
				}else{
					$(this).removeAttr("selected");
				}
			})
            $('#inp_edit_isshownewproducts').children().each(function(){
				if($(this).val()==data["shownewproducts"]){
					$(this).attr("selected","selected");
				}else{
					$(this).removeAttr("selected");
				}
			})
            $('#inp_edit_isdefault').children().each(function(){
				if($(this).val()==data["isdefault"]){
					$(this).attr("selected","selected");
				}else{
					$(this).removeAttr("selected");
				}
			})
            $('#dEditWebsetting').attr('objid',thisrow.attr('rowid'));
		$('#dEditWebsetting').modal();
        }).fail(function(){
        	console.log('Tidak dapat mengambil data');
        });

    });
    $("#btnSave").click(function(){
    	$.ajax({
    		url:'<?php echo base_url();?>websettings/save',
    		type:'post',
    		data:{webtitle:$('#webtitle').val(),isdefault:$('#isdefault').val()}
    	}).done(function(data){
    		window.location.href=window.location.href;
    	}).fail(function(){
    		console.log('Tidak dapat menyimpan data');
    	});
    });
    $('#btnUpdate').click(function(){
		$.ajax({
			url:'<?php echo base_url();?>websettings/update',
			type:'post',
			data:{id:$('#dEditWebsetting').attr('objid'),webtitle:$('#inp_edit_webtitle').val(),shownewproducts:$("#inp_edit_isshownewproducts").val(),headertype:$("#inp_edit_isheadertype").val(),isdefault:$('#inp_edit_isdefault').val()}
		}).done(function(data){
			$("#tblwebsetting tr.selected td.colwebtitle").html($('#inp_edit_webtitle').val());
			$("#tblwebsetting tr.selected td.colisheadertype").html($('#inp_edit_isheadertype :selected').text());
			$("#tblwebsetting tr.selected td.colisdefault").html($('#inp_edit_isdefault :selected').text());
			//inp_edit_isshownewproducts
			$("#tblwebsetting tr.selected td.colisshownewproducts").html($('#inp_edit_isshownewproducts :selected').text());
			console.log('update berhasil ');
		}).fail(function(){
			console.log('Tidak berhasil mengupdate data Web Setting');
		});
    });
  })();
</script>
</body>
</html>
