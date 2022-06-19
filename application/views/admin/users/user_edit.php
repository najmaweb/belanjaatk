<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Admin</title>

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
    <link rel="shortcut icon" href="favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/headers/default.css" id="style_color-header-1" />    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 
<script type='text/javascript' src='<?php echo base_url();?>assets/ckeditor/ckeditor.js'></script>

<body>
<?php $this->load->view('admin/ckeditor');?>
<?php $this->load->view('admin/header');?>

<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">User</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Backend</a> <span class="divider">/</span></li>
            <li><a href="">Admin</a> <span class="divider">/</span></li>
            <li class="active">User</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">
<form method='POST' action='<?php echo base_url();?>admin/user_edit_handler'>
<input type="hidden" name="id" value="<?php echo $obj->id;?>" />
	<div class="row-fluid">
		<button type="submit" class="btn-u pull-right" id="save" name="save">Simpan</button>
		<button type="submit" class="btn-u pull-right" id="close" name="close">Tutup</button>
        <!-- Horizontal Forms and Input, Textarea -->
        <div class="row-fluid margin-bottom-20">
            <!-- Horizontal Forms -->
            <div class="span6">
				<label>Nama</label>
		    	<input class="span6 border-radius-none" type="text" placeholder="Text input" id="username" name="username" value="<?php echo $obj->username;?>"  />                    
            </div>

			<!-- Input and Textarea-->
            <div class="span6">
				<label>Email</label>
		    	<input class="span6 border-radius-none" type="text" placeholder="Text input" name="email" value="<?php echo $obj->email;?>"/>                    
            </div>
        </div><!--/row-fluid-->
        <!--//End Horizontal Forms -->
		
        <hr />

        <!-- Checkboxes,Radios and Selects -->
        <div class="row-fluid margin-bottom-40">
            <!-- Checkboxes, Inline Checkboxes and Radios -->
            <div class="span6">
				<label>Grup</label>
		    	<select name="group_id">
		    	<option value="1">Administrator</option>
		    	<option value="2">Author</option>
		    	</select>
            </div>
            <div class="span6">
                <label class="checkbox">
                    <input type="checkbox" value="1" id="active" name="active" />
                    Publish
                </label>
            </div>

        </div><!--/row-fluid-->

        <!-- Extending Form Controls -->

    </div><!--/row-fluid-->  
</form>
</div><!--/container-->		
<!--=== End Content Part ===-->

<?php $this->load->view('admin/footer');?>

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/ajaxupload.3.5.js"></script>
<script type="text/javascript">
var thisdomain = 'http://wadimor/';
    jQuery(document).ready(function() {
        App.init();
        initimageupload();
    });
    initimageupload = function(){
    	var btnUpload=$('#btnupload');
    	var status=$('#status');
    	new AjaxUpload(btnUpload, {
    		action: thisdomain+'admin/user_upload_tmp',
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
    				$('#img1').val(file);
    			}
    		}

    	});
    }
    
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
  })();
</script>
</body>
</html> 