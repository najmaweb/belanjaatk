<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<?php $this->load->view("administrator/products/head");?>
	<script type="text/javascript" src="/js/ajax_file_upload/ajaxupload.3.5.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="/assets/metronics2/img/logo.png" alt="logo" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="/assets/metronics2/img/menu-toggler.png" alt="" />
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<?php $this->load->view("administrator/products/simpleuserinfo");?>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<?php $this->load->view("administrator/menu");?>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->  
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span9">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="/">Administrator</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="/administrator/products">Products</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">Edit</a></li>
						</ul>
					</div>
					<div class="span3">
						<button type="submit" class="btn" id="btnsave"><i class="icon-ok"></i> Simpan</button>
						<button type="button" class="btn">Cancel</button>					
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE FORM PORTLET-->   
						<div class="portlet box blue tabbable">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-reorder"></i>
									<span class="hidden-480">Edit Produk</span>
								</div>
							</div>
							<div class="portlet-body form">
								<div class="tabbable portlet-tabs">
									<ul class="nav nav-tabs">
										<li><a href="#tab_gambar" data-toggle="tab">Gambar</a></li>
										<li><a href="#tab_keterangan" data-toggle="tab">Keterangan</a></li>
										<li class="active"><a href="#tab_umum" data-toggle="tab">Default</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_umum">
											<!-- BEGIN FORM-->
											<form action="#" class="form-horizontal">
												<div class="control-group">
													<label class="control-label">Nama Produk</label>
													<div class="controls">
														<input type="text" placeholder="mis. Kertas Folio Sinar Dunia" class="m-wrap huge" />
														<span class="help-inline">Nama dari Produk</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Harga Beli</label>
													<div class="controls">
														<input type="text" placeholder="Rp. 0" class="m-wrap huge" />
														<span class="help-inline">Harga Pembelian</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Harga Jual</label>
													<div class="controls">
														<input type="text" placeholder="Rp. 0" class="m-wrap huge" />
														<span class="help-inline">Harga Penjualan</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Harga Diskon</label>
													<div class="controls">
														<input type="text" placeholder="Rp. 0" class="m-wrap huge" />
														<span class="help-inline">Harga setelah didiskon</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Kategori</label>
													<div class="controls">
														<?php echo form_dropdown("category",$categories,1);?>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">New Release</label>
													<div class="controls">
														<label class="radio">
														<input type="radio" name="optionsRadios1" value="option1" />
														Ya
														</label>
														<label class="radio">
														<input type="radio" name="optionsRadios1" value="option2" checked />
														Tidak
														</label>  
													</div>
												</div>
											</form>
											<!-- END FORM-->  
										</div>
										<div class="tab-pane " id="tab_keterangan">
											<div class="control-group">
												<label class="control-label">Keterangan</label>
												<div class="controls">
													<textarea class="large m-wrap" rows="3"></textarea>
												</div>
											</div>
										</div>
										<div class="tab-pane " id="tab_gambar">
											<div class="row-form clearfix">
												<div class="span6">Image (862px X 398px):</div>
												<div class="span6">
													<p><input type='text' id='productImageEditsearchresult'/></p>
													<p><a class="imageuploader" id="uploadimagesearchresult">Upl. Gambar (862 X 398)</a></p>
													<span id="statussearchresult"></span>
												</div>
											</div>
											<div id="pictureEditsearchresult" class="row-form clearfix">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Metronic by keenthemes.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="/assets/metronics2/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="/assets/metronics2/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/assets/metronics2/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="/assets/metronics2/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/metronics2/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="/assets/metronics2/plugins/excanvas.min.js"></script>
	<script src="/assets/metronics2/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="/assets/metronics2/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/assets/metronics2/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="/assets/metronics2/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="/assets/metronics2/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<script src="/assets/metronics2/scripts/app.js"></script>     
	<script>
		jQuery(document).ready(function() {   
			// initiate layout and plugins
			console.log("Bisma");
			App.init();
			$("#btnsave").click(function(){
				window.location.href = "/administrator/products"
			});

			initimageuploadsearchresult = function(){
				console.log("atest init image upload");
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
						alert("response "+response);
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
			initimageuploadsearchresult();
		});
	</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>