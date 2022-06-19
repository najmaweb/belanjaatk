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
			<div id="dAddUser" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Penambahan User</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span4">Nama:</div>
									<div class="span8">
										<input id="username" name="username"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Password:</div>
									<div class="span8">
										<input type="password" id="userpass" name="userpass"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Ulangi Password:</div>
									<div class="span8">
										<input type="password" id="userpass2" name="userpass2"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Email:</div>
									<div class="span8">
										<input type="text" id="useremail" name="useremail"/>
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
			
			<div id="dEditUser" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" objid=''>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Edit User</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span4">Nama:</div>
									<div class="span8">
										<input id="inp_edit_username" name="inp_edit_username"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Password:</div>
									<div class="span8">
										<input type="password" id="inp_edit_password" name="inp_edit_password"/> *
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Ulangi Password:</div>
									<div class="span8">
										<input type="password" id="inp_edit_password2" name="inp_edit_password2"/> *
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span4">Email:</div>
									<div class="span8">
										<input type="text" id="inp_edit_email" name="inp_edit_email"/>
									</div>
								</div>

							</div>
						</div>
					</div>
				* Diisi jika hendak mengganti password
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
            <li class="active">Users</li>
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
	            <div class="headline table-sorting"><h3>Users</h3></div>
                <table class="table" id="users">
                    <thead>
                        <tr class="info">
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($objs as $obj){?>
                        <tr class="success" rowid="<?php echo $obj->id;?>">
                            <td><?php echo $obj->username;?></td>
                            <td><?php echo $obj->createdate;?></td>
                            <td><span class="useredit pointer"><img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png"></span></td>
                            <td><span class="userremove pointer"><img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png"></span>
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
        $("#users").dataTable();
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
        $('#dAddUser').modal();
    });
    $('.useredit').click(function(){
        thisrow = $(this).parent().parent();
        $.ajax({
            url:'<?php echo base_url();?>users/user_getRow',
            type:'post',
            dataType:'json',
            data:{id:thisrow.attr('rowid')}
        }).done(function(data){
            $('#inp_edit_username').val(data['username']);
            $('#inp_edit_email').val(data['email']);
            $('#dEditUser').attr('objid',thisrow.attr('rowid'));
		$('#dEditUser').modal();
        }).fail(function(){
        	alert('failde');
        });
    
    });
    $("#btnSave").click(function(){
    	$.ajax({
    		url:'<?php echo base_url();?>users/usersave',
    		type:'post',
    		data:{username:$('#username').val(),password:$('#userpass').val(),email:$('#useremail').val(),group:'-'}
    	}).done(function(data){
    		window.location.href=window.location.href;
    	}).fail(function(){
    		alert('Failed');
    	});
    });
    $('#btnUpdate').click(function(){
    $.ajax({
    	url:'<?php echo base_url();?>users/update',
    	type:'post',
    	data:{id:$('#dEditUser').attr('objid'),username:$('#inp_edit_username').val(),email:$('#inp_edit_email').val()}
    }).done(function(data){
    	alert('update berhasil ');
    }).fail(function(){
    	alert('Tidak berhasil mengupdate data User');
    });
    if($('#inp_edit_password').val()!==''){
    	$.ajax({
    		url:'<?php echo base_url();?>users/change_password',
    		type:'post',
    		data:{email:$('#inp_edit_email').val(),password:$('#inp_edit_password').val()}
    	}).done(function(data){
    		alert('Password telah diganti ');
    	}).fail(function(){
    		alert('ganti password tidak berhasil');
    	});
    	}
    });
  })();
</script>
</body>
</html> 
